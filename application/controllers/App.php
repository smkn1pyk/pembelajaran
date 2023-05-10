<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
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
			'semester_id' => $semester_id,
			'tahun_ajaran_id' => substr($semester_id, 0, 4),
		);

		$this->session->set_userdata( $array );
		$data = [
			'title' => "Pembelajaran",
			'page' => base_url('app/pembelajaran'),
			'semester_id' => $this->db->query("SELECT DISTINCT(semester_id) as semester_id from getsekolah order by semester_id DESC")->result(),
		];
		$this->load->view('template', $data, FALSE);
	}

	public function pembelajaran()
	{
		$this->db->order_by('nama', 'asc');
		$rombel = $this->db->get_where('getrombonganbelajar', ['semester_id'=>$this->session->userdata('semester_id')])->result();
		if($this->input->get('rombel')){
			$rombel1 = $this->db->get_where('getrombonganbelajar', ['rombongan_belajar_id'=>$this->input->get('rombel'),'semester_id'=>$this->session->userdata('semester_id')])->row_array();
			$pembelajaran = $this->db->get_where('pembelajaran', ['rombongan_belajar_id'=>$this->input->get('rombel'), 'semester_id'=>$rombel1['semester_id']])->result();
		}else{
			$this->db->order_by('nama', 'asc');
			$rombel1 = $this->db->get_where('getrombonganbelajar', ['semester_id'=>$this->session->userdata('semester_id')])->row_array();
			$pembelajaran = $this->db->get_where('pembelajaran', ['rombongan_belajar_id'=>$rombel1['rombongan_belajar_id'], 'semester_id'=>$rombel1['semester_id']])->result();
		}
		$data = [
			'title' => 'Pembelajaran',
			'rombel' =>  $rombel,
			'rombel1' => $rombel1,
			'pembelajaran' => $pembelajaran,
		];
		$this->load->view('pages/pembelajaran1', $data, FALSE);
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

}
