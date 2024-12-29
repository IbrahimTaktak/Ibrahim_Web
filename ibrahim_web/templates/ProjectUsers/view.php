<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectUser $projectUser
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Project User'), ['action' => 'edit', $projectUser->project_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Project User'), ['action' => 'delete', $projectUser->project_id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectUser->project_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Project Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Project User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projectUsers view content">
            <h3><?= h($projectUser->Array) ?></h3>
            <table>
                <tr>
                    <th><?= __('Project') ?></th>
                    <td><?= $projectUser->hasValue('project') ? $this->Html->link($projectUser->project->ProjectName, ['controller' => 'Projects', 'action' => 'view', $projectUser->project->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $projectUser->hasValue('user') ? $this->Html->link($projectUser->user->UserName, ['controller' => 'Users', 'action' => 'view', $projectUser->user->id]) : '' ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
