<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if($this->input->get('semester_id')){
			$semester_id = $this->input->get('semester_id');
		}else{
			if(date('m')>=7&&date('m')<=12){
				$semester_id = date('Y'.'1');
			}else{
				$semester_id = date('Y')-1;
				$semester_id = $semester_id.'2';
			}
		}
		$array = array(
			'semester_id' => $semester_id
		);

		$this->session->set_userdata( $array );
	}

	public function index()
	{
		$data['cekThnAjr'] = $this->db->query("SELECT DISTINCT(semester_id) as semester_id from pembelajaran order by semester_id DESC")->result();
		$this->halaman2();
	}

	public function kompetensi()
	{
		$data['cekThnAjr'] = $this->db->query("SELECT DISTINCT(semester_id) as semester_id from pembelajaran order by semester_id DESC")->result();
		$data['page'] = 'kompetensi';
		$data['kompetensi'] = $this->db->query("SELECT DISTINCT(Kompetensi_Keahlian) as kompetensi,Kurikulum,Tingkat from pembelajaran where semester_id='".$this->session->userdata('semester_id')."' order by Tingkat ASC")->result();
		$this->load->view('template', $data, FALSE);
	}

	public function halaman1()
	{
		$data['cekThnAjr'] = $this->db->query("SELECT DISTINCT(semester_id) as semester_id from pembelajaran order by semester_id DESC")->result();
		$data['page'] = 'pembelajaran';
		$data['guru'] = $this->db->query("SELECT DISTINCT Nama_PTK from pembelajaran where semester_id='".$this->session->userdata('semester_id')."' order by Nama_PTK")->result();
		$this->load->view('template', $data, FALSE);
	}

	function halaman2()
	{		
		$data['cekThnAjr'] = $this->db->query("SELECT DISTINCT(semester_id) as semester_id from pembelajaran order by semester_id DESC")->result();
		$data['page'] = 'pembelajaran1';
		$data['title'] = 'Rekap Mengajar';
		$data['rombel'] = $this->db->query("SELECT DISTINCT rombongan_belajar_id from pembelajaran where semester_id='".$this->session->userdata('semester_id')."' order by rombongan_belajar_id")->result();
		$this->load->view('template', $data, FALSE);
	}

}
