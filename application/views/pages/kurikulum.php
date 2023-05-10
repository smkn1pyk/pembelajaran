<div class="card">
	<div class="card-header">Kurikulum</div>
	<div class="card-body">
		<?php
		if($kurikulum){
			?>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Tingkat Pendidikan</th>
							<th>Kurikulum</th>
							<th>Jurusan</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($kurikulum as $key => $value): $key++; ?>
							<tr>
								<td><?= $key ?></td>
								<td><?= $value->tingkat_pendidikan_id ?></td>
								<td><?= $value->kurikulum_id_str ?></td>
								<td><?= $value->jurusan_id_str ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
			<?php
		}else{
			?> <div class="alert alert-danger"> 0 Results </div> <?php
		}
		?>
	</div>
</div>