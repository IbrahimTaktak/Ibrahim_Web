<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ProjectUsers Controller
 *
 * @property \App\Model\Table\ProjectUsersTable $ProjectUsers
 */
class ProjectUsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->ProjectUsers->find()
            ->contain(['Projects', 'Users']);
        $projectUsers = $this->paginate($query);

        $this->set(compact('projectUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Project User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projectUser = $this->ProjectUsers->get($id, contain: ['Projects', 'Users']);
        $this->set(compact('projectUser'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projectUser = $this->ProjectUsers->newEmptyEntity();
        if ($this->request->is('post')) {
            $projectUser = $this->ProjectUsers->patchEntity($projectUser, $this->request->getData());
            if ($this->ProjectUsers->save($projectUser)) {
                $this->Flash->success(__('The project user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project user could not be saved. Please, try again.'));
        }
        $projects = $this->ProjectUsers->Projects->find('list', limit: 200)->all();
        $users = $this->ProjectUsers->Users->find('list', limit: 200)->all();
        $this->set(compact('projectUser', 'projects', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Project User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projectUser = $this->ProjectUsers->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectUser = $this->ProjectUsers->patchEntity($projectUser, $this->request->getData());
            if ($this->ProjectUsers->save($projectUser)) {
                $this->Flash->success(__('The project user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project user could not be saved. Please, try again.'));
        }
        $projects = $this->ProjectUsers->Projects->find('list', limit: 200)->all();
        $users = $this->ProjectUsers->Users->find('list', limit: 200)->all();
        $this->set(compact('projectUser', 'projects', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectUser = $this->ProjectUsers->get($id);
        if ($this->ProjectUsers->delete($projectUser)) {
            $this->Flash->success(__('The project user has been deleted.'));
        } else {
            $this->Flash->error(__('The project user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
