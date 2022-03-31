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
		<h1>PT. Varta Microbattery Indonesia</h1>
		<h2>Daftar Gaji Pegawai</h2>
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
              <td class="text-center">No</td>
              <td class="text-center">NIK</td>
              <td class="text-center">Nama Pegawai</td>
              <td class="text-center">Jenis Kelamin</td>
              <td class="text-center">Jabatan</td>
              <td class="text-center">Gaji Pokok</td>
              <td class="text-center">Tj. Transport</td>
              <td class="text-center">Uang Makan</td>
              <td class="text-center">Potongan</td>
              <td class="text-center">Total Gaji</td>
          </tr>

          <?php foreach ($potongan as $p) {
              $alpha=$p->jml_potongan;
          } ?>
          <?php $no=1; foreach($cetakGaji as $g) : ?>
          <?php $potongan = $g->alpha * $alpha ?>
          <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $g->nik ?></td>
              <td><?php echo $g->nama_pegawai ?></td>
              <td><?php echo $g->jenis_kelamin ?></td>
              <td><?php echo $g->nama_jabatan ?></td>
              <td>Rp.<?php echo number_format($g->gaji_pokok,0,',','.') ?></td>
              <td>Rp.<?php echo number_format($g->tj_transport,0,',','.') ?></td>
              <td>Rp.<?php echo number_format($g->uang_makan,0,',','.') ?></td>
               <td>Rp.<?php echo number_format($potongan,0,',','.') ?></td>
               <td>Rp.<?php echo number_format($g->gaji_pokok + $g->tj_transport + $g->uang_makan - $potongan,0,',','.') ?></td>
          </tr>
 
      <?php endforeach; ?>
      </table>

      <table width="100%">
      	<tr>
      		<td></td>
      		<td width="200px">
      			<p>Batam, <?php echo date("d M Y") ?> <br> Finance</p>
      			<br>
      			<br>
      			<p>__________________</p>
      		</td>
      	</tr>
      </table>

</body>
</html>


<script type="text/javascript">
	window.print();
</script>