<?php

class Engine extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('engine_model');
	}
	public function index()
	{
		$data['title'] = 'Engine';
		$this->load->view('templates/header_engine.php', $data);
		$this->load->view('engine/index.php');
		$this->load->view('engine/index_2.php');
		$this->load->view('templates/footer.php');
	}
	public function input()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Engine';
		$data['page'] = 'Input Data';
		$this->load->view('templates/header_engine.php', $data);
		$this->load->view('engine/index.php');

		$config = array(
			array(
				'field' => 'nama',
				'label' => 'Nama lengkap',
				'rules' => 'required',
				'errors' => array(
					'required' => '%s harus diisi.',
				),
			),
			array(
				'field' => 'surel',
				'label' => 'Alamat email',
				'rules' => 'required|valid_email',
				'errors' => array(
					'required' => '%s harus diisi.',
					'valid_email' => '%s yang dimasukkan tidak valid.',
				),
			),
			array(
				'field' => 'alamat',
				'label' => 'Alamat lengkap',
				'rules' => 'required',
				'errors' => array(
					'required' => '%s harus diisi.',
				),
			)
		);
		$this->form_validation->set_rules($config);
		if ($this->form_validation->run() == FALSE) {
			$data['data'] = array(
				'nama' => $this->input->post('nama'),
				'surel' => $this->input->post('surel'),
				'alamat' => $this->input->post('alamat'),
			);
			$data['kriteria'] = $this->engine_model->getKriteriaName();
			$data['crips'] = $this->engine_model->getAllCrips();
			$this->load->view('engine/p_input.php', $data);
		} else {
			// Simpan ke database
			$nama = $this->input->post('nama');
			$surel = $this->input->post('surel');
			$alamat = $this->input->post('alamat');
			$this->engine_model->saveDataInput($nama, $surel, $alamat);
			$id_data_a = $this->engine_model->getIdDataAlternatif($nama, $surel);
			foreach ($id_data_a as $i) : $id = $i['id'];
			endforeach;
			for ($i = 1; $i <= 10; $i++) :
				$jawaban = $this->input->post('c' . $i);
				$id_kriteria = $this->input->post('id_kriteria' . $i);
				$id_data_alternatif = $id;
				$this->engine_model->saveJawaban($id_data_alternatif, $id_kriteria, $jawaban);
			endfor;
			redirect('engine/lihat');
		}

		$this->load->view('engine/index_2.php');
		$this->load->view('templates/footer.php');
	}

	public function lihat()
	{
		$data['data_alternatif'] = $this->engine_model->getDataAlternatif();
		$data['data_nilai_alternatif'] = $this->engine_model->getDataNilaiAlternatif();
		$data['title'] = 'Engine';
		$data['page'] = "Lihat Data";
		$this->load->view('templates/header_engine.php', $data);
		$this->load->view('engine/index.php');
		$this->load->view('engine/p_lihat.php', $data);
		$this->load->view('engine/index_2.php');
		$this->load->view('templates/footer.php');
	}
	public function hasil()
	{
		$data['data_alternatif'] = $this->engine_model->getDataAlternatif();
		$data['data_nilai_alternatif'] = $this->engine_model->getDataNilaiAlternatif();
		$data['atribut_kriteria'] = $this->engine_model->getAtributKriteria();
		$data['id_cost'] = $this->engine_model->getKriteriaCost();
		$data['data'] = $this->engine_model->getNormalisasi();
		$data['title'] = 'Engine';
		$data['page'] = "Hasil Seleksi";
		$this->load->view('templates/header_engine.php', $data);
		$this->load->view('engine/index.php');
		$this->load->view('engine/p_hasil.php', $data);
		$this->load->view('engine/index_2.php');
		$this->load->view('templates/footer.php');
	}
	public function sementara()
	{
		$random = array(
			'nama' => array('Siti', 'Paijo', 'Ani', 'Dimas', 'Dedi', 'Winda', 'Iroh', 'Meli', 'Husna', 'Doni', 'Dika', 'Joko'),
			'nilai' => array(25, 50, 75, 100)
		);

		for ($i = 0; $i < count($random['nama']); $i++) :
			$this->engine_model->saveDataInput($random['nama'][$i], $random['nama'][$i] . '@gmail.com', 'Jl. ' . $random['nama'][$i] . ' Nomor ' . rand(1, 100));
			$id_data_a = $this->engine_model->getIdDataAlternatif($random['nama'][$i], $random['nama'][$i] . '@gmail.com');
			foreach ($id_data_a as $i) : $id = $i['id'];
			endforeach;
			for ($i = 1; $i <= 10; $i++) :
				$jawaban = $random['nilai'][rand(0, 3)];
				$id_kriteria = $i;
				$id_data_alternatif = $id;
				$this->engine_model->saveJawaban($id_data_alternatif, $id_kriteria, $jawaban);
			endfor;
		endfor;
	}
}
