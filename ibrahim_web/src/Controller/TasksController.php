<?php
declare(strict_types=1);

namespace App\Controller;

use App\Policy\TaskPolicy;
use App\Policy\UserPolicy;
use Cake\ORM\TableRegistry;

/**
 * Tasks Controller
 *
 * @property \App\Model\Table\TasksTable $Tasks
 */
class TasksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->Authorization->skipAuthorization();

        $user = $this->request->getAttribute('identity'); // Get the logged-in user
        // Load the ProjectsUsers table
        $projectsUsersTable = TableRegistry::getTableLocator()->get('ProjectsUsers');

        $query = $this->Tasks->find()->contain(['Users', 'Projects']);

        // Filter tasks based on user role
        if ($user->UserRole === UserPolicy::ROLE_EMPLOYEE) {
            // Step 1: Fetch project IDs associated with the current employee
        $employeeProjectIds = $projectsUsersTable->find()
        ->select(['project_id'])
        ->where(['user_id' => $user->id])
        ->all()
        ->extract('project_id')
        ->toList();

    // Step 2: Fetch tasks associated with the retrieved project IDs
    $query->matching('Projects', function ($q) use ($employeeProjectIds) {
        return $q->where(['Projects.id IN' => $employeeProjectIds]);
    });
            
        } elseif ($user->UserRole === UserPolicy::ROLE_MANAGER) {
            // If the user is a manager, only show tasks from projects they manage
            $query->matching('Projects', function ($q) use ($user) {
                return $q->where(['Projects.user_id' => $user->id]);
            });
        }
        // Admins can view all tasks, so no condition is needed for admin view

        $tasks = $this->paginate($query);
        $this->set(compact('tasks'));
    }

    /**
     * View method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $task = $this->Tasks->get($id, ['contain' => ['Users', 'Projects', 'Progress']]);
        $this->Authorization->authorize($task, 'view');
        $this->set(compact('task'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->Authorization->authorize($this->Tasks->newEmptyEntity(), 'add');

        $task = $this->Tasks->newEmptyEntity();
        if ($this->request->is('post')) {
            $data = $this->request->getData(); 
            $data['TaskStatus'] = 'To Do';
            $data['user_id'] = $this->request->getAttribute('identity')->id; // Set user_id to the logged-in user's ID
            $data['TaskCreatDate'] = date('Y-m-d H:i:s'); // Set TaskCreatDate to current date and time
    
            $task = $this->Tasks->patchEntity($task, $data);
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The task could not be saved. Please, try again.'));
        }

        $user = $this->request->getAttribute('identity');
        if ($user->UserRole === UserPolicy::ROLE_MANAGER) {
            $projects = $this->Tasks->Projects->find('list', [
                'conditions' => ['Projects.user_id' => $user->id],
                'limit' => 200
            ])->all();
        } else {
            $projects = $this->Tasks->Projects->find('list', ['limit' => 200])->all();
        }
        
        $this->set(compact('task', 'projects'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $task = $this->Tasks->get($id, ['contain' => ['Projects']]);
        $this->Authorization->authorize($task, 'edit');

        if ($this->request->is(['patch', 'post', 'put'])) {
            $task = $this->Tasks->patchEntity($task, $this->request->getData());
            if ($this->Tasks->save($task)) {
                $this->Flash->success(__('The task has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The task could not be saved. Please, try again.'));
        }
        $users = $this->Tasks->Users->find('list', ['limit' => 200])->all();
        $projects = $this->Tasks->Projects->find('list', ['limit' => 200])->all();
        $this->set(compact('task', 'users', 'projects'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Task id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $task = $this->Tasks->get($id);
        $this->Authorization->authorize($task, 'delete');

        if ($this->Tasks->delete($task)) {
            $this->Flash->success(__('The task has been deleted.'));
        } else {
            $this->Flash->error(__('The task could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
