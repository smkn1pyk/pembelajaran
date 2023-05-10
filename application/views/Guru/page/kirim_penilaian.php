<?php
if($pembelajaran){
	?>
	<div class="mb-2">
		<form class="form-inline" method="GET">
			<div class="input btn-group">
				<select class="form-control mr-2" name="matpel">
					<option value="">Pilih ...</option>
					<?php
					foreach ($pembelajaran as $key => $value) {
						if($this->input->get('matpel')){
							if($this->input->get('matpel')==$value->uniq){
								echo "<option value='$value->uniq' selected>$value->Nama_Rombel - $value->Nama_Matpel</option>";
							}else{
								echo "<option value='$value->uniq'>$value->Nama_Rombel - $value->Nama_Matpel</option>";
							}
						}else{
							echo "<option value='$value->uniq'>$value->Nama_Rombel - $value->Nama_Matpel</option>";
						}
					}
					?>
				</select>
			</div>
			<button type="submit" class="btn btn-primary"> Pilih</button>
		</form>
	</div>
	<?php
	if($this->input->get('matpel')){
		if($this->input->get('matpel')!==''){
			if($siswa){
				?>
				<form method="POST">
					<table class="table table-striped table-bordered table-sm table-responsive-sm">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>NISN</th>
								<th>Nilai Akhir</th>
							</tr>
						</thead>
						<tbody>

							<?php
							$no=0;
							foreach ($siswa as $key => $value) {
								$matpel = $this->input->get('matpel');
								$thn_ajr = $this->session->userdata('thn_ajr');
								$cekNilai = $this->db->get_where('nilai_rapor', array('NISN'=>$value->NISN,'matpel'=>$matpel,'thn_ajr'=>$thn_ajr))->row_array();
								$no++;
								echo "<tr>";
								echo "<td>$no</td>";
								echo "<td>$value->Nama</td>";
								echo "<td>$value->NISN</td>";
								echo "<td><input type='number' name='nilai[$value->NISN][]' class='form-control' size='30' value='".$cekNilai['NA']."'></td>";
								echo "</tr>";
							}
							?>
						</tbody>
					</table>
					<div class="text-right">
						<button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
					</div>
				</form>
				<?php
			}else{
				echo "<div class='alert alert-danger'>Belum ada data siswa untuk ditampilkan!</div>";
			}
		}else{
			echo "<div class='alert-danger alert'>Tidak ada data Mata-pelajaran yang dipilih</div>";
		}
	}else{
		echo "<div class='alert-info alert'>Pilih Mata-pelajaran</div>";
	}
}
?>