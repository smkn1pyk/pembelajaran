<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru_form extends CI_Controller {

	
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

	private function _detail_siswa()
	{

	}

	private function _tambah_kkm()
	{
		$this->form_validation->set_rules('matpel', 'Pilih Mata Pelajaran', 'trim|required');
		$this->form_validation->set_rules('kkm', 'KKM', 'trim|required|numeric');
		if ($this->form_validation->run() == FALSE) {
			echo "<div class='alert alert-danger'>".validation_errors()."</div>";
		} else {
			$object = array(
				'uniq' => uniqid(),
				'matpel' => $this->input->post('matpel'),
				'kkm' => $this->input->post('kkm'),
				'thn_ajr' => $this->input->post('thn_ajr')
			);
			$this->db->insert('kkm', $object);
			if($this->db->trans_status()>0){
				echo "<div class='alert alert-success'>Sukses</div>";
			}else{
				echo "<div class='alert alert-danger'>Gagal menyimpan data</div>";
			}
		}
	}

	private function _input_penilaian()
	{
		if($this->input->post('nilai')){
			$su=0;
			$gu=0;
			$ss=0;
			$gs=0;
			$matpel = explode(',', $this->input->post('q'));
			$Nama_Rombel = $matpel[0];
			$Kode_Matpel = $matpel[1];
			foreach ($this->input->post('nilai') as $key => $value) {

				foreach ($value as $key1 => $value1) {
					if($value1){
						$SiswaNilai[] = $key.'&&'.$Kode_Matpel.'&&'.$value1.'&&'.$this->session->userdata('thn_ajr');
					}else{
						$SiswaNilai[] = 0;
					}
				}
			}
			if($SiswaNilai){
				foreach ($SiswaNilai as $key2 => $value2) {
					$dataNilai = explode('&&', $value2);
					if(count($dataNilai)>>1){
						$cekNilai = $this->db->get_where('nilai_rapor', array('NISN'=>$dataNilai[0],'matpel'=>$dataNilai[1],'thn_ajr'=>$dataNilai[3]))->row_array();
						if($cekNilai){
							$object = array(
								'NA' => $dataNilai[2]
							);
							$this->db->where(array('NISN'=>$dataNilai[0],'matpel'=>$dataNilai[1],'thn_ajr'=>$dataNilai[3],'uniq'=>$cekNilai['uniq']));
							$this->db->update('nilai_rapor', $object);
							if($this->db->trans_status()>0){
								$suskses_update[] = $su+1;
								$gagal_update[] = 0;
								$sukses_simpan[] = 0;
								$gagal_simpan[] = 0;
								// echo "<div class='alert alert-success'>Sukses</div>";
							}else{
								$gagal_update[] = $gu+1;
								// echo "<div class='alert alert-success'>Gagal memperbaharui data</div>";
							}
						}else{
							$object = array(
								'uniq' => uniqid(),
								'NISN' => $dataNilai[0],
								'ptk' => $this->session->userdata('nama'),
								'rombel' => $Nama_Rombel,
								'matpel' => $dataNilai[1],
								'NA' => $dataNilai[2],
								'thn_ajr' => $dataNilai[3]
							);
							$this->db->insert('nilai_rapor', $object);
							if($this->db->trans_status()>0){
								$sukses_simpan[] = $ss+1;
								$gagal_simpan[] = 0;
								$suskses_update[] = 0;
								$gagal_update[] = 0;
								// echo "<div class='alert alert-success'>Sukses</div>";
							}else{
								$gagal_simpan[] = $gs+1;
								// echo "<div class='alert alert-success'>Gagal menyimpan data</div>";
							}
						}
					}else{
						$suskses_update[] = 0;
						$gagal_update[] = 0;
						$sukses_simpan[] = 0;
						$gagal_simpan[] = 0;
					}
				}
			}
			echo "<div class='alert alert-info'>".array_sum($sukses_simpan)." Tersimpan, ".array_sum($gagal_simpan)." Gagal Tesimpan, ".array_sum($suskses_update)." Terperbaharui, ".array_sum($gagal_update)." Gagal Terperbaharui.</div>";
		}
	}

}

/* End of file Guru_form.php */
/* Location: ./application/controllers/Guru_form.php */