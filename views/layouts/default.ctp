<html lang='ja'>
<head>
	<?php echo $this->Html->charset(); ?>
	<?= $this->Html->meta('icon') ?>
	<title>
		Bottom Coder - 
		<?php echo $title_for_layout; ?>
	</title>
	<?= $html->css('reset'); ?>
	<?= $html->css('default'); ?>
	<?= $html->script('html5'); ?>
	<?= $html->script('http://www.google.com/jsapi'); ?>
	<script type="text/javascript">
		google.load('jquery', '1.4.3');
	</script>
	<?= $scripts_for_layout ?>
</head>
<body>
	<div id="container">
		<div id="header">
			<h1><?php echo $this->Html->link('Bottom Coder', '/'); ?></h1>
			
			<div id='HeaderNav' class='clearfix'>
				<ul>
					<? if (!empty($User)): ?>
						<li><?= $this->Html->link('ログアウト', '/users/logout') ?></li>
						<li><?= $this->Html->link('問題一覧', '/problems/') ?></li>
						<li><?= $this->Html->link('あなたの回答', '/answers/') ?></li>
					<? else: ?>
						<li><?= $this->Html->link('ログイン', '/users/login') ?></li>
						<li><?= $this->Html->link('登録', '/users/add') ?></li>
					<? endif ?>
					<? if ($User['User']['role'] == 'admin'): ?>
						<li><?= $this->Html->link('問題一覧', '/admin/problems/') ?></li>
						<li><?= $this->Html->link('回答一覧', '/admin/answers/') ?></li>
						<li><?= $this->Html->link('問題追加', '/admin/problems/add') ?></li>
						<li><?= $this->Html->link('お知らせ追加', '/admin/systems/add') ?></li>
						<li><?= $this->Html->link('回答例追加', '/admin/tests/add') ?></li>
					<? endif ?>
				<ul>
			</div>
		</div>

		<div id="content" class='clearfix'>

			<?php echo $this->Session->flash(); ?>

			<?php echo $content_for_layout; ?>

		</div>
		<div id="footer">
			<?php echo $this->Html->link('Bottom Coder', '/'); ?> powerd by <?= $html->link('チャゲ', 'http://tyage.sakura.ne.jp/') ?>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>