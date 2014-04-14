<table>
	<thead>
		<tr>
			<th><?= $paginator->sort('ID', 'Problem.id') ?></th>
			<th><?= $paginator->sort('ポイント', 'Problem.point') ?></th>
			<th><?= $paginator->sort('開催中', 'Problem.end') ?></th>
			<th><?= $paginator->sort('作成日時', 'Problem.created') ?></th>
		</tr>
	</thead>
	<tbody>
		<? foreach ($problems as $problem): ?>
			<tr>
				<td><?= $html->link($problem['Problem']['id'], '/problems/view/'.$problem['Problem']['id']) ?></td>
				<td><?= $html->link($problem['Problem']['point'], '/problems/view/'.$problem['Problem']['id']) ?></td>
				<td><?= $problem['Problem']['end'] ? '終了' : '開催中' ?></td>
				<td><?= $problem['Problem']['created'] ?></td>
			</tr>
		<? endforeach ?>
	</tbody>
</table>

<?= $paginator->numbers(true) ?>