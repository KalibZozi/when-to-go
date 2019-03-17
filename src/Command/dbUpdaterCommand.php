<?php
/**
 * Created by PhpStorm.
 * User: zbeny
 * Date: 2019. 03. 13.
 * Time: 10:38
 */

namespace App\Command;


use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use ZipArchive;

class dbUpdaterCommand extends Command
{
    const GTFS_FOLDER = TMP . "gtfs" . DS;
    const GTFS_FILE = self::GTFS_FOLDER . "gtfs.zip";
    const GTFS_URL = "https://bkk.hu/gtfs/budapest_gtfs.zip";

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('Stops');
    }

    public function execute(Arguments $args, ConsoleIo $io){
        $io->out('BKK adatbázis frissítő a GTFS fájllal. Betöltés kezdése...');

        $this->downloadGtfs($io);

        $this->extractGtfs($io);

        $gtfsFileHandle = @fopen(self::GTFS_FOLDER . 'stops.txt', 'r');
        if(empty($gtfsFileHandle)){
            //hibakezeles
        }
        $header = true;
        $headerArray = [];
        $newTableData = [];
        while(($gtfsFileContents = fgetcsv($gtfsFileHandle, 0, ',', '"')) !== false){
            if(empty($gtfsFileContents)){
                continue;
            }
            $data = [];
            if($header){
                $header = false;
                $headerArray = $gtfsFileContents;
                continue;
            }
            for($i=0; $i < count($gtfsFileContents); $i++){
                $data[$headerArray[$i]] = $this->addTypeToValue($gtfsFileContents[$i]);
            }
            $newTableData[] = $data;
        }
        fclose($gtfsFileHandle);

        if(empty($newTableData)){
            $io->error('Nincs frissíthető adat!');
            $this->abort();
        }
//        $table = $this->getTableLocator()->get('Stops');
        try{
            $this->Stops->getConnection()->transactional(function ($conn) use ($newTableData, $io){
//                $io->out('Belépett a tranzakcióba');
                foreach ($newTableData as $actualData){
                    $patchedNewData = [];
//                    $io->out('[C]Belépett a foreach-be');
                    try{
                        $patchedNewData = $this->Stops->newEntity($actualData, ['validate'=>false]);
                        if($patchedNewData->hasErrors()){
                            $errorList = '';
                            foreach ($patchedNewData->getErrors() as $errorKey => $errorMessage){
                                $errorList .= $errorKey . '=' . implode(' / ', $errorMessage) . '|';
                            }
                            $io->error('Hiba az adatok patch-elésekor! Hibák:');
                            $io->error($errorList);
                            $this->abort();
                        }
                    } catch (\Exception $e){
                        $io->error('Hiba az új entitás létrehozásakor! [' . implode(',', $actualData) . ']');
                        $this->abort();
                    }
//                    $io->out('[C]Kész a patch-elés');

                    if(!empty($patchedNewData)){
//                        $io->out('Nem üres a patchEntity. Lehet menteni.');
                        $newEntity = null;
                        try{
                            $newEntity = $this->Stops->save($patchedNewData, ['checkRules'=>false, 'atomic'=>false]);
//                            $newEntity = $this->Stops->save($patchedNewData, ['checkRules'=>false]);
//                            $io->out('Save után vagyunk.');
                        } catch (\Exception $e){
                            $io->error('Nem sikerült az adatokat menteni! Hiba leírása: ' . $e->getMessage());
                            $this->abort();
                        }
                    }
//                    $io->out('[C]Vége a mentésnek');
                }
            });
        } catch (\Exception $e){
            $io->error('Hiba az adatok mentésekor (fő függvény)!');
            $this->abort();
        }

        $io->out('Betöltés vége.');
    }

    /**
     * @param ConsoleIo $io
     */
    public function downloadGtfs(ConsoleIo $io)
    {
        if (file_put_contents(self::GTFS_FILE, fopen(self::GTFS_URL, 'r')) === false) {
            $io->error('Nem lehet elérni az URL-t vagy nem lehetett írni a temp fájlt!');
            $this->abort();
        }
    }

    /**
     * @param ConsoleIo $io
     */
    public function extractGtfs(ConsoleIo $io)
    {
        $zip = new ZipArchive;
        $res = $zip->open(self::GTFS_FILE);
        if ($res !== true) {
            $io->error('Hiba a tömörített fájl megnyitásakor: ' . $res);
            $this->abort();
        }
        $res = $zip->extractTo(self::GTFS_FOLDER, ['stops.txt']);
        if ($res === false) {
            $io->error('Hiba a tömörített fájl kitömörítésekor!');
            $this->abort();
        }
        $zip->close();
    }

    private function addTypeToValue($object){
        if(strlen($object) == 0){
            return null;
        }
        if(is_numeric(str_replace(',', '.', $object))){
            return floatval(str_replace(',', '.', $object));
        }
        return $object;
    }
}