<?php
if($rombel){
	?>
	<form class="form-inline mb-2" method="GET">
		<div class="input-group">
			<select name="rombel" class="form-control">
				<?php
				foreach ($rombel as $key => $value) {
					if($this->input->get('rombel')){
						if($this->input->get('rombel')==$value->Nama_Rombel){
							echo "<option value='$value->Nama_Rombel' selected>$value->Nama_Rombel</option>";
						}else{
							echo "<option value='$value->Nama_Rombel'>$value->Nama_Rombel</option>";
						}
					}else{
						echo "<option value='$value->Nama_Rombel'>$value->Nama_Rombel</option>";
					}
				}
				?>
			</select>
		</div>
		<div class="input-group ml-2">
			<button class="btn btn-primary"><i class="fa fa-search"></i></button>
		</div>
	</form>
	<?php
	if($this->input->get('rombel')){
		if($pembelajaran){
			?>
			<table class="table table-striped table-bordered table-sm table-responsive-sm">
				<thead>
					<tr class="bg-donker text-light text-center">
						<th>No</th>
						<th>Kode Matpel</th>
						<th>Nama Matpel</th>
						<th>PTK</th>
						<th>JJM</th>
						<th>Status Kurikulum</th>
						<th>KKM</th>
						<th>Status Penilaian</th>
						<th>Lihat Nilai</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 0;
					foreach ($pembelajaran as $key => $value) {
						$cekKKM = $this->db->get_where('kkm', array('matpel'=>$value->Kode_Matpel,'thn_ajr'=>$this->session->userdata('thn_ajr')))->row_array();
						$cekNilaiRapor = $this->db->get_where('nilai_rapor', array('matpel'=>$value->Kode_Matpel,'thn_ajr'=>$this->session->userdata('thn_ajr'),'ptk'=>$value->Nama_PTK,'rombel'=>$this->input->get('rombel')))->result();
						$no++;
						echo "<tr>";
						echo "<td>$no</td>";
						echo "<td>$value->Kode_Matpel</td>";
						echo "<td>$value->Nama_Matpel</td>";
						echo "<td>$value->Nama_PTK</td>";
						echo "<td>$value->JJM</td>";
						echo "<td>$value->Status_di_Kurikulum</td>";
						if($cekKKM){
							echo "<td>".$cekKKM['kkm']."</td>";
						}else{
							echo "<td></td>";
						}

						if($cekNilaiRapor){
							echo "<td class='text-center'><i class='fas fa-check text-primary'></i></td>";
							$data_id = $this->encryption->encrypt($this->input->get('rombel').','.$value->Kode_Matpel);
							echo "<td class='text-center'><button class='btn btn-link buka-modal' id='lihat_nilai_matpel' data-id='$data_id'><i class='fa fa-eye'></i></button></td>";
						}else{
							echo "<td></td>";
							echo "<td></td>";
						}
						
						echo "</tr>";
					}
					?>
				</tbody>
			</table>
			<?php
		}else{
			echo "<div class='alert alert-danger'>Belum ada data pembelajaran tersimpan</div>";
		}
	}
}else{
	echo "<div class='alert alert-danger'>Belum ada data pembelajaran tersimpan</div>";
}