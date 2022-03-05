<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2> <?php echo $user->username; ?></h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo base_url('users');?>"> Back</a>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Username:</strong>
            <?php echo $user->username; ?>
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
            <?php 
                 if ($user->role == 0){
                    echo "Admin";
                }elseif ($user->role == 1 ) {
                    echo "Siswa";
                }elseif ($user->role == 2 ) {
                    echo "Pegawai";
                }else {
                    echo "Role tidak ada !!! Hubungi admin";
                }
            ?>
        </div>
    </div>
</div>
</div>