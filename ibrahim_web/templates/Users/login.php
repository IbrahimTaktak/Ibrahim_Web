<!-- src/templates/Users/login.php -->
<div class="users form content">
    <?= $this->Form->create() ?>
    <fieldset>
        <legend><?= __('Please enter your email and password') ?></legend>
        <?= $this->Form->control('email', ['class' => 'form-control my-4 py-2', 'label' => false, 'placeholder' => 'Email']) ?>
        <?= $this->Form->control('password', ['class' => 'form-control my-4 py-2', 'label' => false, 'placeholder' => 'Password']) ?>
    </fieldset>
    <div class="text-center mt-3">
        <?= $this->Form->button(__('Login'), ['class' => 'btn btn-dark']) ?>
    </div>
    <?= $this->Form->end() ?>
</div>

