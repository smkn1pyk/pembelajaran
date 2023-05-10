<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data_master extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if(empty($this->session->userdata('username'))&&empty($this->session->userdata('password'))&&empty($this->session->userdata('hak_akses'))){
			echo "<div class='alert alert-danger'>Sesi anda telah habis, silahkan keluar dan login kembali !</div>";
			$this->session->sess_destroy();
			redirect('home','refresh');
		}
	}

	function users()
	{
		$data['page'] = 'users';
		$data['title'] = 'Users';
		$data['users'] = $this->db->get('users')->result();
		$this->load->view('User_Template', $data, FALSE);
	}

	function data_siswa()
	{
		$data['page'] = 'data_siswa';
		$data['title'] = 'Data Siswa';
		// $this->db->order_by('Rombel_Saat_Ini', 'ASC');
		$data['rombel'] = $this->db->query("SELECT DISTINCT(Rombel_Saat_Ini) as rombel from siswa where thn_ajr='".$this->session->userdata('thn_ajr')."' order by Rombel_Saat_Ini ASC")->result();
		if($this->input->get('rombel')){
			$this->db->limit(36);
			$data['siswa'] = $this->db->get_where('siswa', array('thn_ajr'=>$this->session->userdata('thn_ajr'),'Rombel_Saat_Ini'=>$this->input->get('rombel')))->result();
		}else{
			$this->db->limit(36);
			$data['siswa'] = $this->db->get_where('siswa', array('thn_ajr'=>$this->session->userdata('thn_ajr'),'Rombel_Saat_Ini'=>'X AKL 1'))->result();
		}
		$this->load->view('User_Template', $data, FALSE);
	}

}

/* End of file Data_master.php */
/* Location: ./application/controllers/Data_master.php */