<table>
	<thead>
		<tr>
			<th><?= $paginator->sort('ID', 'Answer.id') ?></th>
			<th><?= $paginator->sort('ユーザー名', 'User.username') ?></th>
			<th>回答</th>
			<th>テスト</th>
			<th><?= $paginator->sort('問題ID', 'Problem.id') ?></th>
			<th><?= $paginator->sort('問題ポイント', 'Problem.point') ?></th>
			<th><?= $paginator->sort('時間', 'Answer.created') ?></th>
		</tr>
	</thead>
	<tbody>
		<? foreach ($answers as $answer): ?>
			<tr>
				<td><?= $answer['Answer']['id'] ?></td>
				<td><?= h($answer['User']['username']) ?></td>
				<td><?= $this->Html->link('閲覧', '/answers/view/'.$answer['Answer']['id']) ?></td>
				<td class='actions'><?= $this->Html->link('テスト', '/answers/test/'.$answer['Answer']['id']) ?></td>
				<td><?= $this->Html->link($answer['Problem']['id'], '/problems/view/'.$answer['Problem']['id']) ?></td>
				<td><?= $this->Html->link($answer['Problem']['point'], '/problems/view/'.$answer['Problem']['id']) ?></td>
				<td><?= $answer['Answer']['created'] ?></td>
			</tr>
		<? endforeach ?>
	</tbody>
</table>

<?= $paginator->numbers(true) ?>