<?php
// Set page title
$this->assign('title', 'Dashboard');
?>

<div class="container my-4">
    <h1 class="mb-4">Dashboard</h1>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">User Count</div>
                <div class="card-body">
                    <h5 class="card-title"><?= $usersCount ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Task Count</div>
                <div class="card-body">
                    <h5 class="card-title"><?= $tasksCount ?></h5>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Project Count</div>
                <div class="card-body">
                    <h5 class="card-title"><?= $projectsCount ?></h5>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <h2 class="mb-4">Progress of the Day</h2>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Description</th>
                <th>Date</th>
                <!-- Add more columns as per your Progress schema -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($progressToday as $progress): ?>
                <tr>
                    <td><?= $progress->id ?></td>
                    <td><?= $progress->Description ?></td>
                    <td><?= $progress->Date ?></td>
                    <!-- Display more columns as needed -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <hr>

    <h2 class="mb-4">Projects</h2>
    <table class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Status</th>
                <th>Completion %</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($projects as $project): ?>
                <tr>
                    <td><?= $project->ProjectName ?></td>
                    <td>
                        <?php if ($project->ProjectStatus == 'completed'): ?>
                            <span class="badge badge-success"><?= $project->ProjectStatus ?></span>
                        <?php elseif ($project->ProjectStatus == 'in-progress'): ?>
                            <span class="badge badge-warning"><?= $project->ProjectStatus ?></span>
                        <?php else: ?>
                            <span class="badge badge-secondary"><?= $project->ProjectStatus ?></span>
                        <?php endif; ?>
                    </td>
                    <td><?= $project->completionPercentage ?>%</td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
