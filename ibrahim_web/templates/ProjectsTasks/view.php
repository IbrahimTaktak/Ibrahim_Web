<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectsTask $projectsTask
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Projects Task'), ['action' => 'edit', $projectsTask->project_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Projects Task'), ['action' => 'delete', $projectsTask->project_id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectsTask->project_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Projects Tasks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Projects Task'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projectsTasks view content">
            <h3><?= h($projectsTask->Array) ?></h3>
            <table>
                <tr>
                    <th><?= __('Project') ?></th>
                    <td><?= $projectsTask->hasValue('project') ? $this->Html->link($projectsTask->project->ProjectName, ['controller' => 'Projects', 'action' => 'view', $projectsTask->project->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Task') ?></th>
                    <td><?= $projectsTask->hasValue('task') ? $this->Html->link($projectsTask->task->TaskName, ['controller' => 'Tasks', 'action' => 'view', $projectsTask->task->id]) : '' ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
