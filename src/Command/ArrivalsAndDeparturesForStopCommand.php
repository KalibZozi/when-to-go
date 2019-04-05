<?php


namespace App\Command;


use Cake\Console\Arguments;
use Cake\Console\Command;
use Cake\Console\ConsoleIo;
use Cake\I18n\Time;

class ArrivalsAndDeparturesForStopCommand extends Command
{
    const API_URL = 'http://futar.bkk.hu/bkk-utvonaltervezo-api/ws/otp/api/where/arrivals-and-departures-for-stop.json?key=apaiary-test&version=3&appVersion=apiary-1.0&includeReferences=false&stopId=BKK_F04156&onlyDepartures=false&limit=60&minutesBefore=2&minutesAfter=30';

    public function execute(Arguments $args, ConsoleIo $io){
        $io->out('Elindult a lekérdezés...');
        $apiRawData = file_get_contents(self::API_URL);
        $apiJsonDataArray = json_decode($apiRawData);
//        $currentTime = Time::createFromTimestamp($apiJsonDataArray['currentTime']);
        foreach ($apiJsonDataArray->data->entry->stopTimes as $actualTime){
//            if(isset($actualTime->arrivalTime)) {
//                $io->out('arrivalTime=' . Time::createFromTimestamp($actualTime->arrivalTime)->format('H:i'));
//            }
            if(isset($actualTime->predictedArrivalTime)) {
                $io->out('predictedArrivalTime=' . Time::createFromTimestamp($actualTime->predictedArrivalTime)->format('H:i'));
            }
        }
        $io->out('Lekérdezés vége.');
    }
}