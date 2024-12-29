<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectsUser $projectsUser
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Projects User'), ['action' => 'edit', $projectsUser->project_id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Projects User'), ['action' => 'delete', $projectsUser->project_id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectsUser->project_id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Projects Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Projects User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projectsUsers view content">
            <h3><?= h($projectsUser->Array) ?></h3>
            <table>
                <tr>
                    <th><?= __('Project') ?></th>
                    <td><?= $projectsUser->hasValue('project') ? $this->Html->link($projectsUser->project->ProjectName, ['controller' => 'Projects', 'action' => 'view', $projectsUser->project->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $projectsUser->hasValue('user') ? $this->Html->link($projectsUser->user->UserName, ['controller' => 'Users', 'action' => 'view', $projectsUser->user->id]) : '' ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
