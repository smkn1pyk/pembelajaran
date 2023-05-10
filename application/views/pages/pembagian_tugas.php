<div class="card">
	<div class="card-header">
		<?php
		if($gtk){
			?>
			<div class="form-inline">
				<select class="form-control" name="gtk" hx-get="<?= base_url('app/data_pembagian_tugas') ?>" hx-target="#data">
					<?php foreach ($gtk as $key => $value): ?>
						<?php
						if($this->input->get('gtk')){
							if($value->ptk_terdaftar_id==$this->input->get('gtk')){
								?> <option value="<?= $value->ptk_terdaftar_id ?>" selected><?= $value->nama ?></option> <?php
							}else{
								?> <option value="<?= $value->ptk_terdaftar_id ?>"><?= $value->nama ?></option> <?php
							}
						}else{
							?> <option value="<?= $value->ptk_terdaftar_id ?>"><?= $value->nama ?></option> <?php
						}
						?>
					<?php endforeach ?>
				</select>
			</div>
			<?php
		}
		?>
	</div>
	<div class="card-body">
		<?php
		if($pembelajaran){
			?>
			<div class="table-responsive">
				<table class="table">
					<tbody>
						<?php foreach ($pembelajaran as $key => $value): $key++; ?>
							<?php
							$rombel = $this->db->get_where('getrombonganbelajar', ['rombongan_belajar_id'=>$value->rombongan_belajar_id, 'semester_id'=>$value->semester_id])->row_array();
							$jjm[] = $value->jam_mengajar_per_minggu;
							?>
							<tr>
								<td><?= $key ?></td>
								<td><?= $value->mata_pelajaran_id ?></td>
								<td><?= $value->mata_pelajaran_id_str ?></td>
								<td>
									<?php
									if($rombel){
										echo $rombel['nama'];
									}
									?>
								</td>
								<td><?= $value->jam_mengajar_per_minggu ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
					<tfoot>
						<tr>
							<td colspan="4">Total Jam</td>
							<td><?= array_sum($jjm) ?></td>
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