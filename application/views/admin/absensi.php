<div class="container">
   <br/>
   <h2 align="center">Pencarian</h2><br />
   <div class="card mb-3">
      <div class="card-header bg-primary text-white">
        Filter Data Absensi Siswa
      </div>
      <div class="card-body">
        
        <form class="form-inline" action="<?php echo base_url('admin/absensi')?>">
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
                <?php $tahun2 = date('Y');
                for($i=2020;$i<$tahun2+5;$i++) { ?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php } ?>
            </select>
          </div>
          <button class="btn btn-primary mb-2 ml-auto">Reset<a href="<?php echo base_url('admin/resetDate') ?>"></a></button>
          <button type="submit" class="btn btn-primary mb-2 ml-3"><i class="fas fa-eye"></i> Tampilkan Data </button>
          <a href="<?php echo base_url('admin/dataAbsensi/inputAbsensi') ?>" class="btn btn-success mb-2 ml-3"><i class="fas fa-plus"></i> Input Kehadiran </a>
        </form>

      </div>
  </div>

  <div class="alert alert-info">
      Menampilkan Data Kehadiran Siswa Bulan: <span class="font-weight-bold"><?php echo $bulan ?></span> Tahun:<span class="font-weight-bold"><?php echo $tahun ?></span>
  </div>
   <div class="form-group">
    <div class="input-group">
     <input type="text" name="search_text" id="search_text" placeholder="Pencarian" class="form-control" />
    </div>
   </div>
   <br />
   <div id="result"></div>
  </div>
  <div style="clear:both"></div>
  <br />
  <br />
  <br />
  <br />