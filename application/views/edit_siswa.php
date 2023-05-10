<?php
if($id){
	$data = $this->encryption->decrypt($id);
	$data = explode(',', $data);
	$cekSiswa = $this->db->get_where('siswa', array('uniq'=>$data[1],'NISN'=>$data[0]))->row_array();
	if($cekSiswa){
		?>
		<form method="POST">
			<input type="hidden" name="q" value="<?= $id ?>">
			<div class="form-group">
				<label>Nomor Seri Ijazah</label>
				<input class="form-control" name="ijazah" value="<?= $cekSiswa['No_Seri_Ijazah'] ?>" placeholder="Nomor Seri Ijazah" required>
			</div>
			<div class="form-group">
				<label>Nomor Seri SKHUN</label>
				<input class="form-control" name="skhun" value="<?= $cekSiswa['SKHUN'] ?>" placeholder="Nomor Seri SKHUN" required>
			</div>
			<div class="form-group">
				<label>Sekolah Asal</label>
				<input class="form-control" name="sekolah_asal" value="<?= $cekSiswa['Sekolah_Asal'] ?>" placeholder="Sekolah Asal" required>
			</div>
			<div class="form-group">
				<button class="btn btn-block btn-primary"><i class="fa fa-save"></i> Simpan</button>
			</div>
		</form>
		<?php
	}
}