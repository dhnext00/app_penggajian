<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="alert alert-success font-weight-bold mb-4" style="width: 65%">Selamat datang, Anda login sebagai siswa.</div>

    <div class="card" style="margin-bottom: 120px; width: 65%">
        <div class="card-header font-weight-bold bg-primary text-white  ">
            Data Siswa
        </div>

        <?php foreach($siswa as $s) : ?>
        <div class="card-body">
            <div class="row">
                <div class="col-md-5">
                    <img style="width: 250px;" src="<?php echo base_url('assets/photo/'.$s->photo) ?>">
                </div>
               
                <div class="col-md-7">
                   <table class="table">
                       <tr>
                           <td>Nama Siswa</td>
                           <td>:</td>
                           <td><?php echo $s->nama_siswa ?></td>
                       </tr>
                       <tr>
                           <td>Sekolah </td>
                           <td>:</td>
                           <td><?php echo $s->sekolah ?></td>
                       </tr>
                       <tr>
                           <td>Tanggal Masuk</td>
                           <td>:</td>
                           <td><?php echo $s->tanggal_masuk ?></td>
                       </tr>
                       <tr>
                           <td>Kelas</td>
                           <td>:</td>
                           <td><?php echo $s->kelas ?></td>
                       </tr>
                   </table> 
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

                  
                       
    </div>