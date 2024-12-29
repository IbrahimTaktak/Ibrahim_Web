<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var string[]|\Cake\Collection\CollectionInterface $projects
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $user->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Users'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Edit User') ?></legend>
                <?php
                    echo $this->Form->control('UserName');
                    echo $this->Form->control('email');
                    echo $this->Form->control('password');
                    
                    // Only display the UserRole field if the user is not a manager or employee
                    if ($user->UserRole != 2 && $user->UserRole != 3) {
                        echo $this->Form->control('UserRole', [
                            'type' => 'radio',
                            'options' => [
                                1 => 'Admin',
                                2 => 'Manager',
                                3 => 'Employee'
                            ],
                            'default' => 3 // You can set a default value if needed
                        ]);
                    }
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
