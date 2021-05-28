<div class="container d-flex h-100 p-3 mx-auto flex-column text-center">
	<header class="masthead mb-auto">
		<div class="inner">
			<h3 class="masthead-brand">DSSCP</h3>
			<nav class="nav nav-masthead justify-content-center">
				<a class="nav-link <?php if ($page == 'home') {
										echo 'active';
									} ?>" href="<?= base_url() ?>dashboard">Home</a>
				<a class="nav-link <?php if ($page == 'how_to') {
										echo 'active';
									} ?>" href="<?= base_url() ?>dashboard/how_to">How To</a>
				<a class="nav-link <?php if ($page == 'about') {
										echo 'active';
									} ?>" href="<?= base_url() ?>dashboard/about">About</a>
			</nav>
		</div>
	</header>

	<main role="main" class="inner cover px-lg-5">
		<?php if ($page == 'home') { ?>
			<h1 class="cover-heading">DSS Calon Pekerja</h1>
			<p class="lead">Mengelola proses rekrut pegawai baru dengan mudah <br>menggunakan metode perhitungan Simple Additive Weighting (SAW).</p>
			<p class="lead">
				<a href="<?= base_url(); ?>engine/input" class="btn btn btn-secondary"><i data-feather="activity" class="text-info"></i> Mulai</a>
				<a href="<?= base_url(); ?>dashboard/how_to" class="btn btn btn-outline-secondary"><i data-feather="book" class="text-white"></i> Pelajari Dulu</a>
			</p>
		<?php } elseif ($page == 'about') { ?>
			<img class="rounded-circle" src="<?= base_url(); ?>assets/img/foto_profil.png" alt="Generic placeholder image" width="140" height="140">
			<h2>Yayan Dwi Krisdiantoro</h2>
			<div class="row">
				<div class="col-lg-3 col-md-2 col-1"></div>
				<div class="col-lg-6 col-md-8 col-10">
					Mahasiswa Ilmu Komputer Universitas Negeri Semarang Angkatan 2017. Sekarang sedang menempuh semester 6 secara remote dari rumah dikarenakan pandemi yang terjadi.
				</div>
				<div class="col-lg-3 col-md-2 col-1"></div>
			</div>
		<?php } elseif ($page == 'how_to') { ?>
			<h1 class="cover-heading">#1</h1>
			<p class='lead'>Klik Tombol Mulai pada Home</p>
			<h1 class="cover-heading">#2</h1>
			<p class='lead'>Inputkan data calon pekerja</p>
			<h1 class="cover-heading">#3</h1>
			<p class='lead'>Klik Lihat Hasil</p>
		<?php } ?>

	</main>

	<footer class="mastfoot mt-auto">
		<div class="inner">
			<small>
				<p class="mb-0">Copyright &copy; <a href="<?= base_url(); ?>">DSSCP</a> 2020</p>
				Developed by Yayan Dwi Krisdiantoro - <a href="mailto:y.d.krisdiantoro@gmail.com">y.d.krisdiantoro@gmail.com</a>
			</small>
		</div>
	</footer>
</div>
