<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ProjectUser> $projectUsers
 */
?>
<div class="projectUsers index content">
    <?= $this->Html->link(__('New Project User'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Project Users') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('project_id') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projectUsers as $projectUser): ?>
                <tr>
                    <td><?= $projectUser->hasValue('project') ? $this->Html->link($projectUser->project->ProjectName, ['controller' => 'Projects', 'action' => 'view', $projectUser->project->id]) : '' ?></td>
                    <td><?= $projectUser->hasValue('user') ? $this->Html->link($projectUser->user->UserName, ['controller' => 'Users', 'action' => 'view', $projectUser->user->id]) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $projectUser->project_id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $projectUser->project_id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $projectUser->project_id], ['confirm' => __('Are you sure you want to delete # {0}?', $projectUser->project_id)]) ?>
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
