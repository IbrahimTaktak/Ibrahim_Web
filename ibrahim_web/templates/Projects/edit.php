<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Project $project
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $tasks
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $project->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $project->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Projects'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projects form content">
            <?= $this->Form->create($project) ?>
            <fieldset>
                <legend><?= __('Edit Project') ?></legend>
                <?php
                    echo $this->Form->control('ProjectName');
                    echo $this->Form->control('ProjectDescription');
                    echo $this->Form->control('ProjectStatus', [
                        'type' => 'radio',
                        'options' => [
                            'To Do' => 'To Do',
                            'Doing' => 'Doing',
                            'Done' => 'Done'
                        ]
                    ]);  
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
