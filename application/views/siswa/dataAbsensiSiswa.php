
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

        <?php foreach($absensi as $a) : ?>
        <tr>
            <td><?php echo $a->bulan ?></td>    
            <td><?php echo $a->nama_siswa ?></td>
            <td><?php echo $a->nis ?></td>
            <td><?php echo $a->nama_sekolah ?></td>
            <td><?php echo $a->hadir ?></td>
            <td><?php echo $a->sakit ?></td>
            <td><?php echo $a->alpha ?></td>
        
            <td>
                <center>
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('siswa/dataAbsensiSiswa/cetakAbsensi/'.$a->id_kehadiran) ?>"><i class="fas fa-print"></i></a>
                </center>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

                  
                       
    </div>