<div class="container" style="text-shadow: none;">
	<div class="d-flex py-3 mx-auto flex-column text-center">
		<header class="masthead mb-auto">
			<div class="inner">
				<h3 class="masthead-brand">DSSCP</h3>
				<nav class="nav nav-masthead justify-content-center">
					<a class="nav-link" href="<?= base_url() ?>dashboard">Home</a>
					<a class="nav-link" href="<?= base_url() ?>dashboard/how_to">How To</a>
					<a class="nav-link" href="<?= base_url() ?>dashboard/about">About</a>
				</nav>
			</div>
		</header>
	</div>
	<div class="row">
		<div class="col-12 text-center">
			<h1 class="display-4 mb-3">
				<?php if (isset($page)) {
					echo 'Halaman <br class="d-md-none">' . $page;
				} else {
					echo 'Halaman <br class="d-md-none">Dashboard';
				} ?>
			</h1>
		</div>
		<div class="col-12 text-center rounded px-3 mb-4">
			<div class="d-flex text-center rounded">
				<div class="mx-auto">
					<a href="<?= base_url() ?>engine/input" class="btn btn-warning btn-sm">Input Data</a>
					<a href="<?= base_url() ?>engine/lihat" class="btn btn-primary btn-sm">Lihat Data</a>
					<a href="<?= base_url() ?>engine/hasil" class="btn btn-success btn-sm">Hasil Seleksi</a>
					<a href="<?= base_url() ?>settings/" class="btn btn-danger btn-sm">Setting</a>
				</div>
			</div>
		</div>

		<!-- <div class="col-12 col-md-3">
			<div class="row">
				<div class="col-6 col-md-12 mb-3">
					<div class="card p-3 mb-md-2">
						<div class="list-group">
							<b class="text-primary mb-2">Settings</b>
							<a href="<?= base_url() ?>settings/kriteria" class="list-group-item list-group-item-action
							<?php if (isset($page)) {
								if ($page == "Kriteria") {
									echo "active";
								}
							} ?>">Kriteria</a>
							<a href="<?= base_url() ?>settings/crips" class="list-group-item list-group-item-action
							<?php if (isset($page)) {
								if ($page == "Crips") {
									echo "active";
								}
							} ?>">Crips</a>
						</div>
					</div>
				</div>
				<div class="col-6 col-md-12 mb-3">
					<div class="card p-3 mb-md-2">
						<div class="list-group">
							<b class="text-primary mb-2">Process</b>
							<a href="<?= base_url() ?>engine/input" class="list-group-item list-group-item-action
							<?php if (isset($page)) {
								if ($page == "Input Data") {
									echo "active";
								}
							} ?>">Input Data</a>
							<a href="<?= base_url() ?>engine/lihat" class="list-group-item list-group-item-action
							<?php if (isset($page)) {
								if ($page == "Lihat Data") {
									echo "active";
								}
							} ?>">Lihat Data</a>
						</div>
					</div>
				</div>
			</div>
		</div> -->

		<div class="col-12 text-dark mb-5">
			<!-- Ini diisi main content -->
