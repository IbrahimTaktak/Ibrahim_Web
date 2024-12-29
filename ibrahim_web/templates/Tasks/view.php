<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Task'), ['action' => 'edit', $task->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Task'), ['action' => 'delete', $task->id], ['confirm' => __('Are you sure you want to delete # {0}?', $task->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Tasks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Task'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="tasks view content">
            <h3><?= h($task->TaskName) ?></h3>
            <table>
                <tr>
                    <th><?= __('TaskName') ?></th>
                    <td><?= h($task->TaskName) ?></td>
                </tr>
                <tr>
                    <th><?= __('TaskStatus') ?></th>
                    <td><?= h($task->TaskStatus) ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $task->hasValue('user') ? $this->Html->link($task->user->UserName, ['controller' => 'Users', 'action' => 'view', $task->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($task->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('TaskCreatDate') ?></th>
                    <td><?= h($task->TaskCreatDate) ?></td>
                </tr>
                <tr>
                    <th><?= __('TaskStartDate') ?></th>
                    <td><?= h($task->TaskStartDate) ?></td>
                </tr>
                <tr>
                    <th><?= __('TaskEndDate') ?></th>
                    <td><?= h($task->TaskEndDate) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('TaskDescription') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($task->TaskDescription)); ?>
                </blockquote>
            </div>
            <div class="related">
                <h4><?= __('Related Projects') ?></h4>
                <?php if (!empty($task->projects)) : ?>
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
                        <?php foreach ($task->projects as $project) : ?>
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
                <?php if (!empty($task->progress)) : ?>
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
                        <?php foreach ($task->progress as $progres) : ?>
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
        </div>
    </div>
</div>
