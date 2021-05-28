<?php

$d_nama = $d_surel = $d_alamat = '';
if (isset($data)) {
	foreach ($data as $i) {
		$d_nama = $i['nama'];
		$d_surel = $i['surel'];
		$d_alamat = $i['alamat'];
	}
}
?>
<div class="row">
	<div class="col-12 col-md-6 mb-3">
		<div class="card mb-4">
			<div class="card-body font-weight-bold">
				<div class="row ">
					<div class="col-3">
						<div class="alert alert-danger text-center">1</div>
					</div>
					<div class="col-9">
						<div class="alert alert-danger">Lengkapi identitas calon pekerja</div>
					</div>
				</div>
				<div class="row">
					<div class="col-3">
						<div class="alert alert-warning text-center">2</div>
					</div>
					<div class="col-9">
						<div class="alert alert-warning">Lengkapi form penilaian</div>
					</div>
				</div>
				<div class="row">
					<div class="col-3">
						<div class="alert alert-success text-center mb-0">3</div>
					</div>
					<div class="col-9">
						<div class="alert alert-success mb-0">Klik simpan</div>
					</div>
				</div>
			</div>
		</div>
		<div class="card">
			<div class="card-body">
				<h4 class="lead font-weight-bolder">Form Identitas</h4>

				<?php

				echo form_open('engine/input', 'class="form p-3 p-md-0"');
				echo form_label('Nama Lengkap', 'nama', 'class="d-block mt-2"');
				echo form_input('nama', $d_nama, 'placeholder="Full Name" class="form-control" id="nama" required');
				echo form_error('nama', '<small class="text-danger">', '</small>');
				echo form_label('Alamat Email', 'surel', 'class="d-block mt-2"');
				echo form_input('surel', $d_surel, 'placeholder="Email Adress" class="form-control" id="surel" required');
				echo form_error('surel', '<small class="text-danger">', '</small>');
				echo form_label('Alamat Lengkap', 'alamat', 'class="d-block mt-2"');
				echo form_input('alamat', $d_alamat, 'placeholder="Adress" class="form-control" id="alamat" required');
				echo form_error('alamat', '<small class="text-danger">', '</small>');
				?>

				<div class="alert alert-warning mb-0 mt-3">
					Selanjutnya, silahkan lengkapi form penilaian
				</div>

			</div>
		</div>
	</div>

	<div class="col-12 col-md-6 mb-3">
		<div class="card">
			<div class="card-body">
				<h4 class="lead font-weight-bolder">Form Penilaian</h4>

				<?php

				$no = 0;
				foreach ($kriteria as $k) :
					$no++;
					echo form_label('[' . $k['kode'] . '] ' . $k['nama'], 'k' . $k['id'], 'class="d-block mt-2"');
					echo form_hidden('id_kriteria' . $no, $k['id']);
					foreach ($crips as $c) :
						if ($c['id_kriteria'] == $k['id']) : ?>
							<div class="custom-control custom-radio ml-4">
								<input id="c<?= $c['id'] ?>" name="c<?= $no ?>" type="radio" class="custom-control-input" value="<?= $c['nilai'] ?>" required>
								<label class="custom-control-label" for="c<?= $c['id'] ?>"><?= $c['crips'] ?></label>
							</div>
				<?php
						endif;
					endforeach;
					echo form_error('alamat', '<small class="text-danger">', '</small>');

				endforeach;

				echo form_submit('submit', 'Simpan', 'class="btn btn-primary mt-3 float-right"');
				echo form_close();

				?>


			</div>
		</div>
	</div>
</div>
