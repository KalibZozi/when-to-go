<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Domain\ReturnDataDto;
use App\Model\Domain\ReturnDataLineDto;
use Cake\I18n\Time;

/**
 * Trips Controller
 *
 * @property \App\Model\Table\TripsTable $Trips
 *
 * @method \App\Model\Entity\Trip[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TripsController extends AppController
{
    const API_URL = 'http://futar.bkk.hu/bkk-utvonaltervezo-api/ws/otp/api/where/arrivals-and-departures-for-stop.json?key=apaiary-test&version=3&appVersion=apiary-1.0&includeReferences=false&stopId=BKK_F04156&onlyDepartures=false&limit=60&minutesBefore=2&minutesAfter=30';

    public function arrivalsAndDeparturesForStop(){
        $apiRawData = file_get_contents(self::API_URL);
        $apiJsonDataArray = json_decode($apiRawData);
        $returnObj = new ReturnDataDto();
        $returnDataLineObj = new ReturnDataLineDto();
        $returnDataLineObj->line = 1;
        $returnDataLineObj->routeName = '151';

        foreach ($apiJsonDataArray->data->entry->stopTimes as $actualTime){
            if(isset($actualTime->predictedArrivalTime)) {
                $returnDataLineObj->predictedArrivalTimes[] = Time::createFromTimestamp($actualTime->predictedArrivalTime)->format('H:i');
            }
        }
        $returnObj->dataLines[] = $returnDataLineObj;
        $this->set(compact('returnObj'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Routes']
        ];
        $trips = $this->paginate($this->Trips);

        $this->set(compact('trips'));
    }

    /**
     * View method
     *
     * @param string|null $id Trip id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $trip = $this->Trips->get($id, [
            'contain' => ['Routes']
        ]);

        $this->set('trip', $trip);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $trip = $this->Trips->newEntity();
        if ($this->request->is('post')) {
            $trip = $this->Trips->patchEntity($trip, $this->request->getData());
            if ($this->Trips->save($trip)) {
                $this->Flash->success(__('The trip has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trip could not be saved. Please, try again.'));
        }
        $routes = $this->Trips->Routes->find('list', ['limit' => 200]);
        $this->set(compact('trip', 'routes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Trip id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $trip = $this->Trips->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $trip = $this->Trips->patchEntity($trip, $this->request->getData());
            if ($this->Trips->save($trip)) {
                $this->Flash->success(__('The trip has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The trip could not be saved. Please, try again.'));
        }
        $routes = $this->Trips->Routes->find('list', ['limit' => 200]);
        $this->set(compact('trip', 'routes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Trip id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $trip = $this->Trips->get($id);
        if ($this->Trips->delete($trip)) {
            $this->Flash->success(__('The trip has been deleted.'));
        } else {
            $this->Flash->error(__('The trip could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
