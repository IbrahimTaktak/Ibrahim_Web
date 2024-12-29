<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ProjectsUsers Controller
 *
 * @property \App\Model\Table\ProjectsUsersTable $ProjectsUsers
 */
class ProjectsUsersController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->ProjectsUsers->find()
            ->contain(['Projects', 'Users']);
        $projectsUsers = $this->paginate($query);

        $this->set(compact('projectsUsers'));
    }

    /**
     * View method
     *
     * @param string|null $id Projects User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projectsUser = $this->ProjectsUsers->get($id, contain: ['Projects', 'Users']);
        $this->set(compact('projectsUser'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projectsUser = $this->ProjectsUsers->newEmptyEntity();
        if ($this->request->is('post')) {
            $projectsUser = $this->ProjectsUsers->patchEntity($projectsUser, $this->request->getData());
            if ($this->ProjectsUsers->save($projectsUser)) {
                $this->Flash->success(__('The projects user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The projects user could not be saved. Please, try again.'));
        }
        $projects = $this->ProjectsUsers->Projects->find('list', limit: 200)->all();
        $users = $this->ProjectsUsers->Users->find('list', limit: 200)->all();
        $this->set(compact('projectsUser', 'projects', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Projects User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projectsUser = $this->ProjectsUsers->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectsUser = $this->ProjectsUsers->patchEntity($projectsUser, $this->request->getData());
            if ($this->ProjectsUsers->save($projectsUser)) {
                $this->Flash->success(__('The projects user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The projects user could not be saved. Please, try again.'));
        }
        $projects = $this->ProjectsUsers->Projects->find('list', limit: 200)->all();
        $users = $this->ProjectsUsers->Users->find('list', limit: 200)->all();
        $this->set(compact('projectsUser', 'projects', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Projects User id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectsUser = $this->ProjectsUsers->get($id);
        if ($this->ProjectsUsers->delete($projectsUser)) {
            $this->Flash->success(__('The projects user has been deleted.'));
        } else {
            $this->Flash->error(__('The projects user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
