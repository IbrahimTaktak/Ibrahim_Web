<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Task $task
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $projects
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $task->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $task->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Tasks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="tasks form content">
            <?= $this->Form->create($task) ?>
            <fieldset>
                <legend><?= __('Edit Task') ?></legend>
                <?php
                    echo $this->Form->control('TaskName');
                    echo $this->Form->control('TaskDescription');
                    echo $this->Form->control('TaskStatus', [
                        'type' => 'radio',
                        'options' => [
                            'To Do' => 'To Do',
                            'Doing' => 'Doing',
                            'Done' => 'Done'
                        ]
                    ]);                     //echo $this->Form->control('user_id', ['options' => $users]);
                    //echo $this->Form->control('TaskCreatDate');
                    echo $this->Form->control('TaskStartDate');
                    echo $this->Form->control('TaskEndDate');
                    echo $this->Form->control('projects._ids', ['options' => $projects]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
