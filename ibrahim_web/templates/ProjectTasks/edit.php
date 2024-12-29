<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectTask $projectTask
 * @var string[]|\Cake\Collection\CollectionInterface $projects
 * @var string[]|\Cake\Collection\CollectionInterface $tasks
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $projectTask->project_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $projectTask->project_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Project Tasks'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projectTasks form content">
            <?= $this->Form->create($projectTask) ?>
            <fieldset>
                <legend><?= __('Edit Project Task') ?></legend>
                <?php
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
