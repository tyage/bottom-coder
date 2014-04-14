<h2>
	<?= $this->Html->link('問題'.$answer['Problem']['id'], '/problems/view/'.$answer['Problem']['id']) ?>の
	<?= h($answer['User']['username']) ?>の回答
</h2>

<div class='actions'>
	<ul>
		<li><?= $this->Html->link('テスト', '/answers/test/'.$answer['Answer']['id']) ?>
	</ul>
</div>
<br clear='both'>

<textarea rows='20' cols='75'>
<?= h($answer['Answer']['code']) ?>
</textarea>