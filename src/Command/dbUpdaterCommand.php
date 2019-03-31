<?php
/**
 * Created by PhpStorm.
 * User: zbeny
 * Date: 2019. 03. 13.
 * Time: 10:38
 */

namespace App\Command;


use App\Model\Domain\DbUpdaterDto;
use App\Model\Entity\RouteTemp;
use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use ZipArchive;

class dbUpdaterCommand extends Command
{
    const GTFS_FOLDER = TMP . "gtfs" . DS;
    const GTFS_FILE = self::GTFS_FOLDER . "gtfs.zip";
    const GTFS_URL = "https://bkk.hu/gtfs/budapest_gtfs.zip";

    private $fileList = [];
    private $paginator;

    public function initialize()
    {
        parent::initialize();
        $this->loadModel('RouteTemps');
        $this->loadModel('StopTemps');
        $this->loadModel('TripTemps');
        $this->loadModel('Routes');
        $this->loadModel('Stops');
        $this->loadModel('Trips');
//        $this->paginator = new PaginatorComponent();
//        $this->fileList[] = new DbUpdaterDto($this->Routes, $this->RouteTemps, 'routes.txt');
//        $this->fileList[] = new DbUpdaterDto($this->Stops, $this->StopTemps, 'stops.txt');
        $this->fileList[] = new DbUpdaterDto($this->Trips, $this->TripTemps, 'trips.txt');
    }

    public function execute(Arguments $args, ConsoleIo $io){
        $io->out('BKK adatbázis frissítő a GTFS fájllal. Betöltés kezdése...');

//        $this->downloadGtfs($io);
//
//        $this->extractGtfs($io);
//
//        /** @var DbUpdaterDto $actualFile */
//        foreach ($this->fileList as $actualFile){
//            $io->out('Aktuális fájl:'.$actualFile->fileName);
//            $actualFile->TempTableEntity->deleteAll([]);
//            $gtfsFileHandle = @fopen(self::GTFS_FOLDER . $actualFile->fileName, 'r');
//            if(empty($gtfsFileHandle)){
//                continue;
//                //hibakezeles
//            }
//            $header = true;
//            $headerArray = [];
//            while(($gtfsFileContents = fgetcsv($gtfsFileHandle, 0, ',', '"')) !== false){
//                if(empty($gtfsFileContents)){
//                    continue;
//                }
//                $data = [];
//                if($header){
//                    $header = false;
//                    $headerArray = $gtfsFileContents;
//                    continue;
//                }
//                for($i=0; $i < count($gtfsFileContents); $i++){
//                    $data[$headerArray[$i]] = $this->addTypeToValue($gtfsFileContents[$i]);
//                }
//
//                try {
//                    $patchedNewData = $actualFile->TempTableEntity->newEntity($data, ['validate' => false]);
//                    if ($patchedNewData->hasErrors()) {
//                        $errorList = '';
//                        foreach ($patchedNewData->getErrors() as $errorKey => $errorMessage) {
//                            $errorList .= $errorKey . '=' . implode(' / ', $errorMessage) . '|';
//                        }
//                        $io->error('Hiba az adatok patch-elésekor! Hibák:');
//                        $io->error($errorList);
//                        $this->abort();
//                    }
//                    if (!empty($patchedNewData)) {
//                        $newEntity = null;
//                        try {
//                            $newEntity = $actualFile->TempTableEntity->save($patchedNewData, ['checkRules' => false]);
//                        } catch (\Exception $e) {
//                            $io->error('Nem sikerült az adatokat menteni! Hiba leírása: ' . $e->getMessage());
//                            $this->abort();
//                        }
//                    }
//                } catch (\Exception $e) {
//                    $io->error('Hiba az új entitás létrehozásakor! [' . implode(',', $data) . ']');
//                    $this->abort();
//                }
//            }
//            fclose($gtfsFileHandle);
//        }
//        $io->out('Betöltés vége a temp táblákba. Áttöltés kezdése a normál táblákba...');

        /** @var DbUpdaterDto $actualFile */
        foreach ($this->fileList as $actualFile) {
            $io->out('Aktuális fájl:'.$actualFile->fileName);
            $tableDataList = $actualFile->TempTableEntity->find('all');
            /** @var RouteTemp $oneItem */
            foreach ($tableDataList as $oneItem){
                $patchedNewData = $actualFile->TableEntity->newEntity(json_decode(json_encode($oneItem), true), ['validate' => false]);
                $newEntity = $actualFile->TableEntity->save($patchedNewData, ['checkRules' => false]);
            }
            $actualFile->TableEntity->deleteAll(['processed'=>0]);
            $actualFile->TableEntity->updateAll(['processed'=>0], ['processed'=>1]);
        }

        $io->out('Betöltés vége a normál táblákba.');
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
        $res = $zip->extractTo(self::GTFS_FOLDER, ['routes.txt', 'stops.txt', 'trips.txt']);
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

    function getSize($arr) {
        $tot = 0;
        foreach($arr as $a) {
            if (is_array($a)) {
                $tot += $this->getSize($a);
            }
            if (is_string($a)) {
                $tot += strlen($a);
            }
            if (is_numeric($a)) {
                $tot += PHP_INT_SIZE;
            }
        }
        return $tot;
    }
}