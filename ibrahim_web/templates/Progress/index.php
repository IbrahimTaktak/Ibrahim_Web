<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Progres> $progress
 */
?>
<div class="progress index content">
    <?= $this->Html->link(__('New Progres'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Progress') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('task_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('Date') ?></th>
                    <th><?= $this->Paginator->sort('StartTime') ?></th>
                    <th><?= $this->Paginator->sort('EndTime') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($progress as $progres): ?>
                <tr>
                    <td><?= $this->Number->format($progres->id) ?></td>
                    <td><?= $progres->hasValue('task') ? $this->Html->link($progres->task->TaskName, ['controller' => 'Tasks', 'action' => 'view', $progres->task->id]) : '' ?></td>
                    <td><?= $progres->hasValue('user') ? $this->Html->link($progres->user->UserName, ['controller' => 'Users', 'action' => 'view', $progres->user->id]) : '' ?></td>
                    <td><?= h($progres->Date) ?></td>
                    <td><?= h($progres->StartTime) ?></td>
                    <td><?= h($progres->EndTime) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $progres->id]) ?>
                        
                        <?php if ($this->request->getAttribute('identity')->UserRole == 2 && $progres->user_id == $this->request->getAttribute('identity')->id): ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $progres->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $progres->id], ['confirm' => __('Are you sure you want to delete # {0}?', $progres->id)]) ?>
                        <?php elseif ($this->request->getAttribute('identity')->UserRole != 2): ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $progres->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $progres->id], ['confirm' => __('Are you sure you want to delete # {0}?', $progres->id)]) ?>
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
