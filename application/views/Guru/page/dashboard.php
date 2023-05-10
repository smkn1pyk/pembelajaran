<?php
echo $this->session->userdata('hak_akses');
if($cekPembelajaran){
	$data_id = $this->encryption->encrypt($this->session->userdata('nama').','.$this->session->userdata('thn_ajr'));
	if($this->session->userdata('Jenis_PTK')=='Guru Mapel'){
		?>
		<div class="mb-2 text-right">
			<button class="btn btn-sm btn alert-primary buka-modal" id='tambah_kkm' data-id='<?= $data_id ?>'><i class="fas fa-plus"></i> Tambah Data</button>
		</div>
	<?php } ?>
	<table class="table table-bordered table-striped table-sm table-responsive-sm">
		<thead>
			<tr>
				<th>No</th>
				<th>Tingkat</th>
				<th>Nama Rombel</th>
				<th>Nama Matpel</th>
				<th>JJM</th>
				<th>Status di Kurikulum</th>
				<?php if($this->session->userdata('Jenis_PTK')=='Guru Mapel'){ ?>
					<th>KKM</th>
				<?php } ?>
			</tr>
		</thead>
		<tbody>
			<?php
			$no=0;
			foreach ($cekPembelajaran as $key => $value) {
				$cekKKM = $this->db->get_where('kkm', array('matpel'=>$value->Kode_Matpel))->row_array();
				$no++;
				echo "<tr>";
				echo "<td>$no</td>";
				echo "<td>$value->Tingkat</td>";
				echo "<td>$value->Nama_Rombel</td>";
				echo "<td>$value->Nama_Matpel</td>";
				echo "<td>$value->JJM</td>";
				echo "<td>$value->Status_di_Kurikulum</td>";
				if($this->session->userdata('Jenis_PTK')=='Guru Mapel'){
					if($cekKKM){
						echo "<td>".$cekKKM['kkm']."</td>";
					}else{
						echo "<td></td>";
					}
				}
				echo "</tr>";
				$jjm[] = $value->JJM;
			}
			echo "<tr>";
			echo "<td colspan='4'></td>";
			echo "<td>".number_format(array_sum($jjm))."</td>";
			echo "<td></td>";
			if($this->session->userdata('Jenis_PTK')=='Guru Mapel'){
				echo "<td></td>";
			}
		echo "</tr>";
		?>
	</tbody>
</table>
<?php
}else{
	echo "<div class='alert alert-danger'>Tidak ada data matpel</div>";
}