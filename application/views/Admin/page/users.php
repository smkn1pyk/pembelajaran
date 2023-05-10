<?php
if($users){
	?>
	<table class="table table-sm table-striped table-bordered table-responsive-sm">
		<thead>
			<tr class="bg-donker text-light">
				<th>No</th>
				<th>Nama</th>
				<th>Username</th>
				<th>Hak Akses</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$no=0;
			foreach ($users as $key => $value) {
				$no++;
				echo "<tr>";
				echo "<td>$no</td>";
				echo "<td>$value->Nama</td>";
				echo "<td>$value->username</td>";
				echo "<td>$value->hak_akses</td>";
				echo "</tr>";
			}
			?>
		</tbody>
	</table>
	<?php
}