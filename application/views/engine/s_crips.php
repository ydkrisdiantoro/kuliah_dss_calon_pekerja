<div class="card mb-5">
	<div class="card-body">
		<h4 class="lead font-weight-bolder">Data Crips</h4>
		<div style="overflow-x: scroll;">

			<?php if (isset($id)) {
				echo $id;
			} ?>
			<table class="table table-striped w-100">
				<tr>
					<th>Kode</th>
					<th>Crips</th>
					<th>Nilai</th>
					<!-- <th>Action</th> -->
				</tr>
				<?php foreach ($crips as $i) : ?>
					<tr>
						<td>C<?= $i['id_kriteria']; ?></td>
						<td><?= $i['crips']; ?></td>
						<td><?= $i['nilai']; ?></td>
						<!-- <td>
					<a class="btn btn-sm btn-warning" href="<?= base_url() ?>settings/kriteria/edit/<?= $i['id']; ?>">Edit</a>
					<a class="btn btn-sm btn-danger" href="<?= base_url() ?>settings/kriteria/<?= $i['id']; ?>">Hapus</a>
				</td> -->
					</tr>
				<?php endforeach; ?>
			</table>
		</div>

	</div>
</div>
