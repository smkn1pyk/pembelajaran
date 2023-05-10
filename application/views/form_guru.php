<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>SMKN 1 PAYAKUMBUH</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="text/css" href="https://sisfo.smkn1payakumbuh.sch.id/assets/images/logo1.png">
</head>
<body data-base="<?= base_url() ?>">
	<div class="container-fluid m-auto border p-3">
		<div class="row">
			<div class="col-md">
				<div class="text-right mb-2"><button class="btn btn-primary buka-modal"><i class="fa fa-plus"></i> Tambah Data</button></div>
				<?php
				if($guru){
					?>
					<table class="table table-striped table-bordered table-responsive-sm table-sm">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama</th>
								<th>NUPTK</th>
								<th>NIP</th>
								<th>NIK</th>
								<th>Jenis Kelamin</th>
								<th>Tempat Lahir</th>
								<th>Tanggal Lahir</th>
								<th>Agama</th>
								<th>Alamat Jalan</th>
								<th>RT</th>
								<th>RW</th>
								<th>Desa</th>
								<th>Kecamatan</th>
								<th>Kode POS</th>
								<th>E-mail</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no=0;
							foreach ($guru as $key => $value) {
								$no++;
								echo "<tr>";
								echo "<td>$no</td>";
								echo "<td>$value->Nama</td>";
								echo "<td>$value->NUPTK</td>";
								echo "<td>$value->NIP</td>";
								echo "<td>$value->NIK</td>";
								echo "<td>$value->Jenis_Kelamin</td>";
								echo "<td>$value->Tempat_Lahir</td>";
								echo "<td>$value->Tanggal_Lahir</td>";
								echo "<td>$value->Agama</td>";
								echo "<td>$value->Alamat_Jalan</td>";
								echo "<td>$value->RT</td>";
								echo "<td>$value->RW</td>";
								echo "<td>$value->Desa</td>";
								echo "<td>$value->Kecamatan</td>";
								echo "<td>$value->Kode_Pos</td>";
								echo "<td>$value->Email</td>";
								echo "<td>$value->matpel_rombel</td>";
								echo "</tr>";
							}
							?>
						</tbody>
					</table>
					<?php
				}else{
					echo "<div class='alert alert-danger'>Belum ada data untuk ditampilkan</div>";
				}
				?>
			</div>
		</div>
	</div>
	<div class="modal" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Formulir Guru</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="GET" class="">
						<div class="form-group">
							<input type="text" name="Nama" class="form-control" placeholder="Nama Lengkap">
						</div>
						<div class="form-group">
							<input type="number" name="NUPTK" class="form-control" placeholder="NUPTK">
						</div>
						<div class="form-group">
							<input type="number" name="NIP" class="form-control" placeholder="NIP">
						</div>
						<div class="form-group">
							<input type="number" name="NIK" class="form-control" placeholder="NIK">
						</div>
						<div class="form-group">
							<select class="form-control" name="Jenis_Kelamin">
								<option value="L">Laki-laki</option>
								<option value="P">Perempuan</option>
							</select>
						</div>
						<div class="form-group">
							<input type="text" name="Tempat_Lahir" class="form-control" placeholder="Tempat Lahir">
						</div>
						<div class="form-group">
							<input type="date" name="Tanggal_Lahir" class="form-control" placeholder="Tanggal_Lahir" value="<?= date('Y-m-d') ?>">
						</div>
						<div class="form-group">
							<input type="text" name="Agama" class="form-control" placeholder="Agama">
						</div>
						<div class="form-group">
							<input type="text" name="Alamat_Jalan" class="form-control" placeholder="Alamat Jalan">
						</div>
						<div class="form-group">
							<input type="number" name="RT" class="form-control" placeholder="RT">
						</div>
						<div class="form-group">
							<input type="number" name="RW" class="form-control" placeholder="RW">
						</div>
						<div class="form-group">
							<input type="text" name="Desa" class="form-control" placeholder="Desa">
						</div>
						<div class="form-group">
							<input type="text" name="Kecamatan" class="form-control" placeholder="Kecamatan">
						</div>
						<div class="form-group">
							<input type="number" name="Kode_Pos" class="form-control" placeholder="Kode POS">
						</div>
						<div class="form-group">
							<input type="text" name="HP" class="form-control" placeholder="HP">
						</div>
						<div class="form-group">
							<input type="email" name="email" class="form-control" placeholder="E-Mail">
						</div>
						<div class="form-group">
							<label>Mata pelajaran & Rombel yg diajar</label>
							<textarea name="matpel_rombel" placeholder="Contoh:&nbsp; MTK:X AKL 1,MTK:XI AKL 2" class="form-control"></textarea>
						</div>
						<div class="form-group">
							<button class="btn btn-primary btn-block"><i class="fa fa-save"></i> Simpan</button>
						</div>
						<div id="ket-modal">
							<?= $this->session->flashdata('alert');?>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<!-- <button type="button" class="btn btn-primary">Save changes</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
					</div>
				</div>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script type="text/javascript">
			var qualifyURL = function(pathOrURL) {
				if (!(new RegExp('^(http(s)?[:]//)','i')).test(pathOrURL)) {
					return $(document.body).data('base') + pathOrURL;
				}
				return pathOrURL;
			};

			$('.buka-modal').on('click',function(){
				$('.modal').modal('show');
			});

			$('.modal').on('submit', 'form', function(e){
				e.preventDefault();
				var id = event.target.id;
				var xhr = new XMLHttpRequest();
				xhr.open("POST", qualifyURL('form_guru/simpan_data'), true);
				xhr.onreadystatechange = function() {
					if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
						$('#ket-modal').html(xhr.responseText);
						setTimeout(function(){ $('#ket-modal').html(''); }, 3000);
						let text = xhr.responseText;
						let result = text.substring(33, 39);
						console.log(result);
						if(result=="Sukses"){
							setTimeout(function(){
								var request_uri = location.pathname + location.search;
								window.location.reload();
							}, 500);
						}
					}
				}
				var formData = new FormData(this);
				xhr.send(formData);
			});
		</script>
	</body>
	</html>