<div class="container-fluid" style="margin-bottom: 100px">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <?php echo $this->session->flashdata('pesan') ?>              

    <a class="mb-2 mt-2 btn btn-sm btn-success" href="<?php echo base_url('admin/dataSiswa/tambahData') ?>"><i class="fas fa-plus"></i> Tambah Siswa </a>

<table class="table table-striped table-bordered">
    <tr>
        <th class="text-center">No</th>
        <th class="text-center">NIS</th>
        <th class="text-center">Nama Siswa</th>
        <th class="text-center">Kelas</th>
        <th class="text-center">Jenis Kelamin</th>
        <th class="text-center">Sekolah</th>
        <th class="text-center">Tanggal Masuk</th>
        <th class="text-center">Photo</th>
        <th class="text-center">Hak Akses</th>
        <th class="text-center">Action</th>
    </tr>

    <?php $no=1; foreach($siswa as $s) : ?>
    <tr>
        <td><?php echo $no++ ?></td>
        <td><?php echo $s->nis ?></td>
        <td><?php echo $s->nama_siswa ?></td>
        <td><?php echo $s->kelas ?></td>
        <td><?php echo $s->jenis_kelamin ?></td>
        <td><?php echo $s->sekolah ?></td>
        <td><?php echo $s->tanggal_masuk ?></td>
        <td><img src="<?php echo base_url().'assets/photo/'.$s->photo ?>" width="75px"></td>
            <?php if($s->hak_akses=='1') { ?>
                <td>Admin</td>
            <?php }else{ ?>
                <td>Siswa</td>
            <?php } ?>
            
        <td>
            <center>
                <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/dataSiswa/updateData/'.$s->id_siswa) ?>"><i class="fas fa-edit"></i></a>
                <a onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataSiswa/deleteData/'.$s->id_siswa) ?>"><i class="fas fa-trash"></i></a>
            </center>
        </td>
    </tr>
<?php endforeach; ?>
</table>
                       
</div>