<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\Entity\User;
use App\Policy\UserPolicy;

/**
 * Projects Controller
 *
 * @property \App\Model\Table\ProjectsTable $Projects
 */
class ProjectsController extends AppController
{
    /**
     * Initialization method
     *
     * @return void
     */
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Authorization.Authorization');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();

        $user = $this->request->getAttribute('identity'); // Get the logged-in user

        // Skip authorization for now, handle it in the policy
        // $this->Authorization->skipAuthorization();

        $query = $this->Projects->find();

        // Filter projects based on user role
        if ($user->UserRole === UserPolicy::ROLE_EMPLOYEE) {
            // If the user is an employee, only show projects they are associated with
            $query->matching('Users', function ($q) use ($user) {
                return $q->where(['Users.id' => $user->id]);
            });
        } elseif ($user->UserRole === UserPolicy::ROLE_MANAGER) {
            // If the user is a manager, only show projects they are managing
            $query->where(['user_id' => $user->id]);
        }
        // Admins can view all projects, so no condition is needed for admin view

        $projects = $this->paginate($query);
        $this->set(compact('projects'));
    }

    /**
     * View method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $project = $this->Projects->get($id, ['contain' => ['Users', 'Tasks']]);
        $this->Authorization->authorize($project, 'view');

        $this->set(compact('project'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->authorize($this->Projects->newEmptyEntity(), 'add');

        $project = $this->Projects->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData(); 
            $data['ProjectStatus'] = 'To Do';
            $data['user_id'] = $this->request->getAttribute('identity')->id; // Set user_id to the logged-in user's ID
            $data['ProjectCreatDate'] = date('Y-m-d H:i:s'); // Set ProjectCreatDate to current date and time

            $project = $this->Projects->patchEntity($project, $data);
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }

        $user = $this->request->getAttribute('identity');
        if ($user->UserRole === UserPolicy::ROLE_MANAGER) {
            $tasks = $this->Projects->Tasks->find('list', [
                'conditions' => ['Tasks.user_id' => $user->id],
                'limit' => 200
            ])->all();
        } else {
            $tasks = $this->Projects->Tasks->find('list', ['limit' => 200])->all();
        }
        
        $users = $this->Projects->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('project', 'users', 'tasks'));
    }
    /**
     * Edit method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $project = $this->Projects->get($id, ['contain' => ['Users', 'Tasks']]);
        $this->Authorization->authorize($project, 'edit');

        if ($this->request->is(['patch', 'post', 'put'])) {
            $project = $this->Projects->patchEntity($project, $this->request->getData());
            if ($this->Projects->save($project)) {
                $this->Flash->success(__('The project has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project could not be saved. Please, try again.'));
        }

        $user = $this->request->getAttribute('identity');
        if ($user->UserRole === UserPolicy::ROLE_MANAGER) {
            $tasks = $this->Projects->Tasks->find('list', [
                'conditions' => ['Tasks.user_id' => $user->id],
                'limit' => 200
            ])->all();
        } else {
            $tasks = $this->Projects->Tasks->find('list', ['limit' => 200])->all();
        }
        
        $users = $this->Projects->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('project', 'users', 'tasks'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $project = $this->Projects->get($id);
        $this->Authorization->authorize($project, 'delete');

        if ($this->Projects->delete($project)) {
            $this->Flash->success(__('The project has been deleted.'));
        } else {
            $this->Flash->error(__('The project could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
