<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="description" content="SMK NEGERI 1 PAYAKUMBUH" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="icon" type="text/css" href="https://sisfo.smkn1payakumbuh.sch.id/assets/images/logo1.png">
	<style type="text/css">
		body{
			background-image: url(https://sisfo.smkn1payakumbuh.sch.id/assets/images/bg.jfif);
			background-size: 50px;
		}
		.bg-donker{
			background: #7db9e8; /* Old browsers */
			background: -moz-linear-gradient(top,  #7db9e8 0%, #2989d8 0%, #2989d8 33%, #207cca 44%, #1e5799 91%); /* FF3.6-15 */
			background: -webkit-linear-gradient(top,  #7db9e8 0%,#2989d8 0%,#2989d8 33%,#207cca 44%,#1e5799 91%); /* Chrome10-25,Safari5.1-6 */
			background: linear-gradient(to bottom,  #7db9e8 0%,#2989d8 0%,#2989d8 33%,#207cca 44%,#1e5799 91%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#7db9e8', endColorstr='#1e5799',GradientType=0 ); /* IE6-9 */
		}
	</style>
	<title>Data Siswa</title>
</head>
<body data-base='<?= base_url() ?>' class="small">
	<?php
	if($rombel){
		?>
		<div class="fixed-top bg-donker text-light p-2">
			<div class="container">
				<div class="row">
					<div class="col-md">
						<form class="form-inline" id="form_rombel">
							<div class="input-group mr-2">Rombel: </div>
							<div class="input-group">
								<select class="form-control" name="rombel">
									<?php
									foreach ($rombel as $key => $value) {
										if($this->input->get('rombel')){
											if($value->rombel==$this->input->get('rombel')){
												echo "<option data-id='$value->rombel' selected>$value->rombel</option>";
											}else{
												echo "<option>$value->rombel</option>";
											}
										}else{
											echo "<option>$value->rombel</option>";
										}
									}
									?>
								</select>
							</div>
						</form>
					</div>
					<div class="col-md text-right">
						<a href="<?= base_url('siswa/keluar') ?>" class='btn btn-danger ml-2'><i class="fa fa-sign-out"></i> Keluar</a>
					</div>
				</div>
			</div>
		</div>
		<?php
	}

	if($siswa){
		?>
		<div class="container mt-5 border shadow rounded p-2 bg-light">
			<div class="jumbotron text-center p-1 mt-2"><h2>SMKN 1 PAYAKUMBUH</h2><!-- <h5>JLN. BONAI INDAH NO.6 Tanjung Gadang Kec. Payakumbuh Barat Kota Payakumbuh Prov. Sumatera Barat</h5> --></div>
			<table class="table table-striped table-bordered table-sm table-responsive-sm mt-5 data-table">
				<thead class="bg-donker text-light">
					<tr>
						<th>No</th>
						<th>NISN</th>
						<th>Nama</th>
						<th>No Seri Ijazah</th>
						<th>No Seri SKHUN</th>
						<th>Sekolah Asal</th>
						<th>Status</th>
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
						echo "<td>".strtoupper($value->Nama)."</td>";
						echo "<td>$value->No_Seri_Ijazah</td>";
						echo "<td>$value->SKHUN</td>";
						echo "<td>$value->Sekolah_Asal</td>";
						if($value->No_Seri_Ijazah&&$value->SKHUN&&$value->Sekolah_Asal){
							if($value->tandai==1){
								echo "<td class='text-center text-success'><i class='fa fa-check'></i></td>";
							}else{
								echo "<td class='text-center text-dark'><i class='fa fa-check'></i></td>";
							}
						}else{
							echo "<td></td>";
						}
						$siswa = $this->encryption->encrypt($value->NISN.','.$value->uniq);
						echo "<td class='text-center'><button class='btn btn-link btn-sm buka-modal' id='edit_siswa' data-id='$siswa'><i class='fa fa-edit'></i></button></td>";
						echo "</tr>";
					}
					?>
				</tbody>
			</table>
			<?php
		}
		?>
	</div>
	<div class="modal bg-donker" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">Modal title</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<p>Modal body text goes here.</p>
				</div>
				<div class="modal-footer">
					<!-- <button type="button" class="btn btn-primary">Save changes</button>
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
					</div>
				</div>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
		<script type="text/javascript">
			var qualifyURL = function(pathOrURL) {
				if (!(new RegExp('^(http(s)?[:]//)','i')).test(pathOrURL)) {
					return $(document.body).data('base') + pathOrURL;
				}
				return pathOrURL;
			};
			$('select').on('change',function(){
				$('#form_rombel').submit();
			});
			$('.buka-modal').on('click',function(){
				var siswa = $(this).attr('data-id');
				$('.modal-title').html("<i class='fa fa-edit'></i> Edit Data Siswa");
				$('.modal-body').load( "siswa/edit_siswa",{id:siswa} );
				$('.modal').modal('show');
			});
			$('.modal').on('submit', 'form', function(e){
				$('.modal-body').text('Mohon Tunggu');
				e.preventDefault();
				var xhr = new XMLHttpRequest();
				xhr.open("POST", 'siswa/post_siswa', true);
				xhr.onreadystatechange = function() {
					if(xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
						$('.modal-body').html(xhr.responseText);
						setTimeout(function(){ $('.modal-body').html(''); }, 3000);
						if(xhr.responseText=="<div class='alert alert-success'>Sukses</div>"){
							setTimeout(function(){ $('.modal').modal('hide'); location.reload();}, 1000);
						}
					}
				}
				var formData = new FormData(this);
				xhr.send(formData);
			});
		</script>
	</body>
	</html>