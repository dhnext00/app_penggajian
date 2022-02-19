<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $title ?></title>
	<style type="text/css">
		body{
			font-family: Arial;
			color: black;
		}
	</style>
</head>
<body>

	<center>
		<h1>PT. VARTA Microbattery Indonesia</h1>
		<h2>Laporan Kehadiran Siswa</h2>
		<hr style="width: 50%; border-width: 5px; color: black;">
	</center>

	<?php 
		if((isset($_POST['bulan']) && $_POST['bulan']!='') && (isset($_POST['tahun']) && $_POST['tahun']!='')){
	            $bulan = $_POST['bulan'];
	            $tahun = $_POST['tahun'];
	            $bulantahun = $bulan.$tahun;
	        }else{
	            $bulan = date('m');
	            $tahun = date('Y');
	            $bulantahun = $bulan.$tahun;
	        }

    ?>
	 
	<table>
	 	<tr>
	 		<td>Bulan</td>
	 		<td>:</td>
	 		<td><?php echo $bulan ?></td>
	 	</tr>
	 	<tr>
	 		<td>Tahun</td>
	 		<td>:</td>
	 		<td><?php echo $tahun ?></td>
	 	</tr>
	 </table>

	<table class="table table-bordered table-striped">
		<tr>
			<th class="text-center">No</th>
			<th class="text-center">Nama Siswa</th>
			<th class="text-center">NIS</th>
			<th class="text-center">Sekolah</th>
			<th class="text-center">Hadir</th>
			<th class="text-center">Sakit</th>
			<th class="text-center">Alpha</th>
		</tr>

	<?php $no=1; foreach ($lap_kehadiran as $l) : ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $l->nama_siswa ?></td>
			<td><?php echo $l->nis ?></td>
			<td><?php echo $l->nama_sekolah ?></td>
			<td><?php echo $l->hadir ?></td>
			<td><?php echo $l->sakit ?></td>
			<td><?php echo $l->alpha ?></td>
		</tr>
		<?php endforeach; ?>
	</table>


</body>
</html>


<script type="text/javascript">
	window.print();
</script>