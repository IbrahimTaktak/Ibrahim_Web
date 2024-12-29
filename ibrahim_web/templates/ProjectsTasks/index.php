<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ProjectsTask> $projectsTasks
 */
?>
<div class="projectsTasks index content">
    <?= $this->Html->link(__('New Projects Task'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Projects Tasks') ?></h3>
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
                <?php foreach ($projectsTasks as $projectsTask): ?>
                <tr>
                    <td><?= $projectsTask->hasValue('project') ? $this->Html->link($projectsTask->project->ProjectName, ['controller' => 'Projects', 'action' => 'view', $projectsTask->project->id]) : '' ?></td>
                    <td><?= $projectsTask->hasValue('task') ? $this->Html->link($projectsTask->task->TaskName, ['controller' => 'Tasks', 'action' => 'view', $projectsTask->task->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $projectsTask->project_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $projectsTask->project_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $projectsTask->project_id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectsTask->project_id)]) ?>
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
