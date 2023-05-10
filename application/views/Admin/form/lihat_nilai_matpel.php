<?php
if($this->input->post('data')){
	$data = $this->encryption->decrypt($this->input->post('data'));
	$data = explode(',', $data);
	$cekSiswa = $this->db->get_where('siswa', array('Rombel_Saat_Ini'=>$data[0],'thn_ajr'=>$this->session->userdata('thn_ajr')))->result();
	if($cekSiswa){
		?>
		<table class="table table-sm table table-striped table-bordered table-responsive-sm small">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Nilai Akhir</th>
				</tr>
			</thead>
			<tbody>
				<?php
				$no=0;
				foreach ($cekSiswa as $key => $value) {
					$no++;
					$cekNilai = $this->db->get_where('nilai_rapor', array('NISN'=>$value->NISN,'matpel'=>$data[1],'thn_ajr'=>$this->session->userdata('thn_ajr')))->row_array();
					echo "<tr>";
					echo "<td>$no</td>";
					echo "<td>$value->Nama</td>";
					echo "<td>".$cekNilai['NA']."</td>";
					echo "</tr>";
				}
				?>
			</tbody>
		</table>
		<?php
	}else{
		echo "<div class='alert alert-danger'>Data siswa tidak ditemukan</div>";
	}
}else{
	echo "<div class='alert alert-danger'>Terjadi kesalahan sistem</div>";
}