<form method=”post”>
<input type=”text” name=”nis” placeholder=”Search….”/>
<input type=”submit” name=”cari2″ value=”cari”>
</form>
<table border=”1″ cellpadding=”5″ cellspacing=”5″>
<tr>
<th> NIS </th>
<th> Nama Siswa </th>
<th> Jenis Kelamin </th>
<th> Sekolah </th>
</tr>
<?php if(isset($_POST[‘cari2’])){
$no = 1; //buat urutan nomer
$cari = $_POST[‘nis’];
$sql = “select * from 'data_kehadiran' where bulan like ‘%$cari%’ or nama_siswa like ‘%$cari%’ or jenis_kelamin like ‘%$cari%’ or nama_sekolah like ‘%$cari%’”;
$query = mysqli_query($data_kehadiran,$sql);
while ($data = mysqli_fetch_array($query)){
?>
<tr>
// panggil hasil pencarian
<th><?php echo $no;?></th>
<th><?php echo $data[‘nis’];?></th>
<th><?php echo $data[‘nama_siswa’];?></th>
<th><?php echo $data[‘jenis_kelamin’];?></th>
<th><?php echo $data[‘nama_sekolah’];?></th>
<?php
$no++; // pengulangan nomer saat di tampilin
}}
?>
</tr>


<div class="container">
    <div class="form-group form-inline pull-">
        <div class="input-group">
            <span class="input-group">Search</span>
            <input type="text" name="search_text" id="search-text" placeholder="Pencarian" class="form-control" />
        </div>
    </div>
    <br />
    <div id="result"></div>
</div>
<div style="clear:both"></div>
<br />
<br />
<br />



<input type="text" name="s_keyword" id="s_keyword" class="form-control">

 <div class="col-sm-4">
        <div class="form-group form-inline">
            <label>Search</label>
            <input type="text" name="s_keyword" id="s_keyword" class="form-control">
        </div>
    </div>
</div><hr>
 
<div class="data"></div>
<div class="col-sm-4">
    <div class="form-group form-inline">
        <div class="input-group">
            <span class="input-group">Search</span>
            <input type="text" name="search_text" id="search-text" placeholder="Pencarian" class="form-control" />
        </div>
    </div>
    <br />
    <div id="result"></div>
</div>
<div style="clear:both"></div>
<br />
<br />
<br />

$data['inputAbsensi'] = $this->db->query("SELECT data_sekolah.*, data_siswa.nama_siswa FROM data_sekolah
    		INNER JOIN data_siswa ON data_sekolah.nis=data_siswa.nama_siswa
    		WHERE NOT class_exists(SELECT * FROM data_kehadiran WHERE bulan='$bulantahun' AND data_siswa.nis=data_kehadiran.nis) ORDER BY data_siswa.nama_siswa ASC")->RESULT();
    	$this->load->view('templates_admin/footer')
    	$this->load->view('templates_admin/sidebar')
    	$this->load->view('admin/templates_admin')

<span class="badge badge-danger <?php echo base_url('searchResult?bulan&tahun') ?>"><i class="fas fa-info-circle"></i> Data masih kosong, silahkan input data kehadiran pada bulan dan tahun yang Anda pilih.</span>


