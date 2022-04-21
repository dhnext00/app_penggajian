<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 100px">
        <div class="card-body">
        
        <?php foreach ($siswa as $s) : ?>
            <form method="POST" action="<?php echo base_url('admin/dataSiswa/updateDataAksi/') ?>" enctype="multipart/form-data">
                
                <div class="form-group">
                    <label>NIS</label>
                    <input type="hidden" name="id_siswa" class="form-control" value="<?php echo $s->id_siswa ?>">
                    <input type="number" name="nis" class="form-control" value="<?php echo $s->nis ?>">
                    <?php echo form_error('nis','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Nama Siswa</label>
                    <input type="text" name="nama_siswa" class="form-control" value="<?php echo $s->nama_siswa ?>">
                    <?php echo form_error('nama_siswa','<div class="text-small text-danger"></div>') ?>
                </div>

                 <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?php echo $s->username ?>">
                    <?php echo form_error('username','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" value="<?php echo $s->password ?>">
                    <?php echo form_error('password','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="form-control">
                        <option value="<?php echo $s->jenis_kelamin ?>"><?php echo $s->jenis_kelamin ?></option>
                        <option value="Laki-Laki">Laki-Laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <?php echo form_error('jenis_kelamin','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Kelas</label>
                    <input type="text" name="kelas" class="form-control" value="<?php echo $s->kelas ?>">
                    <?php echo form_error('kelas','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Jurusan</label>
                    <input type="text" name="jurusan" class="form-control" value="<?php echo $s->jurusan ?>">
                    <?php echo form_error('jurusan','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Sekolah</label>
                    <select name="sekolah" class="form-control">
                        <option value="<?php echo $s->sekolah ?>"><?php echo $s->sekolah ?></option>
                        <?php foreach($sekolah as $k) : ?>
                        <option value="<?php echo $k->nama_sekolah ?>"><?php echo $k->nama_sekolah ?></option>
                    <?php endforeach; ?>
                    </select>
                    <?php echo form_error('sekolah','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" class="form-control" value="<?php echo $s->tanggal_masuk ?>">
                    <?php echo form_error('tanggal_masuk','<div class="text-small text-danger"></div>') ?>
                </div>

               

                <div class="form-group">
                    <label>Photo</label>
                    <input type="file" name="photo" class="form-control" value="<?php echo $s->photo ?>">
                    <?php echo form_error('photo','<div class="text-small text-danger"></div>') ?>    
                </div>

                 <div class="form-group">
                    <label>Hak Akses</label>
                    <select name="hak_akses" class="form-control">
                        <option value="<?php echo $s->hak_akses ?>">
                            <?php if ($s->hak_akses=='1') {
                                echo "Admin";
                            }else{
                                echo "Siswa";
                            } ?>
                        </option>
                        <option value="1">Admin</option>
                        <option value="2">Siswa</option>
                    </select>
                </div>


               <button type="submit" class="btn btn-primary">Simpan</button>
                
            </form>
        <?php endforeach; ?>

        </div>
    </div>
                  
                       
    </div>