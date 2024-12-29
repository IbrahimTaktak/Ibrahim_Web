<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ProjectTask> $projectTasks
 */
?>
<div class="projectTasks index content">
    <?= $this->Html->link(__('New Project Task'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Project Tasks') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('project_id') ?></th>
                    <th><?= $this->Paginator->sort('task_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projectTasks as $projectTask): ?>
                <tr>
                    <td><?= $projectTask->hasValue('project') ? $this->Html->link($projectTask->project->ProjectName, ['controller' => 'Projects', 'action' => 'view', $projectTask->project->id]) : '' ?></td>
                    <td><?= $projectTask->hasValue('task') ? $this->Html->link($projectTask->task->TaskName, ['controller' => 'Tasks', 'action' => 'view', $projectTask->task->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $projectTask->project_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $projectTask->project_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $projectTask->project_id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectTask->project_id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
