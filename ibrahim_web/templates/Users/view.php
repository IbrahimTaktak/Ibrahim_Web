<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New User'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users view content">
            <h3><?= h($user->UserName) ?></h3>
            <table>
                <tr>
                    <th><?= __('UserName') ?></th>
                    <td><?= h($user->UserName) ?></td>
                </tr>
                <tr>
                    <th><?= __('Email') ?></th>
                    <td><?= h($user->email) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($user->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('UserRole') ?></th>
                    <td><?= $this->Number->format($user->UserRole) ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Projects') ?></h4>
                <?php if (!empty($user->projects)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('ProjectName') ?></th>
                            <th><?= __('ProjectDescription') ?></th>
                            <th><?= __('ProjectStatus') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('ProjectCreatDate') ?></th>
                            <th><?= __('ProjectStartDate') ?></th>
                            <th><?= __('ProjectEndDate') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->projects as $project) : ?>
                        <tr>
                            <td><?= h($project->id) ?></td>
                            <td><?= h($project->ProjectName) ?></td>
                            <td><?= h($project->ProjectDescription) ?></td>
                            <td><?= h($project->ProjectStatus) ?></td>
                            <td><?= h($project->user_id) ?></td>
                            <td><?= h($project->ProjectCreatDate) ?></td>
                            <td><?= h($project->ProjectStartDate) ?></td>
                            <td><?= h($project->ProjectEndDate) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Projects', 'action' => 'view', $project->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Projects', 'action' => 'edit', $project->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Projects', 'action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Progress') ?></h4>
                <?php if (!empty($user->progress)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Task Id') ?></th>
                            <th><?= __('User Id') ?></th>
                            <th><?= __('Description') ?></th>
                            <th><?= __('Date') ?></th>
                            <th><?= __('StartTime') ?></th>
                            <th><?= __('EndTime') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($user->progress as $progres) : ?>
                        <tr>
                            <td><?= h($progres->id) ?></td>
                            <td><?= h($progres->task_id) ?></td>
                            <td><?= h($progres->user_id) ?></td>
                            <td><?= h($progres->Description) ?></td>
                            <td><?= h($progres->Date) ?></td>
                            <td><?= h($progres->StartTime) ?></td>
                            <td><?= h($progres->EndTime) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Progress', 'action' => 'view', $progres->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Progress', 'action' => 'edit', $progres->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Progress', 'action' => 'delete', $progres->id], ['confirm' => __('Are you sure you want to delete # {0}?', $progres->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
            <div class="related">
                <h4><?= __('Related Tasks') ?></h4>
                <?php if (!empty($user->tasks)) : ?>
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
                        <?php foreach ($user->tasks as $task) : ?>
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
