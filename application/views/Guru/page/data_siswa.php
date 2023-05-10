<?php
if($rombel){
	?>
	<form class="form-inline mb-2" method="GET">
		<div class="input-group">
			<select name="rombel" class="form-control">
				<option value="">Pilih Rombel ...</option>
				<?php
				foreach ($rombel as $key => $value) {
					if($this->input->get('rombel')){
						if($value->rombel==$this->input->get('rombel')){
							echo "<option value='$value->rombel' selected>$value->rombel</option>";
						}else{
							echo "<option value='$value->rombel'>$value->rombel</option>";
						}
					}else{
						echo "<option value='$value->rombel'>$value->rombel</option>";
					}
				}
				?>
			</select>
		</div>
		<button class="btn btn-primary ml-2"><i class="fa fa-search"></i></button>
	</form>
	<?php
}
if($siswa){
	?>
	<table class="table table-striped table-bordered table-responsive-sm table-sm">
		<thead>
			<tr>
				<th>No</th>
				<th>NISN</th>
				<th>Nama</th>
				<th>Tempat Lahir</th>
				<th>Tanggal Lahir</th>
				<th>Opsi</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no=0;
			foreach ($siswa as $key => $value) {
				$no++;
				echo "<tr>";
				echo "<td>$no</td>";
				echo "<td>$value->NISN</td>";
				echo "<td>$value->Nama</td>";
				echo "<td>$value->Tempat_Lahir</td>";
				echo "<td>".date('d-m-Y', strtotime($value->Tanggal_Lahir))."</td>";
				echo "<td><button class='btn btn-link btn-sm buka-modal' id='detail_siswa' data-id='$value->NISN'><i class='fa fa-eye'></i></button></td>";
				echo "</tr>";
			}
			?>
		</tbody>
	</table>
	<?php
}