<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function index()
	{
		$data['rombel'] = $this->db->query("SELECT DISTINCT(Nama_Rombel) as rombel from pembelajaran where thn_ajr='20212' and tingkat='12' order by Nama_Rombel ASC")->result();
		if($this->input->get('rombel')){
			$data['siswa'] = $this->db->get_where('siswa', array('thn_ajr'=>'20212','Rombel_Saat_Ini'=>$this->input->get('rombel')))->result();
		}else{
			$data['siswa'] = $this->db->get_where('siswa', array('thn_ajr'=>'20212','Rombel_Saat_Ini'=>'XII AKL 1'))->result();
		}
		if($this->session->userdata('kunci')){
			$this->load->view('siswa', $data, FALSE);
		}else{
			if($this->input->post('kunci')){
				if($this->input->post('kunci')=='10303912'){
					$array = array(
						'kunci' => '10303912',
						'thn_ajr' => '20212'
					);
					$this->session->set_userdata( $array );
					redirect('siswa','refresh');
				}else{
					$this->session->set_flashdata('buka_kunci', "<div class='alert alert-danger'>Kunci yang anda masukkan tidak benar !<br>Silahkan gunakan kunci yang lain</div>");
				}
			}
			$this->load->view('kunci', $data, FALSE);
		}
		
	}

	public function edit_siswa()
	{
		if($this->input->post('id')){
			$data['id'] = $this->input->post('id');
			$this->load->view('edit_siswa', $data, FALSE);
		}else{
			echo "<div class='alert alert-danger'>Terjadi kesalahan sistem</div>";
		}
	}

	public function post_siswa()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('ijazah', 'Nomor Seri Ijazah', 'trim|required');
		$this->form_validation->set_rules('skhun', 'Nomor Seri SKHUN', 'trim|required');
		$this->form_validation->set_rules('sekolah_asal', 'Sekolah Asal', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			echo "<div class='alert alert-danger'>".validation_errors()."</div>";
		} else {
			$object = array(
				'No_Seri_Ijazah' => $this->input->post('ijazah'),
				'SKHUN' => $this->input->post('skhun'),
				'Sekolah_Asal' => $this->input->post('sekolah_asal'),
				'tandai' => 1
			);
			$id = $this->input->post('q');
			$data = $this->encryption->decrypt($id);
			$data = explode(',', $data);
			$this->db->where(array('uniq'=>$data[1],'NISN'=>$data[0]));
			$this->db->update('siswa', $object);
			if($this->db->affected_rows()>0){
				echo "<div class='alert alert-success'>Sukses</div>";
			}else{
				echo "<div class='alert alert-danger'>Gagal menyimpan data</div>";
			}
		}
	}

	function keluar()
	{
		$this->session->sess_destroy();
		redirect('siswa','refresh');
	}

}

/* End of file Siswa.php */
	/* Location: ./application/controllers/Siswa.php */