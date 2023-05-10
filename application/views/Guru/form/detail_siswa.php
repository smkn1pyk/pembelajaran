<?php
if($this->input->post('data')){
	$cekSiswa = $this->db->get_where('siswa', array('NISN'=>$this->input->post('data')))->row_array();
	if($cekSiswa){
		echo "<table class='table table-sm table-striped table-bordered table-responsive-sm'>";
		foreach ($cekSiswa as $key => $value) {
			if($key!='id'&&$key!='uniq'){
				echo "<tr>";
				echo "<td>".ucfirst(str_replace('_', ' ', $key))."</td>";
				echo "<td>$value</td>";
				echo "</tr>";
			}
		}
		echo "</table>";
	}else{
		echo "<div class='alert alert-danger'>Terjadi kesalahan sistem, data tidak ditemukan</div>";
	}
}else{
	echo "<div class='alert alert-danger'>Terjadi kesalahan sistem</div>";
}