<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Progres $progres
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Progres'), ['action' => 'edit', $progres->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Progres'), ['action' => 'delete', $progres->id], ['confirm' => __('Are you sure you want to delete # {0}?', $progres->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Progress'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Progres'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="progress view content">
            <h3><?= h($progres->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Task') ?></th>
                    <td><?= $progres->hasValue('task') ? $this->Html->link($progres->task->TaskName, ['controller' => 'Tasks', 'action' => 'view', $progres->task->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $progres->hasValue('user') ? $this->Html->link($progres->user->UserName, ['controller' => 'Users', 'action' => 'view', $progres->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($progres->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Date') ?></th>
                    <td><?= h($progres->Date) ?></td>
                </tr>
                <tr>
                    <th><?= __('StartTime') ?></th>
                    <td><?= h($progres->StartTime) ?></td>
                </tr>
                <tr>
                    <th><?= __('EndTime') ?></th>
                    <td><?= h($progres->EndTime) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Description') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($progres->Description)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
