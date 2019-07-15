<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\User;
use Authentication\Authenticator\ResultInterface;
use Authentication\Controller\Component\AuthenticationComponent;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @property AuthenticationComponent Authentication
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Authentication.Authentication', [
            'logoutRedirect' => '/users/login'
        ]);
    }

    public function login(){
        if ($this->Authentication->getIdentity()) {
            return $this->redirect(['controller'=>'Pages', 'action'=>'home']);
        }
        if($this->getRequest()->is('post')){
            $authentication = $this->request->getAttribute('authentication');
            $result = $this->Authentication->getResult();
//dd($result);
            if ($result->isValid()) {
                /** @var User $user */
                $user = null;
                if ($authentication->identifiers()->get('Password')->needsPasswordRehash()) {
                    // Rehash happens on save.
                    $user = $this->Users->get($this->Auth->user('id'));
                    $user->password = $this->request->getData('password');
                    $this->Users->save($user);
                } else {
//                    $user = $this->getRequest()->getAttribute('identity');
                }
            } else {
                switch ($result->getStatus()){
                    case ResultInterface::SUCCESS :
                        return $this->redirect(['controller'=>'Pages', 'action'=>'home']);
                    case ResultInterface::FAILURE_IDENTITY_NOT_FOUND :
                        $this->Flash->error('Hibás felhasználónév / jelszó!');
                        break;
                    default :
                        $this->Flash->error('Bejelentkezési hiba!');
                }
//                debug($result->getStatus());
//                debug($result->getErrors());
            }
        }
    }

    public function logout(){
        return $this->redirect($this->Authentication->logout());
    }

    public function beforeFilter(Event $event){
        $this->Authentication->allowUnauthenticated(['login', 'add']);
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
