<?php

class Dashboard extends CI_Controller
{
	public function index()
	{
		$data['page'] = 'home';
		$data['title'] = 'Home';
		$this->load->view('templates/header', $data);
		$this->load->view('dashboard/index', $data);
		$this->load->view('templates/footer');
	}
	public function about()
	{
		$data['page'] = 'about';
		$data['title'] = 'About';
		$this->load->view('templates/header', $data);
		$this->load->view('dashboard/index', $data);
		$this->load->view('templates/footer');
	}
	public function how_to()
	{
		$data['page'] = 'how_to';
		$data['title'] = 'How To';
		$this->load->view('templates/header', $data);
		$this->load->view('dashboard/index', $data);
		$this->load->view('templates/footer');
	}
}
