<? foreach ($chats as $chat): ?>
	<p>
		<?= h($chat['User']['username']) ?> : <?= h($chat['Chat']['message']) ?>
	</p>
<? endforeach ?>
