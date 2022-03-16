<div class="container-fluid" style="margin-bottom: 100px">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card mb-3">
      <div class="card-header bg-primary text-white">
        Filter Data Absensi Siswa
      </div>
      <div class="card-body">
        
        <form class="form-inline" action="<?php echo base_url('admin/dataAbsensi')?>">
          <div class="form-group mb-2">
            <label for="staticEmail2">Bulan: </label>
            <select class="form-control ml-3" name="bulan">
                <option value="">--Pilih Bulan--</option>
                <option value="01">Januari</option>
                <option value="02">Februari</option>
                <option value="03">Maret</option>
                <option value="04">April</option>
                <option value="05">Mei</option>
                <option value="06">Juni</option>
                <option value="07">Juli</option>
                <option value="08">Agustus</option>
                <option value="09">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
          </div>

          <div class="form-group mb-2 ml-5">
            <label for="staticEmail2">Tahun: </label>
            <select class="form-control ml-3" name="tahun">
                <option value="">--Pilih Tahun--</option>
                <?php $tahun = date('Y');
                for($i=2020;$i<$tahun+5;$i++) { ?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php } ?>
            </select>
          </div>

          <button type="submit" class="btn btn-primary mb-2 ml-auto"><i class="fas fa-eye"></i> Tampilkan Data </button>
          <a href="<?php echo base_url('admin/dataAbsensi/inputAbsensi') ?>" class="btn btn-success mb-2 ml-3"><i class="fas fa-plus"></i> Input Kehadiran </a>
        </form>

      </div>
  </div>

  <div class="alert alert-info">
      Menampilkan Data Kehadiran Siswa Bulan: <span class="font-weight-bold"><?php echo $bulan ?></span> Tahun:<span class="font-weight-bold"><?php echo $tahun ?></span>
  </div>
                 <div id="secondary" class="widget-area" role="complementary">
        <aside id="search-2" class="widget widget_search">
          <form role="search" method="get" class="search-form" action="<?php echo base_url('admin/dataAbsensi/searchResult?bulan=$bulan&tahun=$tahun&')?>">
                <label>
                    <input type="text" name="bulan" value="<?= $bulan ?>" hidden>
                    <input type="text" name="tahun" value="<?= $tahun ?>" hidden>
                    <span class="screen-reader-text">Search untuk:</span>
                    <input type="search" class="search-field form-control rounded" placeholder="Search &hellip;" value="" name="nama_siswa" />
                </label>
                <input type="submit" class="search-submit" value="Search" />
          </form>
        </aside>

  <?php 

  $jml_data = count($absensi);
  if($jml_data > 0) { ?>

  <table class="table table-bordered table-striped">
    <tr>
        <td class="text-center">No</td>
        <td class="text-center">NIS</td>
        <td class="text-center">Nama Siswa</td>
        <td class="text-center">Jenis Kelamin</td>
        <td class="text-center">Sekolah</td>
        <td class="text-center">Hadir</td>
        <td class="text-center">Sakit</td>
        <td class="text-center">Alpha</td>      
    </tr>
  
    <?php $no=1; foreach($absensi as $a) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $a->nis ?></td>
            <td><?php echo $a->nama_siswa ?></td>
            <td><?php echo $a->jenis_kelamin ?></td>
            <td><?php echo $a->nama_sekolah ?></td>
            <td><?php echo $a->hadir ?></td>
            <td><?php echo $a->sakit ?></td>
            <td><?php echo $a->alpha ?></td>
        </tr>
    <?php endforeach; ?>
  </table>

    <?php }else{ ?>
        <span class="badge badge-danger"><i class="fas fa-info-circle"></i> Data masih kosong, silahkan input data kehadiran pada bulan dan tahun yang Anda pilih.</span>
    <?php } ?>

                  
                      
    </div>