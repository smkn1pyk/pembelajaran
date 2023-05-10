<?php
if($this->input->post('data')){
	$data = $this->encryption->decrypt($this->input->post('data'));
	$data = explode(',', $data);
	$Nama_PTK = $data[0];
	$thn_ajr = $data[1];
	$cekPembelajaran = $this->db->query("SELECT DISTINCT(Nama_Matpel) as Nama_Matpel,Kode_Matpel from pembelajaran where Nama_PTK='$Nama_PTK' and thn_ajr='$thn_ajr' and Kode_Matpel NOT IN(SELECT matpel from kkm where thn_ajr='$thn_ajr') order by Nama_Rombel")->result();
	if($cekPembelajaran){
		?>
		<form>
			<input type="hidden" name="page" value="tambah_kkm">
			<input type="hidden" name="thn_ajr" value="<?= $thn_ajr ?>">
			<div class="form-group">
				<select name="matpel" class="form-control" required="">
					<option value="">Pilih ...</option>
					<?php
					foreach ($cekPembelajaran as $key => $value) {
						echo "<option value='$value->Kode_Matpel'>$value->Kode_Matpel - $value->Nama_Matpel</option>";
					}
					?>
				</select>
			</div>
			<div class="form-group">
				<input type="number" name="kkm" class="form-control" placeholder="KKM" required="">
			</div>
			<div class="form-group text-right">
				<button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
			</div>
		</form>
		<?php
	}else{
		echo "<div class='alert alert-info'>Tidak ada data pembelajaran untuk ditampilkan</div>";
	}
}else{
	echo "<div class='alert-danger alert'>Terjadi kesalahan sistem</div>";
}
?>