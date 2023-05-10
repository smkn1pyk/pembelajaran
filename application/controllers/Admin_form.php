<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_form extends CI_Controller {

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

	public function index()
	{
		if($this->input->post('page')){
			$dataUser=$this->session->all_userdata();
			$page = $this->input->post('page');
			$page1 = '_'.$page;
			$folder = $this->session->userdata('folder');
			$this->load->view($folder.'/form/'.$page, $data='');
		}else{
			echo "No direct script access allowed";
		}
	}


	public function post()
	{
		if($this->input->post('page'))
		{
			$post = $this->input->post('page');
			$post1 = '_'.$post;
			$this->$post1($post);
		}else{
			echo "No direct script access allowed";
		}
	}

}

/* End of file Admin_form.php */
/* Location: ./application/controllers/Admin_form.php */