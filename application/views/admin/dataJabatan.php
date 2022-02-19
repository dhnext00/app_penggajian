<div class="container-fluid" style="margin-bottom: 100px">   
                       
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <a class="btn btn-sm btn-success mb-3" href="<?php echo base_url('admin/dataJabatan/tambahData') ?>"><i class="fas fa-plus"></i> Tambah Data </a>
    <?php echo $this->session->flashdata('pesan') ?>

    <table class="table table-bordered table-striped mt-2">
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Nama Jabatan</th>
            <th class="text-center">Gaji Pokok</th>
            <th class="text-center">Tj. Transport</th>
            <th class="text-center">Uang Makan</th>
            <th class="text-center">Action</th>
        </tr>

    <?php $no=1; foreach($jabatan as $j) : ?>
        <tr>
            <td><?php echo $no++ ?></td>
            <td><?php echo $j->nama_jabatan ?></td>
            <td><?php echo $j->gaji_pokok ?></td>
            <td><?php echo $j->tj_transport ?></td>
            <td><?php echo $j->uang_makan ?></td>

            <td>
                <center>
                    <a class="btn btn-sm btn-primary" href="<?php echo base_url('admin/dataJabatan/updateData/'.$j->id_jabatan) ?>"><i class="fas fa-edit"></i></a>
                    <a onclick="return confirm('Anda Yakin Ingin Menghapus Data Ini')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataJabatan/deleteData/'.$j->id_jabatan) ?>"><i class="fas fa-trash"></i></a>
                </center>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
         
    </div>