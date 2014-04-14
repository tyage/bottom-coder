<h2><?= $html->link('回答に戻る', '/answers/view/'.$answer['Answer']['id']) ?></h2>

<table>
	<thead>
		<tr>
			<th>テスト番号</th>
			<th>正解</th>
			<? for ($i = 1; $i <= 5; $i++): ?>
				<th>入力<?= $i ?></th>
			<? endfor ?>
			<th>答え</th>
		</tr>
	</thead>
	<tbody>
		<? foreach ($tests as $test): ?>
			<tr>
				<td><?= $test['Test']['id'] ?></td>
				<td><?= $test['Test']['correct'] ? '○' : '×' ?></td>
				<? for ($i = 1; $i <= 5; $i++): ?>
					<td><?= h($test['Test']['input'.$i]) ?></td>
				<? endfor ?>
				<td><?= h($test['Test']['answer']) ?></td>
			</tr>
		<? endforeach ?>
	</tbody>
</table>