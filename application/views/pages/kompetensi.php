<?php
	if($kompetensi){
		echo "<table class='table table-bordered table-striped table-sm'>";
		echo "<tr class='bg-donker text-light'>";
		echo "<th>No</th>";
		echo "<th>Tingkat</th>";
		echo "<th>Kompetensi</th>";
		echo "<th>Kurikulum</th>";
		echo "</tr>";
		$no=0;
		foreach ($kompetensi as $key => $value) {
			$no++;
			echo "<tr>";
			echo "<td class=''>$no</td>";
			echo "<td class=''>$value->Tingkat</td>";
			echo "<td class=''>$value->kompetensi</td>";
			echo "<td class=''>$value->Kurikulum</td>";
			echo "</tr>";
		}
		echo "</table>";
	}