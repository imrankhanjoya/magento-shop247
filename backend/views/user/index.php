<table class="table">
	<tr>
		<td>Name</td>
		<td>Email</td>
		<td>Date</td>
	</tr>
	<?PHP foreach ($allUser as $key => $val) : ?>

		<tr>
			<td>
				<?= $val['username'] ?>
			</td>
			<td>
				<?= $val['email'] ?>
			</td>
			<td>
				<?= date("Y-m-d", $val['created_at']) ?>
			</td>
		</tr>
	<?PHP endforeach; ?>

</table>