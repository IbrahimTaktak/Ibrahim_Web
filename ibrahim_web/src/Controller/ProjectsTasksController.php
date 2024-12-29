<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ProjectsTasks Controller
 *
 * @property \App\Model\Table\ProjectsTasksTable $ProjectsTasks
 */
class ProjectsTasksController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->ProjectsTasks->find()
            ->contain(['Projects', 'Tasks']);
        $projectsTasks = $this->paginate($query);

        $this->set(compact('projectsTasks'));
    }

    /**
     * View method
     *
     * @param string|null $id Projects Task id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $projectsTask = $this->ProjectsTasks->get($id, contain: ['Projects', 'Tasks']);
        $this->set(compact('projectsTask'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $projectsTask = $this->ProjectsTasks->newEmptyEntity();
        if ($this->request->is('post')) {
            $projectsTask = $this->ProjectsTasks->patchEntity($projectsTask, $this->request->getData());
            if ($this->ProjectsTasks->save($projectsTask)) {
                $this->Flash->success(__('The projects task has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The projects task could not be saved. Please, try again.'));
        }
        $projects = $this->ProjectsTasks->Projects->find('list', limit: 200)->all();
        $tasks = $this->ProjectsTasks->Tasks->find('list', limit: 200)->all();
        $this->set(compact('projectsTask', 'projects', 'tasks'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Projects Task id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $projectsTask = $this->ProjectsTasks->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $projectsTask = $this->ProjectsTasks->patchEntity($projectsTask, $this->request->getData());
            if ($this->ProjectsTasks->save($projectsTask)) {
                $this->Flash->success(__('The projects task has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The projects task could not be saved. Please, try again.'));
        }
        $projects = $this->ProjectsTasks->Projects->find('list', limit: 200)->all();
        $tasks = $this->ProjectsTasks->Tasks->find('list', limit: 200)->all();
        $this->set(compact('projectsTask', 'projects', 'tasks'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Projects Task id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $projectsTask = $this->ProjectsTasks->get($id);
        if ($this->ProjectsTasks->delete($projectsTask)) {
            $this->Flash->success(__('The projects task has been deleted.'));
        } else {
            $this->Flash->error(__('The projects task could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
