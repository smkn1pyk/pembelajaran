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
			background-size:50px;
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
<body>
	<div class="container mt-5">
		<div class="kunci m-auto border rounded shadow p-3 bg-light" style="width:300px;">
			<?= $this->session->flashdata('buka_kunci');  ?>
			<form method="POST">
				<div class="form-group">
					<input type="text" name="kunci" class="form-control" placeholder="Kunci">
				</div>
				<div class="form-group">
					<button class="btn btn-block btn-primary"><i class="fa fa-key"></i> Buka Kunci</button>
				</div>
			</form>
		</div>
	</body>
	</html>