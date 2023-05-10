<?php
if($rombel){
	$n=0;
	?>
	<div class="form-inline mb-3">
		<select name="rombel" class="form-control" hx-get="<?= base_url('app/data_pembelajaran') ?>" hx-target="#data">
			<option value="">Pilih Rombel</option>
			<?php foreach ($rombel as $key => $value): ?>
				<?php
				if($this->input->get('rombel')){
					if($value->rombongan_belajar_id==$this->input->get('rombel')){
						?> <option value="<?= $value->rombongan_belajar_id ?>" selected><?= $value->nama ?> - <?= $value->jenis_rombel_str ?></option> <?php
					}else{
						?> <option value="<?= $value->rombongan_belajar_id ?>"><?= $value->nama ?> - <?= $value->jenis_rombel_str ?></option> <?php
					}
				}else{
					?> <option value="<?= $value->rombongan_belajar_id ?>"><?= $value->nama ?> - <?= $value->jenis_rombel_str ?></option> <?php
				}
				?>
			<?php endforeach ?>
		</select>
	</div>
	<div class="card">
		<div class="card-header bg-donker text-light">
			<?= $rombel1['nama'] ?> - <?= $rombel1['jenis_rombel_str'] ?>
		</div>
		<div class="card-body">
			<?php
			
			if($pembelajaran){
				?>
				<div class="table-responsive">
					<table class="table table-sm">
						<thead>
							<tr>
								<th>No</th>
								<th>Kode Matpel</th>
								<th>Nama MAtpel</th>
								<th>PTK</th>
								<th>JJM</th>
								<th>Status di Kurikulum</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($pembelajaran as $key1 => $value1):$key1++; ?>
								<?php
								$ptk = $this->db->get_where('getgtk', ['ptk_terdaftar_id'=>$value1->ptk_terdaftar_id, 'tahun_ajaran_id'=>$this->session->userdata('tahun_ajaran_id')])->row_array();
								$jjm[] = $value1->jam_mengajar_per_minggu;
								?>
								<tr>
									<td><?= $key1 ?></td>
									<td><?= $value1->mata_pelajaran_id ?></td>
									<td><?= $value1->mata_pelajaran_id_str ?></td>
									<td>
										<?php
										if($ptk){
											echo $ptk['nama'];
										}
										?>
									</td>
									<td><?= $value1->jam_mengajar_per_minggu ?></td>
									<td><?= $value1->status_di_kurikulum_str ?></td>
								</tr>
							<?php endforeach ?>
						</tbody>
						<tfoot>
							<tr>
								<td colspan="4">Total Jam</td>
								<td><?= array_sum($jjm) ?></td>
								<td></td>
							</tr>
						</tfoot>
					</table>
				</div>
				<?php
			}else{
				?> <div class="alert alert-danger"> 0 Results </div> <?php
			}
			?>
		</div>
	</div>
	<?php
}else{
	echo "<div class='alert alert-danger'>Belum ada data untuk ditampilkan</div>";
}
?>