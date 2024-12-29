<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProjectUser $projectUser
 * @var string[]|\Cake\Collection\CollectionInterface $projects
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $projectUser->project_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $projectUser->project_id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Project Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="projectUsers form content">
            <?= $this->Form->create($projectUser) ?>
            <fieldset>
                <legend><?= __('Edit Project User') ?></legend>
                <?php
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
