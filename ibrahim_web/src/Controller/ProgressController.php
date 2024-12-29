<?php
declare(strict_types=1);

namespace App\Controller;

use App\Policy\UserPolicy;
use App\Policy\ProgresPolicy;
use App\Model\Entity\Progress;
use Cake\Http\Response;
use Cake\ORM\TableRegistry;

/**
 * Progress Controller
 *
 * @property \App\Model\Table\ProgressTable $Progress
 */
class ProgressController extends AppController
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
        
        // Load the Tasks table
        $tasksTable = TableRegistry::getTableLocator()->get('Tasks');
    
        $query = $this->Progress->find()->contain(['Tasks', 'Users', 'Tasks.Projects']);
    
        // Filter progress based on user role
        if ($user->UserRole === UserPolicy::ROLE_EMPLOYEE) {
            // Employees can only see their own progress
            $query->where(['Progress.user_id' => $user->id]);
        } elseif ($user->UserRole === UserPolicy::ROLE_MANAGER) {
            // Managers can see progress of tasks they created
            $query->where(['Tasks.user_id' => $user->id]);
        }
        // Admins can view all progress, so no condition is needed for admin view
    
        $progress = $this->paginate($query);
        $this->set(compact('progress'));
    }

    /**
     * View method
     *
     * @param string|null $id Progres id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $progres = $this->Progress->get($id, contain: ['Tasks', 'Users']);
        $this->Authorization->authorize($progres); // Check authorization

        $this->set(compact('progres'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $progress = $this->Progress->newEmptyEntity();
        $this->Authorization->skipAuthorization();
    
        if ($this->request->is('post')) {
            $data = $this->request->getData();
            $data['user_id'] = $this->request->getAttribute('identity')->id; // Set user_id to the logged-in user's ID
            $progress = $this->Progress->patchEntity($progress, $data);
    
            if ($this->Progress->save($progress)) {
                $this->Flash->success(__('The progress has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
    
            $this->Flash->error(__('The progress could not be saved. Please, try again.'));
        }
    
        // Fetch tasks based on user role
        $userRole = $this->request->getAttribute('identity')->UserRole;
        $tasksQuery = $this->Progress->Tasks->find('list', [
            'limit' => 200,
        ]);
    
        if ($userRole === UserPolicy::ROLE_ADMIN) {
            // Admin can see all tasks
        } elseif ($userRole === UserPolicy::ROLE_MANAGER) {
            // Fetch tasks created by the logged-in manager
            $managerId = $this->request->getAttribute('identity')->id;
            $tasksQuery->where(['Tasks.user_id' => $managerId]);
        } elseif ($userRole === UserPolicy::ROLE_EMPLOYEE) {
            // Fetch project IDs associated with the current employee
            $projectsUsersTable = TableRegistry::getTableLocator()->get('ProjectsUsers');
            $employeeProjectIdsQuery = $projectsUsersTable->find()
                ->select(['project_id'])
                ->where(['user_id' => $this->request->getAttribute('identity')->id])
                ->all()
                ->extract('project_id')
                ->toList();
    
            // Fetch tasks associated with the retrieved project IDs
            $tasksQuery->innerJoinWith('Projects')
                ->where(['Projects.id IN' => $employeeProjectIdsQuery]);
        }
    
        // Convert tasks query to array
        $tasks = $tasksQuery->toArray();
    
        // Set variables to be passed to the view
        $this->set(compact('progress', 'tasks'));
    }
    
    
    
    

    
    

    /**
     * Edit method
     *
     * @param string|null $id Progres id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
public function edit($id = null)
{
    $progress = $this->Progress->get($id, [
        'contain' => ['Tasks', 'Users']
    ]);
    
    $this->Authorization->authorize($progress); // Check authorization

    if ($this->request->is(['patch', 'post', 'put'])) {
        $progress = $this->Progress->patchEntity($progress, $this->request->getData());
        if ($this->Progress->save($progress)) {
            $this->Flash->success(__('The progress has been saved.'));
            return $this->redirect(['action' => 'index']);
        }
        $this->Flash->error(__('The progress could not be saved. Please, try again.'));
    }

    // Fetch tasks based on user role
    $userRole = $this->request->getAttribute('identity')->UserRole;
    $tasksQuery = $this->Progress->Tasks->find('list', [
        'limit' => 200,
    ]);

    if ($userRole === UserPolicy::ROLE_ADMIN) {
        // Admin can see all tasks
    } elseif ($userRole === UserPolicy::ROLE_MANAGER) {
        // Fetch tasks created by the logged-in manager
        $managerId = $this->request->getAttribute('identity')->id;
        $tasksQuery->where(['Tasks.user_id' => $managerId]);
    } elseif ($userRole === UserPolicy::ROLE_EMPLOYEE) {
        // Fetch project IDs associated with the current employee
        $projectsUsersTable = TableRegistry::getTableLocator()->get('ProjectsUsers');
        $employeeProjectIdsQuery = $projectsUsersTable->find()
            ->select(['project_id'])
            ->where(['user_id' => $this->request->getAttribute('identity')->id])
            ->all()
            ->extract('project_id')
            ->toList();

        // Fetch tasks associated with the retrieved project IDs
        $tasksQuery->innerJoinWith('Projects')
            ->where(['Projects.id IN' => $employeeProjectIdsQuery]);
    }

    // Convert tasks query to array
    $tasks = $tasksQuery->toArray();

    // Set variables to be passed to the view
    $this->set(compact('progress', 'tasks'));
}



    /**
     * Delete method
     *
     * @param string|null $id Progres id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $progres = $this->Progress->get($id);
        $this->Authorization->authorize($progres); // Check authorization

        if ($this->Progress->delete($progres)) {
            $this->Flash->success(__('The progres has been deleted.'));
        } else {
            $this->Flash->error(__('The progres could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
