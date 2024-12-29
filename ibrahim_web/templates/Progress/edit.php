<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Progress $progress
 * @var string[]|\Cake\Collection\CollectionInterface $tasks
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $progress->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $progress->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Progress'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="progress form content">
            <?= $this->Form->create($progress) ?>
            <fieldset>
                <legend><?= __('Edit Progress') ?></legend>
                <?php
                    echo $this->Form->control('task_id', ['options' => $tasks]);
                    //echo $this->Form->control('user_id', ['options' => $users]);
                    echo $this->Form->control('Description');
                    echo $this->Form->control('Date');
                    echo $this->Form->control('StartTime');
                    echo $this->Form->control('EndTime');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
