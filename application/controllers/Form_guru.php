<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form_guru extends CI_Controller {

	public function index()
	{
		
		$data['title'] = "Form Guru";
		$data['guru'] = $this->db->get('guru_luar_dapodik')->result();
		$this->load->view('form_guru', $data, FALSE);		
	}

	public function simpan_data()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('Nama', 'Nama', 'trim|required');
		$this->form_validation->set_rules('NUPTK', 'NUPTK', 'trim|required');
		$this->form_validation->set_rules('NIP', 'NIP', 'trim|required');
		$this->form_validation->set_rules('NIK', 'NIK', 'trim|required|is_unique[guru_luar_dapodik.NIK]');
		$this->form_validation->set_rules('Jenis_Kelamin', 'Jenis Kelamin', 'trim|required');
		$this->form_validation->set_rules('Tempat_Lahir', 'Tempat Lahir', 'trim|required');
		$this->form_validation->set_rules('Tanggal_Lahir', 'Tanggal Lahir', 'trim|required');
		$this->form_validation->set_rules('Agama', 'Agama', 'trim|required');
		$this->form_validation->set_rules('email', 'E-Mail', 'trim|required');
		$this->form_validation->set_rules('matpel_rombel', 'Matpel & Rombel', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
			echo '<div class="alert alert-danger">'.validation_errors().'</div>';
		} else {
			$object = array(
				'uniq' => uniqid(),
				'Nama' => $this->input->post('Nama'),
				'NUPTK' => $this->input->post('NUPTK'),
				'NIP' => $this->input->post('NIP'),
				'NIK' => $this->input->post('NIK'),
				'Jenis_Kelamin' => $this->input->post('Jenis_Kelamin'),
				'Tempat_Lahir' => $this->input->post('Tempat_Lahir'),
				'Tanggal_Lahir' => $this->input->post('Tanggal_Lahir'),
				'Agama' => $this->input->post('Agama'),
				'Alamat_Jalan' => $this->input->post('Alamat_Jalan'),
				'RT' => $this->input->post('RT'),
				'RW' => $this->input->post('RW'),
				'Desa' => $this->input->post('Desa'),
				'Kecamatan' => $this->input->post('Kecamatan'),
				'Kode_Pos' => $this->input->post('Kode_Pos'),
				'HP' => $this->input->post('HP'),
				'Email' => $this->input->post('email'),
				'matpel_rombel' => $this->input->post('matpel_rombel')
			);
			$this->db->insert('guru_luar_dapodik', $object);
			if($this->db->affected_rows() >> 0){
				echo '<div class="alert alert-success">Sukses Terimakasih, data anda berhasil ditambahkan</div>';
			}else{
				echo '<div class="alert alert-success">Mohon maaf, gagal menyimpan data, terjadi kesalahan sistem</div>';
			}
		}
	}

}

/* End of file Form_guru.php */
/* Location: ./application/controllers/Form_guru.php */