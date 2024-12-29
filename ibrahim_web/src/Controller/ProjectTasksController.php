<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ProjectTasks Controller
 *
 * @property \App\Model\Table\ProjectTasksTable $ProjectTasks
 */
class ProjectTasksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->ProjectTasks->find()
            ->contain(['Projects', 'Tasks']);
        $projectTasks = $this->paginate($query);

        $this->set(compact('projectTasks'));
    }

    /**
     * View method
     *
     * @param string|null $id Project Task id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projectTask = $this->ProjectTasks->get($id, contain: ['Projects', 'Tasks']);
        $this->set(compact('projectTask'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projectTask = $this->ProjectTasks->newEmptyEntity();
        if ($this->request->is('post')) {
            $projectTask = $this->ProjectTasks->patchEntity($projectTask, $this->request->getData());
            if ($this->ProjectTasks->save($projectTask)) {
                $this->Flash->success(__('The project task has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project task could not be saved. Please, try again.'));
        }
        $projects = $this->ProjectTasks->Projects->find('list', limit: 200)->all();
        $tasks = $this->ProjectTasks->Tasks->find('list', limit: 200)->all();
        $this->set(compact('projectTask', 'projects', 'tasks'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Project Task id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projectTask = $this->ProjectTasks->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectTask = $this->ProjectTasks->patchEntity($projectTask, $this->request->getData());
            if ($this->ProjectTasks->save($projectTask)) {
                $this->Flash->success(__('The project task has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The project task could not be saved. Please, try again.'));
        }
        $projects = $this->ProjectTasks->Projects->find('list', limit: 200)->all();
        $tasks = $this->ProjectTasks->Tasks->find('list', limit: 200)->all();
        $this->set(compact('projectTask', 'projects', 'tasks'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Project Task id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectTask = $this->ProjectTasks->get($id);
        if ($this->ProjectTasks->delete($projectTask)) {
            $this->Flash->success(__('The project task has been deleted.'));
        } else {
            $this->Flash->error(__('The project task could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
