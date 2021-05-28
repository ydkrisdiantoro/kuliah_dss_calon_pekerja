<div class="card mb-5">
	<div class="card-body">
		<h4 class="lead font-weight-bolder">Data Kriteria</h4>
		<div style="overflow-x: scroll;">

			<?php if (isset($id)) {
				echo $id;
			} ?>
			<table class="table table-striped w-100">
				<tr>
					<th>Kode</th>
					<th>Nama</th>
					<th>Atribut</th>
					<th>Bobot</th>
					<th>Action</th>
					<!-- <th>Action</th> -->
				</tr>
				<?php foreach ($kriteria as $i) : ?>
					<tr>
						<td><?= $i['kode']; ?></td>
						<td><?= $i['nama']; ?></td>
						<td><?= $i['atribut']; ?></td>
						<td><?= $i['bobot']; ?></td>
						<td>
							<a href="#" class="btn btn-sm btn-warning">Edit</a>
							<a href="#" class="btn btn-sm btn-danger">Hapus</a>
						</td>
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
