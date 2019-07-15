<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Displays Controller
 *
 * @property \App\Model\Table\DisplaysTable $Displays
 *
 * @method \App\Model\Entity\Display[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DisplaysController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Devices', 'Stops', 'Routes']
        ];
        $displays = $this->paginate($this->Displays);

        $this->set(compact('displays'));
    }

    /**
     * View method
     *
     * @param string|null $id Display id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $display = $this->Displays->get($id, [
            'contain' => ['Devices', 'Stops', 'Routes']
        ]);

        $this->set('display', $display);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $display = $this->Displays->newEntity();
        if ($this->request->is('post')) {
            $display = $this->Displays->patchEntity($display, $this->request->getData());
            if ($this->Displays->save($display)) {
                $this->Flash->success(__('The display has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The display could not be saved. Please, try again.'));
        }
        $devices = $this->Displays->Devices->find('list', ['limit' => 200]);
        $stops = $this->Displays->Stops->find('list', ['limit' => 200]);
        $routes = $this->Displays->Routes->find('list', ['limit' => 200]);
        $this->set(compact('display', 'devices', 'stops', 'routes'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Display id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $display = $this->Displays->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $display = $this->Displays->patchEntity($display, $this->request->getData());
            if ($this->Displays->save($display)) {
                $this->Flash->success(__('The display has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The display could not be saved. Please, try again.'));
        }
        $devices = $this->Displays->Devices->find('list', ['limit' => 200]);
        $stops = $this->Displays->Stops->find('list', ['limit' => 200]);
        $routes = $this->Displays->Routes->find('list', ['limit' => 200]);
        $this->set(compact('display', 'devices', 'stops', 'routes'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Display id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $display = $this->Displays->get($id);
        if ($this->Displays->delete($display)) {
            $this->Flash->success(__('The display has been deleted.'));
        } else {
            $this->Flash->error(__('The display could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
