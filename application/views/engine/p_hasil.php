<?php

$arr_id_cost = array();
foreach ($id_cost as $i) :
	$arr_id_cost[] = $i['id'];
endforeach;

$normalisasi = array();
foreach ($data_nilai_alternatif as $i) :
	if (in_array($i['id_kriteria'], $arr_id_cost)) :
		// Beratribut Cost
		$normalisasi['cost']['id_data_alternatif'][] = $i['id_data_alternatif'];
		$normalisasi['cost']['id_kriteria'][] = $i['id_kriteria'];
		$normalisasi['cost']['nilai'][] = $i['nilai'];
	else :
		//Beratribut Benefit
		$normalisasi['benefit']['id_data_alternatif'][] = $i['id_data_alternatif'];
		$normalisasi['benefit']['id_kriteria'][] = $i['id_kriteria'];
		$normalisasi['benefit']['nilai'][] = $i['nilai'];
	endif;
endforeach;
// var_dump($normalisasi);

$max = array();
$min = array();
foreach ($data as $n) :
	if ($n['atribut'] == 'Cost') :
		for ($i = 1; $i <= 10; $i++) :
			if ($n['id_kriteria'] == $i) :
				if (isset($min[$i])) :
					if ($min[$i] > $n['nilai']) :
						$min[$i] = $n['nilai'];
					endif;
				else :
					$min[$i] = $n['nilai'];
				endif;
			endif;
		endfor;
	endif;
	if ($n['atribut'] == 'Benefit') :
		for ($i = 1; $i <= 10; $i++) :
			if ($n['id_kriteria'] == $i) :
				if (isset($max[$i])) :
					if ($max[$i] < $n['nilai']) :
						$max[$i] = $n['nilai'];
					endif;
				else :
					$max[$i] = $n['nilai'];
				endif;
			endif;
		endfor;
	endif;
endforeach;

// var_dump($max);

$nilai_akhir = array();
foreach ($data_alternatif as $a) :
	$akhir_c = array();
	$akhir_b = array();
	foreach ($data as $n) :
		if ($n['id_data_alternatif'] == $a['id']) :
			if ($n['atribut'] == 'Cost') :
				for ($i = 1; $i <= 10; $i++) :
					if ($n['id_kriteria'] == $i) :
						$normal = round($min[$i] / $n['nilai'], 2);
						$akhir = $normal * $n['bobot'];
						$akhir_c[] = $akhir;
					// echo $akhir . '<br>';
					endif;
				endfor;
			endif;
			if ($n['atribut'] == 'Benefit') :
				for ($i = 1; $i <= 10; $i++) :
					if ($n['id_kriteria'] == $i) :
						$normal = round($n['nilai'] / $max[$i], 2);
						$akhir = $normal * $n['bobot'];
						$akhir_b[] = $akhir;
					// echo $akhir . '<br>';
					endif;
				endfor;
			endif;
		endif;
	endforeach;
	$nilai_akhir[$a['id']] = array_sum($akhir_c) + array_sum($akhir_b);
endforeach;

// var_dump($data);
$ranking_na = array();
foreach ($nilai_akhir as $na) :
	$ranking_na[] = $na;
endforeach;
arsort($ranking_na);



// var_dump($ranking_na);

?>
<div class="row">
	<div class="col-12">

		<div class="card">
			<div class="card-body">
				<div style="overflow-x: scroll;">
					<h4 class="lead font-weight-bolder">Hasil</h4>

					<table class="table table-striped">
						<tr>
							<th>Nama</th>
							<th>Email</th>
							<th>alamat</th>
							<th>Nilai Akhir</th>
							<th>Ranking</th>
						</tr>
						<?php foreach ($data_alternatif as $a) : ?>
							<!-- <tr> -->
							<!-- <td><?= $a['nama'] ?></td>
								<td><?= $a['surel'] ?></td>
								<td><?= $a['alamat'] ?></td>
								<td><?= $nilai_akhir[$a['id']] ?></td>
								<td> -->
							<?php
							$ranking = 1;
							foreach ($ranking_na as $na) :
								if ($nilai_akhir[$a['id']] == $na) :
									// echo $ranking;
									$data['ranking'][] = $ranking;
									$data['nama'][$ranking] = $a['nama'];
									$data['surel'][$ranking] = $a['surel'];
									$data['alamat'][$ranking] = $a['alamat'];
									$data['nilai'][$ranking] = $nilai_akhir[$a['id']];
								endif;
								$ranking++;
							endforeach;
							?>
							<!-- </td> -->
							<!-- </tr> -->
						<?php endforeach; ?>
						<?php for ($i = 1; $i <= count($ranking_na); $i++) : ?>
							<tr>
								<td><?= $data['nama'][$i] ?></td>
								<td><?= $data['surel'][$i] ?></td>
								<td><?= $data['alamat'][$i] ?></td>
								<td><?= $data['nilai'][$i] ?></td>
								<td><?= $i ?></td>
							</tr>
						<?php endfor; ?>
					</table>

				</div>
			</div>
		</div>
	</div>
</div>
