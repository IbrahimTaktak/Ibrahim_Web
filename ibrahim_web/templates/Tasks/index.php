<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Task> $tasks
 */
?>
<div class="tasks index content">
    <?php
    $userRole = $this->request->getAttribute('identity')->UserRole;
    $userId = $this->request->getAttribute('identity')->id;
    ?>
    <?php if ($userRole != 3): // Assuming 3 is the Employee role ?>
        <?= $this->Html->link(__('New Task'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <?php endif; ?>
    <h3><?= __('Tasks') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('TaskName') ?></th>
                    <th><?= $this->Paginator->sort('TaskStatus') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('TaskCreatDate') ?></th>
                    <th><?= $this->Paginator->sort('TaskStartDate') ?></th>
                    <th><?= $this->Paginator->sort('TaskEndDate') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tasks as $task): ?>
                <tr>
                    <td><?= $this->Number->format($task->id) ?></td>
                    <td><?= h($task->TaskName) ?></td>
                    <td><?= h($task->TaskStatus) ?></td>
                    <td><?= $task->hasValue('user') ? $this->Html->link($task->user->UserName, ['controller' => 'Users', 'action' => 'view', $task->user->id]) : '' ?></td>
                    <td><?= h($task->TaskCreatDate) ?></td>
                    <td><?= h($task->TaskStartDate) ?></td>
                    <td><?= h($task->TaskEndDate) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $task->id]) ?>
                        <?php if ($userRole != 3 && ($userRole != 2 || $task->user_id == $userId)): // Only show edit and delete buttons to non-employees and to managers only if they created the task ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $task->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $task->id], ['confirm' => __('Are you sure you want to delete # {0}?', $task->id)]) ?>
                        <?php endif; ?>
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
