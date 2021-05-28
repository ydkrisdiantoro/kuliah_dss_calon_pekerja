<?php

class Settings extends CI_Controller
{
	public function index()
	{
		$this->load->model('engine_model');
		$data["kriteria"] = $this->engine_model->getAllKriteria();
		$data["crips"] = $this->engine_model->getAllCrips();

		$data['title'] = 'Engine';
		$data['page'] = "Settings";
		$this->load->view('templates/header_engine.php', $data);
		$this->load->view('engine/index.php', $data);

		$this->load->view('engine/s_kriteria.php', $data);
		$this->load->view('engine/s_crips.php', $data);

		function edit($id)
		{
			$data['id'] = $id;
			$this->load->view('engine/s_kriteria.php', $data);
		}

		$this->load->view('engine/index_2.php');
		$this->load->view('templates/footer.php');
	}
}
