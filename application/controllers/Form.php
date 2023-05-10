<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
		$this->load->library('form_validation');
		// if(empty($this->session->userdata('username'))&&empty($this->session->userdata('password'))&&empty($this->session->userdata('hak_akses'))&&empty($this->session->userdata('tanggal'))){
		// 	echo "<div class='alert alert-danger'>Sesi anda telah habis, silahkan keluar dan login kembali !</div>";
		// 	$this->session->sess_destroy();
		// 	redirect('home','refresh');
		// }
	}

	public function index()
	{
		if($this->input->post('page')){
			$dataUser=$this->session->all_userdata();
			$page = $this->input->post('page');
			$page1 = '_'.$page;
			$this->load->view('form/'.$page, $data='');
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

	private function _import_pembelajaran()
	{
		if(!empty($_FILES['berkas']['name'])){
			$this->load->library('Excel');
			$excel = PHPExcel_IOFactory::load($_FILES['berkas']['tmp_name']);
			$excel->setActiveSheetIndex(0);
			if($excel->getActiveSheet()->getCell('A1')->getValue() =='Rekap Pembelajaran'&&$excel->getActiveSheet()->getCell('A8')->getValue() =='No'){
				$this->proses_import_pembelajaran();
			}else{
				echo "<div class='alert-danger alert'>File import yang digunakan harus data pembelajaran yang diunduh dari Dapodik !</div>";
			}
		}else{
			echo "<div class='alert-danger alert'>Tidak ada berkas yang diilih</div>";
		}
	}

	private function proses_import_pembelajaran()
	{
		$this->db->where('thn_ajr', $this->session->userdata('thn_ajr'));
		$this->db->delete('pembelajaran');
		// if($this->db->affected_rows()>0){
		// 	echo "<div class='alert alert-success'>Sukses</div>";
		// }else{
		// 	echo "<div class='alert alert-danger'>Gagal menyimpan data</div>";
		// }

		$this->load->library('Excel');
		$excel = PHPExcel_IOFactory::load($_FILES['berkas']['tmp_name']);
		$excel->setActiveSheetIndex(0);
		$i = 9;

		while ( $excel->getActiveSheet()->getCell('B'.$i)->getValue() !='' ) {
			$dataPembelajaran[$i] = array(
				'uniq' => uniqid(),
				'Jenis_Rombel' 				=> strval($excel->getActiveSheet()->getCell('B'.$i)->getValue()),
				'Tingkat' 					=> strval($excel->getActiveSheet()->getCell('C'.$i)->getValue()),
				'Nama_Rombel' 				=> strval($excel->getActiveSheet()->getCell('D'.$i)->getValue()),
				'Kurikulum' 				=> strval($excel->getActiveSheet()->getCell('E'.$i)->getValue()),
				'Kompetensi_Keahlian' 		=> strval($excel->getActiveSheet()->getCell('F'.$i)->getValue()),
				'Nama_PTK' 					=> strval($excel->getActiveSheet()->getCell('G'.$i)->getValue()),
				'NUPTK' 					=> strval($excel->getActiveSheet()->getCell('H'.$i)->getValue()),
				'PTK_Induk' 				=> strval($excel->getActiveSheet()->getCell('I'.$i)->getValue()),
				'Kepegawaian' 				=> strval($excel->getActiveSheet()->getCell('J'.$i)->getValue()),
				'Nama_Matpel' 				=> strval($excel->getActiveSheet()->getCell('K'.$i)->getValue()),
				'Kode_Matpel' 				=> strval($excel->getActiveSheet()->getCell('L'.$i)->getValue()),
				'JJM' 						=> strval($excel->getActiveSheet()->getCell('M'.$i)->getValue()),
				'Jml_Siswa' 				=> strval($excel->getActiveSheet()->getCell('N'.$i)->getValue()),
				'Tgl_SK_Mengajar' 			=> strval($excel->getActiveSheet()->getCell('O'.$i)->getValue()),
				'SK_Mengajar' 				=> strval($excel->getActiveSheet()->getCell('P'.$i)->getValue()),
				'Status_di_Kurikulum' 		=> strval($excel->getActiveSheet()->getCell('Q'.$i)->getValue()),
				'thn_ajr' 					=> $this->session->userdata('thn_ajr')
			);
			$this->_cekDataImportPembelajaran($dataPembelajaran[$i]);
			$i++;
		}
	}

	private function _cekDataImportPembelajaran($dataPembelajaran)
	{
		$this->db->insert('pembelajaran', $dataPembelajaran);
		if($this->db->affected_rows()>0){
			echo "<div class='alert alert-success'>Sukses</div>";
		}else{
			echo "<div class='alert alert-danger'>Gagal menyimpan data</div>";
		}
	}

}

/* End of file Form.php */
/* Location: ./application/controllers/Form.php */