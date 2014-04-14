<div id='leftContent'>
	<div id='problem'>
		<h2>問題</h2>
		<? $problems = $this->requestAction('/problems/active/') ?>
		<? foreach ($problems as $problem): ?>
			<?= $this->Html->link($problem['Problem']['point'].'ポイント', '/problems/view/'.$problem['Problem']['id']) ?>
		<? endforeach ?>
	</div>

	<div id='system'>
		<h2>システム</h2>
		<? $systems = $this->requestAction('/systems/') ?>
		<? foreach ($systems as $system): ?>
			<p><?= $system['System']['message'] ?></p>
		<? endforeach ?>
	</div>
</div>
<div id='rightContent'>
	<div id='chat'>
		<h2>チャット</h2>
		<div id='chatMessage'></div>
		<? if (!empty($User)): ?>
			<?= $this->Form->create('Chat', array('action' => 'add')) ?>
			<?= $this->Form->input('Chat.message', array('label' => 'メッセージ')) ?>
			<?= $this->Form->end('投稿する') ?>
		<? endif ?>
	</div>

	<script type="text/javascript" src="http://www.google.com/jsapi"></script> 
	<script type="text/javascript"> 
		google.load('jquery', '1.4.3');
	</script> 
	<script>
	$(function () {
		var reload = function () {
			$('#chatMessage').load('/bottom/chats/?time='+(Math.random()));
		};
		reload();
		setInterval(function () {
			reload()
		}, 1000*5);
		
		$('#ChatAddForm').submit(function (e) {
			var self = this;
			e.preventDefault();
			
			reload();
			$.ajax({
				type: 'POST',
				url: $(this).attr('action'),
				data: $(this).serializeArray(),
				complete: function () {
					$(':input:not(:submit)', self).val('');
					$('<span />').css({
						color: 'red'
					}).text('投稿しました。').appendTo(self).fadeOut(3000);
				}
			});
		});
	});
	</script>
</div>