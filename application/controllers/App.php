<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		if($this->input->get('semester_id')){
			$semester_id = $this->input->get('semester_id');
		}else{
			if($this->session->userdata('semester_id')){
				$semester_id = $this->session->userdata('semester_id');
			}else{
				if(date('m')>=7&&date('m')<=12){
					$semester_id = date('Y'.'1');
				}else{
					$semester_id = date('Y')-1;
					$semester_id = $semester_id.'2';
				}
			}
		}
		$array = array(
			'semester_id' => $semester_id,
			'tahun_ajaran_id' => substr($semester_id, 0, 4),
		);

		$this->session->set_userdata( $array );
	}

	public function index()
	{
		$data = [
			'title' => "Pembelajaran",
			'page' => base_url('app/data_pembelajaran'),
		];
		$this->load->view('template', $data, FALSE);
	}

	function pembelajaran()
	{
		$data = [
			'title' => "Pembelajaran",
			'page' => base_url('app/data_pembelajaran'),
		];
		$this->load->view('template', $data, FALSE);
	}

	public function data_pembelajaran()
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
		$this->load->view('pages/pembelajaran', $data, FALSE);
	}

	public function kurikulum()
	{		
		$data = [
			'title' => 'Kurikulum',
			'page' => 'data_kurikulum',
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_kurikulum()
	{
		$kurikulum = $this->db->query("SELECT DISTINCT(kurikulum_id) , tingkat_pendidikan_id, kurikulum_id_str, jurusan_id, jurusan_id_str from getrombonganbelajar where semester_id='".$this->session->userdata('semester_id')."'")->result();
		$data = [
			'kurikulum' => $kurikulum,
		];
		$this->load->view('pages/kurikulum', $data, FALSE);
	}

	public function pembagian_tugas()
	{
		$data = [
			'title' => "Pembagian Tugas",
			'page' => base_url('app/data_pembagian_tugas'),
		];
		$this->load->view('template', $data, FALSE);
	}

	function data_pembagian_tugas()
	{
		$gtk = $this->db->query("SELECT * from getgtk where tahun_ajaran_id='".$this->session->userdata('tahun_ajaran_id')."' and jenis_ptk_id!='11'")->result();
		if($this->input->get('gtk')){
			$pembelajaran = $this->db->get_where('pembelajaran', ['ptk_terdaftar_id'=>$this->input->get('gtk'), 'semester_id'=>$this->session->userdata('semester_id')])->result();
		}else{
			$pembelajaran = $this->db->get_where('pembelajaran', ['ptk_terdaftar_id'=>$gtk[0]->ptk_terdaftar_id, 'semester_id'=>$this->session->userdata('semester_id')])->result();
		}
		$data = [
			'gtk' => $gtk,
			'pembelajaran' => $pembelajaran,
		];
		$this->load->view('pages/pembagian_tugas', $data, FALSE);
	}

}
