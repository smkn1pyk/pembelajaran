<?php
if($guru)
{
	?>
		<!-- <form class="form-inline mb-2 bg-donker p-2 rounded">
			<div class="input-group">
				<select class="form-control mr-2" name="guru">
					<?php
					foreach ($guru as $key => $value) {
						if($this->input->get('guru')){
							if($this->input->get('guru')==$value->Nama_PTK){
								echo "<option value='$value->Nama_PTK' selected>$value->Nama_PTK</option>";
							}else{
								echo "<option value='$value->Nama_PTK'>$value->Nama_PTK</option>";
							}
						}else{
							echo "<option value='$value->Nama_PTK'>$value->Nama_PTK</option>";
						}
					}
					?>
				</select>
			</div>
			<div class="input-group">
				<button class="btn btn-primary"><i class="fa fa-search"></i> Cari</button>
			</div>
		</form> -->
		<?php
		foreach ($guru as $key => $value) {
			echo "<h5 class='alert bg-donker text-light'><b><i class='fa fa-user'></i> ".$value->Nama_PTK.'</b></h5>';
			$this->db->order_by('Nama_Rombel', 'asc');
			$pembelajaran = $this->db->get_where('pembelajaran', array('Nama_PTK'=>$value->Nama_PTK,'thn_ajr'=>$this->session->userdata('thn_ajr')))->result();
			echo "<table class='table table-sm small table-responsive-sm table-bordered table-striped' border='1'>";
			echo "<tr>";
			echo "<th>No</th>";
			echo "<th>Nama Matpel</th>";
			echo "<th>Nama Rombel</th>";
			echo "<th>JJM</th>";
			echo "<th>Jumlah Siswa</th>";
			echo "<th>Status di Kurikulum</th>";
			echo "<tr>";
			$no = 0;
			$guru = $value->Nama_PTK;
			foreach ($pembelajaran as $key1 => $value1) {
				$no++;
				echo "<tr>";
				echo "<td>$no</td>";
				echo "<td>$value1->Nama_Matpel</td>";
				echo "<td>$value1->Nama_Rombel</td>";
				echo "<td>$value1->JJM</td>";
				echo "<td>$value1->Jml_Siswa</td>";
				if($value1->Status_di_Kurikulum != '-'){
					echo "<td>$value1->Status_di_Kurikulum</td>";
				}else{
					echo "<td>Matpel Pilihan</td>";
				}
				echo "</tr>";
				$JJM[$guru][] = $value1->JJM;
				$Tsiswa[$guru][] = $value1->Jml_Siswa;
			}
			// $tjjm = $this->db->query('SELECT Nama_Rombel from pembelajaran where Nama_PTK="{$guru}"')->result();
			echo "<tr class='font-weight-bold text-primary'>";
			echo "<td colspan='3'>Total</td>";
			echo "<td>".array_sum($JJM[$guru])." Jam</td>";
			echo "<td>".array_sum($Tsiswa[$guru])." Siswa</td>";
			echo "<td></td>";
			echo "</tr>";
			echo "</table>";
		}
	}else{
		echo "<div class='alert alert-danger'>Belum ada data</div>";
	}
	?>