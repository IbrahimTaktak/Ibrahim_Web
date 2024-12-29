<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Project'), ['action' => 'edit', $project->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Project'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Projects'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Project'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projects view content">
            <h3><?= h($project->ProjectName) ?></h3>
            <table>
                <tr>
                    <th><?= __('ProjectName') ?></th>
                    <td><?= h($project->ProjectName) ?></td>
                </tr>
                <tr>
                    <th><?= __('ProjectDescription') ?></th>
                    <td><?= h($project->ProjectDescription) ?></td>
                </tr>
                <tr>
                    <th><?= __('ProjectStatus') ?></th>
                    <td><?= h($project->ProjectStatus) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($project->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('User Id') ?></th>
                    <td><?= $this->Number->format($project->user_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('ProjectCreatDate') ?></th>
                    <td><?= h($project->ProjectCreatDate) ?></td>
                </tr>
                <tr>
                    <th><?= __('ProjectStartDate') ?></th>
                    <td><?= h($project->ProjectStartDate) ?></td>
                </tr>
                <tr>
                    <th><?= __('ProjectEndDate') ?></th>
                    <td><?= h($project->ProjectEndDate) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Users') ?></h4>
                <?php if (!empty($project->users)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('UserName') ?></th>
                            <th><?= __('UserEmail') ?></th>
                            <th><?= __('UserPassWord') ?></th>
                            <th><?= __('UserRole') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($project->users as $user) : ?>
                        <tr>
                            <td><?= h($user->id) ?></td>
                            <td><?= h($user->UserName) ?></td>
                            <td><?= h($user->UserEmail) ?></td>
                            <td><?= h($user->UserPassWord) ?></td>
                            <td><?= h($user->UserRole) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Users', 'action' => 'view', $user->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Users', 'action' => 'edit', $user->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Users', 'action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Tasks') ?></h4>
                <?php if (!empty($project->tasks)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('TaskName') ?></th>
                            <th><?= __('TaskDescription') ?></th>
                            <th><?= __('TaskStatus') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('TaskCreatDate') ?></th>
                            <th><?= __('TaskStartDate') ?></th>
                            <th><?= __('TaskEndDate') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($project->tasks as $task) : ?>
                        <tr>
                            <td><?= h($task->id) ?></td>
                            <td><?= h($task->TaskName) ?></td>
                            <td><?= h($task->TaskDescription) ?></td>
                            <td><?= h($task->TaskStatus) ?></td>
                            <td><?= h($task->user_id) ?></td>
                            <td><?= h($task->TaskCreatDate) ?></td>
                            <td><?= h($task->TaskStartDate) ?></td>
                            <td><?= h($task->TaskEndDate) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Tasks', 'action' => 'view', $task->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Tasks', 'action' => 'edit', $task->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Tasks', 'action' => 'delete', $task->id], ['confirm' => __('Are you sure you want to delete # {0}?', $task->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
