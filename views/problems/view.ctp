<h2>Point:<?= $problem['Problem']['point'] ?></h2>

<? if ($User['User']['role'] == 'admin'): ?>
	<div class='actions'>
		<ul>
			<li><?= $this->Html->link('終了', '/admin/problems/end/'.$problem['Problem']['id']) ?>
			<li><?= $this->Html->link('回答例追加', '/admin/tests/add/'.$problem['Problem']['id']) ?>
		</ul>
	</div>
	<br clear='both'>
<? endif ?>

<pre>
<?= h($problem['Problem']['detail']) ?>
</pre>

<?= $this->Form->create('Answer', array('action' => 'add')) ?>
<?= $this->Form->input('Answer.problem_id', array(
	'type' => 'hidden','value' => $problem['Problem']['id']
)) ?>
<?= $this->Form->input('Answer.language', array(
	'label' => '使用言語',
	'options' => $this->requestAction('/answers/language/')
)) ?>
<?= $this->Form->input('Answer.code', array('label' => '答え', 'type' => 'textarea', 'rows' => 15)) ?>
<?= $this->Form->end('Submit') ?>

<br>

<section>
	<header>
		<h2>オンラインテスト</h2>
		<p>Firefox 3.5, Google Chrome 2, IE 8以降のブラウザで対応しています。</p>
	</header>
	<br>
	<ul id='tests'>
		<? $tests = $this->requestAction('/problems/tests/'.$problem['Problem']['id']) ?>
		<? foreach ($tests as $i => $test): ?>
			<li class='test'>
				<h3>テスト<?= $i+1 ?></h3>
				
				<dl>
					<? for ($j = 1; $j <= 5; $j++): ?>
						<? if (!empty($test['Test']['input'.$j])): ?>
							<dt>入力<?= $j ?></dt>
							<dd class='test-input'><?= h($test['Test']['input'.$j]) ?></dd>
						<? endif ?>
					<? endfor ?>
					<dt>答え</dt><dd class='test-answer'><?= h($test['Test']['answer']) ?></dd>
				<dl>
				
				<input type='submit' class='test-submit' value='テスト'>
			</li>
		<? endforeach ?>
	</ul>
</section>

<?= $html->script('test', array('inline' => false)) ?>