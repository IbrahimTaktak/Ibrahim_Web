<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $tasks
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Projects'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projects form content">
            <?= $this->Form->create($project) ?>
            <fieldset>
                <legend><?= __('Add Project') ?></legend>
                <?php
                    echo $this->Form->control('ProjectName');
                    echo $this->Form->control('ProjectDescription');
                    //echo $this->Form->control('ProjectStatus');
                    //echo $this->Form->control('user_id');
                    //echo $this->Form->control('ProjectCreatDate');
                    echo $this->Form->control('ProjectStartDate');
                    echo $this->Form->control('ProjectEndDate');
                    echo $this->Form->control('users._ids', ['options' => $users]);
                    echo $this->Form->control('tasks._ids', ['options' => $tasks]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
