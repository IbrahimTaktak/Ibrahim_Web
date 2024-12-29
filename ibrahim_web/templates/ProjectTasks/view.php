<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectTask $projectTask
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Project Task'), ['action' => 'edit', $projectTask->project_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Project Task'), ['action' => 'delete', $projectTask->project_id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectTask->project_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Project Tasks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Project Task'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projectTasks view content">
            <h3><?= h($projectTask->Array) ?></h3>
            <table>
                <tr>
                    <th><?= __('Project') ?></th>
                    <td><?= $projectTask->hasValue('project') ? $this->Html->link($projectTask->project->ProjectName, ['controller' => 'Projects', 'action' => 'view', $projectTask->project->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Task') ?></th>
                    <td><?= $projectTask->hasValue('task') ? $this->Html->link($projectTask->task->TaskName, ['controller' => 'Tasks', 'action' => 'view', $projectTask->task->id]) : '' ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
