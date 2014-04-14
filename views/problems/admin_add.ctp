<?= $this->Form->create() ?>
<?= $this->Form->input('Problem.point', array('label' => '得点')) ?>
<?= $this->Form->input('Problem.detail', array('label' => '説明')) ?>
<?= $this->Form->end('追加') ?>