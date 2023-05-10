<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		if(!$this->session->userdata('username')&&!$this->session->userdata('password')){
			$this->session->sess_destroy();
			redirect('auth','refresh');
		}else{
			if($this->session->userdata('hak_akses')!='1'){
				redirect('auth','refresh');
			}
		}
	}

	public function input_penilaian()
	{
		$data['page'] = 'penilaian';
		$data['title'] = 'input penilaian';
		$this->db->order_by('Nama_Rombel', 'ASC');
		$data['pembelajaran'] = $this->db->get_where('pembelajaran', array('Nama_PTK'=>$this->session->userdata('nama'),'thn_ajr'=>$this->session->userdata('thn_ajr')))->result();
		if($this->input->get('matpel')){
			$matpel = explode(',', $this->input->get('matpel'));
			$Nama_Rombel = $matpel[0];
			$Kode_Matpel = $matpel[1];
			$id_pembelajaran = $this->db->get_where('pembelajaran', array('Kode_Matpel'=>$Kode_Matpel,'Nama_Rombel'=>$Nama_Rombel))->row_array();
			if($id_pembelajaran){
				$data['siswa'] = $this->db->get_where('siswa', array('Rombel_Saat_Ini'=>$id_pembelajaran['Nama_Rombel'],'thn_ajr'=>$this->session->userdata('thn_ajr')))->result();
			}
		}
		
		$this->load->view('User_Template', $data, FALSE);
	}

	function kirim_penilaian()
	{
		$data['page'] = 'kirim_penilaian';
		$data['title'] = 'Kirim penilaian';
		$this->db->order_by('Nama_Rombel', 'ASC');
		$data['pembelajaran'] = $this->db->get_where('pembelajaran', array('Nama_PTK'=>$this->session->userdata('nama'),'thn_ajr'=>$this->session->userdata('thn_ajr')))->result();
		if($this->input->get('matpel')){
			$id_pembelajaran = $this->db->get_where('pembelajaran', array('uniq'=>$this->input->get('matpel')))->row_array();
			if($id_pembelajaran){
				$data['siswa'] = $this->db->get_where('siswa', array('Rombel_Saat_Ini'=>$id_pembelajaran['Nama_Rombel'],'thn_ajr'=>$this->session->userdata('thn_ajr')))->result();
			}
		}
		$this->load->view('User_Template', $data, FALSE);
	}

}

/* End of file Penilaian.php */
/* Location: ./application/controllers/Penilaian.php */