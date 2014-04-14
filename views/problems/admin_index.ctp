<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>ポイント</th>
			<th>終了</th>
			<th>作成日時</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<? foreach ($problems as $problem): ?>
			<tr>
				<td><?= $html->link($problem['Problem']['id'], '/problems/view/'.$problem['Problem']['id']) ?></td>
				<td><?= $html->link($problem['Problem']['point'], '/problems/view/'.$problem['Problem']['id']) ?></td>
				<td class='actions'><?= 
					$problem['Problem']['end'] ? 
					'終了' : 
					$html->link('終了', '/admin/problems/end/'.$problem['Problem']['id'])
				?></td>
				<td><?= $problem['Problem']['created'] ?></td>
				<td class='actions'>
					<?= $html->link('回答例追加', '/admin/tests/add/'.$problem['Problem']['id']) ?>
				</td>
			</tr>
		<? endforeach ?>
	</tbody>
</table>

<?= $paginator->numbers(true) ?>