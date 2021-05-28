<?php

class Engine_model extends CI_Model
{
	public function getAllKriteria()
	{
		$query = $this->db->get('kriteria');
		return $query->result_array();
	}
	public function getAllCrips()
	{
		$query = $this->db->get('data_crips');
		return $query->result_array();
	}
	public function getKriteriaName()
	{
		$this->db->select('id, kode, nama');
		$query = $this->db->get('kriteria');
		return $query->result_array();
	}
	public function saveDataInput($nama, $surel, $alamat)
	{
		$data = array(
			'id' => NULL,
			'nama' => $nama,
			'surel' => $surel,
			'alamat' => $alamat
		);
		$this->db->insert('data_alternatif', $data);
	}
	public function getIdDataAlternatif($nama, $surel)
	{
		$this->db->select('id');
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get_where('data_alternatif', array('nama' =>  $nama, 'surel' => $surel), 1);
		return $query->result_array();
	}
	public function saveJawaban($id_data_alternatif, $id_kriteria, $jawaban)
	{
		$data = array(
			'id' => NULL,
			'id_data_alternatif' => $id_data_alternatif,
			'id_kriteria' => $id_kriteria,
			'nilai' => $jawaban,
			'waktu' => NULL
		);
		$this->db->insert('nilai_data_alternatif', $data);
	}
	public function getDataAlternatif()
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('data_alternatif');
		return $query->result_array();
	}
	public function getDataNilaiAlternatif()
	{
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get('nilai_data_alternatif');
		return $query->result_array();
	}
	public function getAtributKriteria()
	{
		$this->db->select('id, atribut, bobot');
		$query = $this->db->get('kriteria');
		return $query->result_array();
	}
	public function getKriteriaCost()
	{
		$this->db->select('id');
		$this->db->where('atribut', 'Cost');
		$query = $this->db->get('kriteria');
		return $query->result_array();
	}
	public function getNormalisasi()
	{
		$query = $this->db->query('SELECT a.id_data_alternatif,a.nilai,a.id_kriteria,b.atribut,b.bobot FROM nilai_data_alternatif as a join kriteria as b on a.id_kriteria=b.id');
		return $query->result_array();
	}
}
