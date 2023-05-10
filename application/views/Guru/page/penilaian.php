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
							if($this->input->get('matpel')==$value->Nama_Rombel.','.$value->Kode_Matpel){
								echo "<option value='$value->Nama_Rombel,$value->Kode_Matpel' selected>$value->Nama_Rombel - $value->Nama_Matpel</option>";
							}else{
								echo "<option value='$value->Nama_Rombel,$value->Kode_Matpel'>$value->Nama_Rombel - $value->Nama_Matpel</option>";
							}
						}else{
							echo "<option value='$value->Nama_Rombel,$value->Kode_Matpel'>$value->Nama_Rombel - $value->Nama_Matpel</option>";
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
				echo $this->session->flashdata('mssg');
				?>
				<form method="POST" id="form">
					<input type="hidden" name="page" value="input_penilaian">
					<input type="hidden" name='q' value="<?= $this->input->get('matpel') ?>">
					<table class="table table-striped table-bordered table-sm table-responsive-sm">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>NISN</th>
								<?php if($this->session->userdata('Jenis_PTK')=='Guru Mapel'){ ?>
									<th>Nilai Akhir</th>
									<?php 
								}else
								if($this->session->userdata('Jenis_PTK')=='Guru BK'){ ?>
									<th>Sakit</th>
									<th>Izin</th>
									<th>Tanpa Keterangan</th>
								<?php } ?>
							</tr>
						</thead>
						<tbody>

							<?php
							$no=0;
							foreach ($siswa as $key => $value) {
								$thn_ajr = $this->session->userdata('thn_ajr');
								$matpel =  explode(',', $this->input->get('matpel'));
								$rombel = $matpel[0];
								$matpel = $matpel[1];
								$no++;
								echo "<tr>";
								echo "<td>$no</td>";
								echo "<td>$value->Nama</td>";
								echo "<td>$value->NISN</td>";
								if($this->session->userdata('Jenis_PTK')=='Guru Mapel'){
									$cekNilai = $this->db->get_where('nilai_rapor', array('NISN'=>$value->NISN,'matpel'=>$matpel,'thn_ajr'=>$thn_ajr))->row_array();
									echo "<td><input type='text' name='nilai[$value->NISN][]' class='form-control' value='".$cekNilai['NA']."'></td>";
								}else
								if($this->session->userdata('Jenis_PTK')=='Guru BK'){
									$cekNilai = $this->db->get_where('absensi', array('NISN'=>$value->NISN,'rombel'=>$rombel,'thn_ajr'=>$thn_ajr))->row_array();
									echo "<td><input type='hidden' name='NISN[]' class='form-control' value='".$value->NISN."'><input type='text' name='sakit[]' class='form-control' value='".$cekNilai['sakit']."'></td>";
									echo "<td><input type='text' name='izin[]' class='form-control' value='".$cekNilai['izin']."'></td>";
									echo "<td><input type='text' name='alfa[]' class='form-control' value='".$cekNilai['alfa']."'></td>";
								}
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