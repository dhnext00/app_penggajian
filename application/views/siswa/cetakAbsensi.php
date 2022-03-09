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
		<h2>Data Absensi Siswa PKL</h2>
		<hr style="width: 50%; border-width: 5px; color: black;">
	</center>

	
	<?php foreach($absensi as $a);?>

	<?php foreach($print_slip as $ps) : ?>

	<?php $absensi=$ps->hadir * $kehadiran; ?>

	<table style="width: 100%">
		<tr>
			<td width="20%">Nama Siswa</td>
			<td width="2%">:</td>
			<td><?php echo $ps->nama_siswa ?></td>
		</tr>

		<tr>
			<td>NIK</td>
			<td>:</td>
			<td><?php echo $ps->nis ?></td>
		</tr>

		<tr>
			<td>Jabatan</td>
			<td>:</td>
			<td><?php echo $ps->nama_sekolah ?></td>
		</tr>

		<tr>
			<td>Bulan</td>
			<td>:</td>
			<td><?php echo substr($ps->bulan, 0,2)  ?></td>
		</tr>

		<tr>
			<td>Tahun</td>
			<td>:</td>
			<td><?php echo substr($ps->bulan, 2,4)  ?></td>
		</tr>
	</table>


	<table class="table table-striped table-bordered mt-3">
		<tr>
			<th class="text-center" width="5%">No</th>
			<th class="text-center">Keterangan</th>
			<th class="text-center">Jumlah</th>
		</tr>
		<tr>
			<td>1</td>
			<td>Hadir</td>
			<td><?php echo number_format($ps->hadir,0,',','.') ?></td>
		</tr>

		<tr>
			<td>2</td>
			<td>Sakit</td>
			<td><?php echo number_format($ps->sakit,0,',','.') ?></td>
		</tr>

		<tr>
			<td>3</td>
			<td>Alpha</td>
			<td><?php echo number_format($ps->alpha,0,',','.') ?></td>
		</tr>

	</table>

	<table width="100%">
		<tr>
			<td></td>
			<td>
				<p>Siswa</p>
				<br>
				<br>
				<p class="font-weight-bold"><?php echo $ps->nama_siswa ?></p>
			</td>

			<td width="200px">
				<p>Batam, <?php echo date("d M Y") ?> <br> Finance,</p>
				<br>
				<br>
				<p>__________________</p>
			</td>
		</tr>

	</table>

<?php endforeach; ?>

</body>
</html>


<script type="text/javascript">
	window.print();
</script>