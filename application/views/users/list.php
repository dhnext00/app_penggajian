<div class="container">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>LIST USERS</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="<?php echo base_url('users/create') ?>"> Create New Users</a>
        </div>
    </div>
</div>


<table class="table table-bordered">


  <thead>
      <tr>
          <th>Username</th>
          <th>Role</th>
          <th width="220px">Action</th>
      </tr>
  </thead>


  <tbody>
   <?php foreach ($data as $user) {
       if ($user->role == 0){
           $user->roles = "Admin";
       }elseif ($user->role == 1 ) {
            $user->roles = "Siswa";
       }elseif ($user->role == 2 ) {
            $user->roles = "Pegawai";
       }else {
            $user->roles = "Role tidak ada !!! Hubungi admin";
       }
        
        ?>      
      <tr>
          <td><?php echo $user->username; ?></td>
          <td><?php echo $user->roles ?></td>          
      <td>
        <form method="DELETE" action="<?php echo base_url('users/delete/'.$user->id_user);?>">
          <a class="btn btn-info" href="<?php echo base_url('user/'.$user->id_user) ?>"> show</a>
         <a class="btn btn-primary" href="<?php echo base_url('users/edit/'.$user->id_user) ?>"> Edit</a>
          <button type="submit" class="btn btn-danger"> Delete</button>
        </form>
      </td>     
      </tr>
      <?php } ?>
  </tbody>


</table>
</div>