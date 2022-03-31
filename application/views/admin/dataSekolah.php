<div class="container-fluid" style="margin-bottom: 100px">   
                       
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('admin/dataSekolah/tambahData') ?>"><i class="fas fa-plus"></i> Tambah Data </a>
    <?php echo $this->session->flashdata('pesan') ?>

    <table class="table table-bordered table-striped mt-2">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Sekolah</th>
            <th class="text-center">Alamat Sekolah</th>
            <th class="text-center">Tahun Ajaran</th>
            <th class="text-center">Action</th>
        </tr>

    <?php $no=1; foreach($sekolah as $s) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $s->nama_sekolah ?></td>
            <td><?php echo $s->alamat_sekolah ?></td>
            <td><?php echo $s->tahun_ajaran ?></td>

            <td>
                <center>
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/dataSekolah/updateData/'.$s->id_sekolah) ?>"><i class="fas fa-edit"></i></a>
                    <a onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataSekolah/deleteData/'.$s->id_sekolah) ?>"><i class="fas fa-trash"></i></a>
                </center>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
         
    </div>