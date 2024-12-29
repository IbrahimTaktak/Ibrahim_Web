<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Project> $projects
 */
$userRole = $this->request->getAttribute('identity')->UserRole;
?>
<div class="projects index content">
    <?php if ($userRole !== \App\Policy\UserPolicy::ROLE_EMPLOYEE): ?>
        <?= $this->Html->link(__('New Project'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <?php endif; ?>
    <h3><?= __('Projects') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('ProjectName') ?></th>
                    <th><?= $this->Paginator->sort('ProjectDescription') ?></th>
                    <th><?= $this->Paginator->sort('ProjectStatus') ?></th>
                    <th><?= $this->Paginator->sort('user_id') ?></th>
                    <th><?= $this->Paginator->sort('ProjectCreatDate') ?></th>
                    <th><?= $this->Paginator->sort('ProjectStartDate') ?></th>
                    <th><?= $this->Paginator->sort('ProjectEndDate') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($projects as $project): ?>
                <tr>
                    <td><?= $this->Number->format($project->id) ?></td>
                    <td><?= h($project->ProjectName) ?></td>
                    <td><?= h($project->ProjectDescription) ?></td>
                    <td><?= h($project->ProjectStatus) ?></td>
                    <td><?= $this->Number->format($project->user_id) ?></td>
                    <td><?= h($project->ProjectCreatDate) ?></td>
                    <td><?= h($project->ProjectStartDate) ?></td>
                    <td><?= h($project->ProjectEndDate) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $project->id]) ?>
                        <?php if ($userRole !== \App\Policy\UserPolicy::ROLE_EMPLOYEE): ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $project->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $project->id], ['confirm' => __('Are you sure you want to delete # {0}?', $project->id)]) ?>
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
