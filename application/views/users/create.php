<div class="container">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Item</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="<?php echo base_url('users');?>"> Back</a>
        </div>
    </div>
</div>


<form method="post" action="<?php echo base_url('usersCreate');?>">
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


    <div class="container">
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong>Username: <i class="fa fa-info text-warning" aria-hidden="true" data-toggle="tooltip" data-placement="bottom" title="Username tidak bisa di ganti"></i></strong>
                <input type="text" name="username" class="form-control">
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong>Password:</strong>
                <input type="password" name="password" class="form-control">
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10">
            <strong>Role</strong>
            <select class="form-control" id="exampleFormControlSelect1" name="role">
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