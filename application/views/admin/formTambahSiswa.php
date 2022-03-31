<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 100px">
        <div class="card-body">
        
            <form method="POST" action="<?php echo base_url('admin/dataSiswa/tambahDataAksi') ?>" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label>NIS</label>
                    <input type="number" name="nis" class="form-control">
                    <?php echo form_error('nis','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Nama Siswa</label>
                    <input type="text" name="nama_siswa" class="form-control">
                    <?php echo form_error('nama_siswa','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control">
                    <?php echo form_error('username','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control">
                    <?php echo form_error('password','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Kelas</label>
                    <input type="text" name="kelas" class="form-control">
                    <?php echo form_error('kelas','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Jurusan</label>
                    <input type="text" name="jurusan" class="form-control">
                    <?php echo form_error('jurusan','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option>--Pilih Jenis Kelamin--</option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="perempuan">Perempuan</option>
                    </select>
                    <?php echo form_error('jenis_kelamin','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Sekolah</label>
                    <select name="sekolah" class="form-control">
                        <option>--Pilih Sekolah--</option>
                        <?php foreach($sekolah as $s) : ?>
                        <option value="<?php echo $s->nama_sekolah ?>"><?php echo $s->nama_sekolah ?></option>
                    <?php endforeach; ?>
                    </select>
                    <?php echo form_error('sekolah','<div class="text-small text-danger"></div>') ?>
                </div>

                 <div class="form-group">
                    <label>Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" class="form-control">
                    <?php echo form_error('tanggal_masuk','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Photo</label>
                    <input type="file" name="photo" class="form-control">
                </div>

                <div class="form-group">
                    <label>Hak Akses</label>
                    <select name="hak_akses" class="form-control">
                        <option value="">--Pilih Hak Akses--</option>
                        <option value="1">Admin</option>
                        <option value="2">Siswa</option>
                    </select>
                </div>


               <button type="submit" class="btn btn-primary">Simpan</button>
                
            </form>

        </div>
    </div>
                  
                       
    </div>