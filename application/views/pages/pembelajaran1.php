<?php
if($rombel){
	$n=0;
	foreach ($rombel as $key => $value) {
		$n++;
		echo "<div class='alert bg-donker text-light'>{$n}. $value->Nama_Rombel, $value->Jml_Siswa Peserta Didik</div>";
		$this->db->order_by('Kode_Matpel', 'asc');
		$pembelajaran = $this->db->get_where('pembelajaran', array('Nama_Rombel'=>$value->Nama_Rombel,'thn_ajr'=>$this->session->userdata('thn_ajr')))->result();{
			if($pembelajaran){
				$no=0;
				echo "<table class='table table-sm table-bordered small rounded table-responsive-sm shadow'>";
				echo "<tr class='bg-donker text-light'>";
				echo "<th>No</th>";
				echo "<th>Kode Bidang Studi</th>";
				echo "<th>Bidang Studi</th>";
				echo "<th>PTK</th>";
				echo "<th>SK Mengajar</th>";
				echo "<th>Tgl SK Mengajar</th>";
				echo "<th>Status di Kurikulum</th>";
				echo "<th>Jumlah Jam</th>";
				echo "</tr>";
				foreach ($pembelajaran as $key => $value) {
					$no++;

					if($value->Status_di_Kurikulum=='Matpel Bidang Studi Wajib A'){
						echo "<tr class='alert-success'>";
						echo "<td>$no</td>";
						echo "<td>$value->Kode_Matpel</td>";
						echo "<td>$value->Nama_Matpel</td>";
						echo "<td>$value->Nama_PTK</td>";
						echo "<td>$value->SK_Mengajar</td>";
						echo "<td>$value->Tgl_SK_Mengajar</td>";
						echo "<td>$value->Status_di_Kurikulum</td>";
						echo "<td>$value->JJM Jam</td>";
						echo "</tr>";
					}else
					if($value->Status_di_Kurikulum=='Matpel Bidang Studi Wajib B'){
						echo "<tr class='alert-warning'>";
						echo "<td>$no</td>";
						echo "<td>$value->Kode_Matpel</td>";
						echo "<td>$value->Nama_Matpel</td>";
						echo "<td>$value->Nama_PTK</td>";
						echo "<td>$value->SK_Mengajar</td>";
						echo "<td>$value->Tgl_SK_Mengajar</td>";
						echo "<td>$value->Status_di_Kurikulum</td>";
						echo "<td>$value->JJM Jam</td>";
						echo "</tr>";
					}else
					if($value->Status_di_Kurikulum=='Kejuruan'){
						echo "<tr class='alert-dark'>";
						echo "<td>$no</td>";
						echo "<td>$value->Kode_Matpel</td>";
						echo "<td>$value->Nama_Matpel</td>";
						echo "<td>$value->Nama_PTK</td>";
						echo "<td>$value->SK_Mengajar</td>";
						echo "<td>$value->Tgl_SK_Mengajar</td>";
						echo "<td>$value->Status_di_Kurikulum</td>";
						echo "<td>$value->JJM Jam</td>";
						echo "</tr>";
					}else
					if($value->Status_di_Kurikulum=='Matpel Lainnya'){
						echo "<tr class='alert-primary'>";
						echo "<td>$no</td>";
						echo "<td>$value->Kode_Matpel</td>";
						echo "<td>$value->Nama_Matpel</td>";
						echo "<td>$value->Nama_PTK</td>";
						echo "<td>$value->SK_Mengajar</td>";
						echo "<td>$value->Tgl_SK_Mengajar</td>";
						echo "<td>$value->Status_di_Kurikulum</td>";
						echo "<td>$value->JJM Jam</td>";
						echo "</tr>";
					}else
					if($value->Status_di_Kurikulum=='-'){
						echo "<tr class='alert-danger'>";
						echo "<td>$no</td>";
						echo "<td>$value->Kode_Matpel</td>";
						echo "<td>$value->Nama_Matpel</td>";
						echo "<td>$value->Nama_PTK</td>";
						echo "<td>$value->SK_Mengajar</td>";
						echo "<td>$value->Tgl_SK_Mengajar</td>";
						echo "<td>Matpel Pilihan</td>";
						echo "<td>$value->JJM Jam</td>";
						echo "</tr>";
					}else{
						echo "<tr class=''>";
						echo "<td>$no</td>";
						echo "<td>$value->Kode_Matpel</td>";
						echo "<td>$value->Nama_Matpel</td>";
						echo "<td>$value->Nama_PTK</td>";
						echo "<td>$value->SK_Mengajar</td>";
						echo "<td>$value->Tgl_SK_Mengajar</td>";
						echo "<td>$value->Status_di_Kurikulum</td>";
						echo "<td>$value->JJM Jam</td>";
						echo "</tr>";
					}
					$TJJM[$value->Nama_Rombel][] = $value->JJM;
				}
				echo "<tr class='font-weight-bold'>";
				echo "<td colspan='6'></td>";
				echo "<td>".array_sum($TJJM[$value->Nama_Rombel])." Jam</td>";
				echo "</tr>";
				echo "</table>";
			}else{
				echo "<div class='alert alert-danger'>Belum ada data pembeljaran tersimpan</div>";
			}
		}
	}
}else{
	echo "<div class='alert alert-danger'>Belum ada data untuk ditampilkan</div>";
}
?>