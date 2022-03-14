<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit <?php echo $user->username; ?></h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo base_url('users');?>"> Back</a>
        </div>
    </div>
</div>


<form method="post" action="<?php echo base_url('users/update/'.$user->id_user);?>">
    <?php


    if ($this->session->flashdata('errors')){
        echo '<div class="alert alert-danger">';
        echo $this->session->flashdata('errors');
        echo "</div>";
    }
    if(isset($_SESSION['errors'])){
        unset($_SESSION['errors']);
    }


    ?>


    <div class="row">
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong>Username:</strong>
                <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>" disabled>
                <input type="text" name="username" value="<?php echo $user->username; ?>" hidden>
            </div>
        </div>
        <div class="input-group mb-3 col-xs-10 col-sm-10 col-md-10">
                <div class="input-group-prepend">
                    <div class="input-group-text">
                    <strong>Password </strong>
                    <input class="ml-2" type="checkbox" aria-label="Show/Hide Password" onclick="showHidePw()">
                    </div>
                </div>
                    <input type="password" name="password" class="form-control" id="shPw" required>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
            <?php 
                $role = $user->role;
                    if ($role == 0){
                        $role = "Admin";
                    }elseif ($role == 1 ) {
                        $role = "Siswa";
                    }elseif ($role == 2 ) {
                        $role = "Pegawai";
                    }else {
                        $role = "Role tidak ada !!! Hubungi admin";
                    }
            ?>
            <strong>Role</strong>
            <select class="form-control" id="exampleFormControlSelect1" name="role">
            <option value="<?php echo $user->role; ?>" selected class="bg-dark text-light"><?php echo $role; ?></option>
            <option value="0">Admin</option>
            <option value="1">Siswa</option>
            <option value="2">Pegawai</option>
            </select>
        </div>
        <br>
        <div class="col-xs-10 col-sm-10 col-md-10 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>


</form>
</div>