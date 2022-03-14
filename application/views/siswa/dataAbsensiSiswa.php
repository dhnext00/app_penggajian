
<div class="container-fluid" style="margin-bottom: 100px">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <table class="table table-striped table-bordered">
        <tr>
            <th class="text-center">Bulan/Tahun</th>
            <th class="text-center">Nama Siswa</th>
            <th class="text-center">NIS</th>
            <th class="text-center">Sekolah</th>
            <th class="text-center">Hadir</th>
            <th class="text-center">Sakit</th>
            <th class="text-center">Alpha</th>
            <th class="text-center">Cetak Absensi</th>
        </tr>

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

        <?php foreach($kehadiran as $l) : ?>
        <tr>
            <td><?php echo $l->bulan ?></td>    
            <td><?php echo $l->nama_siswa ?></td>
            <td><?php echo $l->nis ?></td>
            <td><?php echo $l->nama_sekolah ?></td>
            <td><?php echo $l->hadir ?></td>
            <td><?php echo $l->sakit ?></td>
            <td><?php echo $l->alpha ?></td>
        
            <td>
                <center>
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('siswa/dataAbsensiSiswa/cetakAbsensi/'.$l->id_kehadiran) ?>"><i class="fas fa-print"></i></a>
                </center>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

                  
                       
    </div>