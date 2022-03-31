<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

                  
     <div class="card" style="width: 60%; margin-bottom: 100px">
     <div class="card-body">

    <form method="POST" action="<?php echo base_url('admin/dataSekolah/tambahDataAksi') ?>">
       
       <div class="form-group">
           <label>Nama Sekolah</label>
           <input type="text" name="nama_sekolah" class="form-control">
           <?php echo form_error('nama_sekolah','<div class="text-small text-danger"></div>') ?>
       </div> 

       <div class="form-group">
           <label>Alamat Sekolah</label>
           <input type="text" name="alamat_sekolah" class="form-control">
           <?php echo form_error('alamat_sekolah','<div class="text-small text-danger"></div>') ?>
       </div> 

        <div class="form-group">
           <label>Tahun Ajaran</label>
           <input type="text" name="tahun_ajaran" class="form-control">
           <?php echo form_error('tahun_ajaran','<div class="text-small text-danger"></div>') ?>
       </div> 

       <button type="submit" class="btn btn-success" >Submit</button>
    
    </form>


    </div>
</div>



</div>

        <?php foreach ($sekolah as $s): ?>
    <form method="POST" action="<?php echo base_url('admin/dataSekolah/updateDataAksi') ?>">
       
       <div class="form-group">
           <label>Nama Sekolah</label>
           <input type="hidden" name="id_sekolah" class="form-control" value="<?php echo $s->id_sekolah ?>">
           <input type="text" name="nama_sekolah" class="form-control" value="<?php echo $s->nama_sekolah ?>">
           <?php echo form_error('nama_sekolah','<div class="text-small text-danger"></div>') ?>
       </div> 

       <div class="form-group">
           <label>Alamat Sekolah</label>
           <input type="number" name="alamat_sekolah" class="form-control" value="<?php echo $s->alamat_sekolah ?>">
           <?php echo form_error('alamat_sekolah','<div class="text-small text-danger"></div>') ?>
       </div> 

        <div class="form-group">
           <label>Tahun Ajaran</label>
           <input type="number" name="tahun_ajaran" class="form-control" value="<?php echo $s->tahun_ajaran ?>">
           <?php echo form_error('tahun_ajaran','<div class="text-small text-danger"></div>') ?>
       </div>       
       
       <button type="submit" class="btn btn-success" >Update</button>
    
    </form>
    <?php endforeach; ?>
    </div>
</div>



</div>
