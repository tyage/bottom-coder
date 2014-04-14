<?= $form->create() ?>
<?= $form->input('Test.problem_id', array('label' => '問題番号', 'type' => 'text')) ?>
<? for ($i = 1; $i <= 5; $i++): ?>
	<?= $form->input('Test.input'.$i, array('label' => '入力'.$i)) ?>
<? endfor ?>
<?= $form->input('Test.answer', array('label' => '答え')) ?>
<?= $form->input('Test.public', array('label' => '公開')) ?>
<?= $form->end('テストを追加する') ?>