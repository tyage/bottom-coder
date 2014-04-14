<?= $this->Form->create() ?>
<?= $this->Form->input('User.username', array('label' => 'ユーザー名')) ?>
<?= $this->Form->input('User.password', array('label' => 'パスワード')) ?>
<?= $this->Form->end('登録') ?>