<div class="card">
	<div class="card-body">
		<div style="overflow-x: scroll;">

			<table class="table table-striped w-100">
				<tr>
					<th>Nama</th>
					<th>Email</th>
					<th>Alamat</th>
					<?php
					for ($i = 1; $i <= 10; $i++) :
						echo '<th>C' . $i . '</th>';
					endfor;
					?>
					<!-- <th>Action</th> -->
				</tr>
				<?php foreach ($data_alternatif as $i) : ?>
					<tr>
						<td><?= $i['nama']; ?></td>
						<td><?= $i['surel']; ?></td>
						<td><?= $i['alamat']; ?></td>
						<?php
						foreach ($data_nilai_alternatif as $dna) :
							if ($i['id'] == $dna['id_data_alternatif']) :
								echo '<th>' . $dna['nilai'] . '</th>';
							endif;
						endforeach;
						?>
					</tr>
				<?php endforeach; ?>
			</table>


		</div>
	</div>
</div>
