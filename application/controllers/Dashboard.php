<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index()
	{
		if(!$this->session->userdata('username')&&!$this->session->userdata('password')){
			redirect('auth','refresh');
		}	else{
			$data['page'] = 'dashboard';
			$data['title'] = 'Dashboard';
			if($this->session->userdata('hak_akses')=='1'){
				$this->db->order_by('Nama_Rombel', 'ASC');
				$data['cekPembelajaran'] = $this->db->get_where('pembelajaran', array('Nama_PTK'=>$this->session->userdata('nama'),'thn_ajr'=>$this->session->userdata('thn_ajr')))->result();
			}else
			if($this->session->userdata('hak_akses')==2){
				$data['rombel'] = $this->db->query("SELECT DISTINCT(Nama_Rombel) as Nama_Rombel from pembelajaran where thn_ajr='".$this->session->userdata('thn_ajr')."' order by Nama_Rombel ASC")->result();
				if($this->input->get('rombel')){
					$this->db->order_by('Kode_Matpel', 'DESC');
					$data['pembelajaran'] = $this->db->get_where('pembelajaran', array('Nama_Rombel'=>$this->input->get('rombel'),'thn_ajr'=>$this->session->userdata('thn_ajr')))->result();
				}
			}
			$this->load->view('User_Template', $data, FALSE);
		}	
	}

}

/* End of file Dashboard.php */
/* Location: ./application/controllers/Dashboard.php */