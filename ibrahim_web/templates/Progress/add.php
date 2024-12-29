<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Progres $progres
 * @var \Cake\Collection\CollectionInterface|string[] $tasks
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Progress'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="progress form content">
            <?= $this->Form->create($progress) ?>
            <fieldset>
                <legend><?= __('Add Progres') ?></legend>
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
