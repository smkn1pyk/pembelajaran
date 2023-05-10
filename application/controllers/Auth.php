<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index()
	{
		if(!$this->session->userdata('username')&&!$this->session->userdata('password')){
			$this->login();
		}else{
			redirect('dashboard','refresh');
		}
	}

	function login()
	{
		if($_POST){
			$this->form_validation->set_rules('username', 'Username', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('login', '<div class="alert alert-danger">'.validation_errors().'</div>');
			} else {
				$cekUser = $this->db->get_where('users', array('username'=>$this->input->post('username')))->row_array();
				if($cekUser){
					$hash = $cekUser['password'];
					if($cekUser['password']==password_verify($this->input->post('password'), $hash)){
						if(date('m')>=7&&date('m')<=12){
							$thn_ajr = date('Y'.'1');
						}else{
							$thn_ajr = date('Y')-1;
							$thn_ajr = $thn_ajr.'2';
						}

						if($cekUser['hak_akses']=='1'){
							$cekJenisPTK = $this->db->query("SELECT Jenis_PTK from guru where NIP='".$cekUser['username']."' or NIK='".$cekUser['username']."'")->row_array();
							if($cekJenisPTK){
								$Jenis_PTK = $cekJenisPTK['Jenis_PTK'];
							}else{
								$Jenis_PTK = "Tidak diketahui";
							}
							$folder = 'Guru';
						}else
						if($cekUser['hak_akses']=='2'){
							$cekJenisPTK = $this->db->query("SELECT Jenis_PTK from tendik where NIP='".$cekUser['username']."' or NIK='".$cekUser['username']."'")->row_array();
							if($cekJenisPTK){
								$Jenis_PTK = $cekJenisPTK['Jenis_PTK'];
							}else{
								$Jenis_PTK = "Tidak diketahui";
							}
							$folder = 'Admin';
						}
						$array = array(
							'username' => $cekUser['username'],
							'password' => $cekUser['password'],
							'hak_akses' => $cekUser['hak_akses'],
							'nama' => $cekUser['Nama'],
							'thn_ajr' => $thn_ajr,
							'Jenis_PTK' => $Jenis_PTK,
							'folder' => $folder
						);

						$this->session->set_userdata( $array );
						redirect('auth','refresh');
					}else{
						$this->session->set_flashdata('login', '<div class="alert alert-danger">Kombinasi Username dan Password tidak cocok !</div>');
					}
				}else{
					$this->session->set_flashdata('login', '<div class="alert alert-danger">Akun <b>'.$this->input->post('username').'</b> tidak ditemukan !</div>');
				}
			}
		}
		
		$this->load->view('login', FALSE);
	}

	function logout()
	{
		session_destroy();
		redirect('./auth','refresh');
	}

}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */