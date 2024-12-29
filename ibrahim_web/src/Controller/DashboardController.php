<?php
declare(strict_types=1);

namespace App\Controller;
use App\Policy\UserPolicy;
use App\Controller\AppController;
use Cake\ORM\TableRegistry;
/**
 * Dashboard Controller
 */
class DashboardController extends AppController
{
    public function index()
    {
        $user = $this->request->getAttribute('identity'); // Get the logged-in user
    // Authorization check for admin role
        if ($user->UserRole === UserPolicy::ROLE_ADMIN) {
            $this->Authorization->skipAuthorization();

        }
        
        $this->viewBuilder()->setLayout('dashboard');

        // Get table objects using TableLocator
        $usersTable = TableRegistry::getTableLocator()->get('Users');
        $tasksTable = TableRegistry::getTableLocator()->get('Tasks');
        $projectsTable = TableRegistry::getTableLocator()->get('Projects');
        $progressTable = TableRegistry::getTableLocator()->get('Progress');

        // User count
        $usersCount = $usersTable->find()->count();

        // Task count
        $tasksCount = $tasksTable->find()->count();

        // Project count
        $projectsCount = $projectsTable->find()->count();

        // Progress of the day (assuming 'Date' field in Progress table)
        $progressToday = $progressTable->find()
            ->where(['DATE(Date)' => date('Y-m-d')])
            ->toArray(); // Fetch all results into array due to CakePHP 5 limitations

        // Projects with completion percentage
        $projects = $projectsTable->find()
            ->contain(['Tasks'])
            ->toArray(); // Fetch all results into array due to CakePHP 5 limitations

        // Calculate completion percentage for each project
        foreach ($projects as $project) {
            $totalTasks = count($project->tasks);
            $completedTasks = 0;
            foreach ($project->tasks as $task) {
                if ($task->TaskStatus === 'Done') {
                    $completedTasks++;
                }
            }
            $project->completionPercentage = ($totalTasks > 0) ? ($completedTasks / $totalTasks) * 100 : 0;
        }

        // Pass data to the view
        $this->set(compact('usersCount', 'tasksCount', 'projectsCount', 'progressToday', 'projects'));
    }
}
