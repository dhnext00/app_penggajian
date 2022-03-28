<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {
public function __construct() {
      parent::__construct();
      $this->load->database();
   }

 function index()
 {
    $data['title'] = "Data Absensi Siswa";
    if(isset($_GET['bulan']) && $_GET['bulan']!='' && isset($_GET['tahun']) && $_GET['tahun']!=''){
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $bulantahun = $bulan.$tahun;
    }else{
        $bulan = date('m');
        $tahun = date('Y');
        $bulantahun = $bulan.$tahun;
    }
    $data['bulan'] = $bulan;
    $data['tahun'] = $tahun;
    $this->load->view('templates_admin/header',$data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/absensi',$data);
    $this->load->view('templates_admin/footer');
 }

 function fetch()
 {
  $output = '';
  $query = '';
  $this->load->model('AbsensiSearch_model');
  if($this->input->post('query'))
  {
   $query = $this->input->post('query');
  }
  $data = $this->AbsensiSearch_model->fetch_data($query);
  $output .= '
  <div class="table-responsive">
     <table class="table table-bordered table-striped">
      <tr>
       <th>No</th>
       <th>NIS</th>
       <th>Nama Siswa</th>
       <th>Jenis Kelamin</th>
       <th>Nama Sekolah</th>
       <th>hadir</th>
       <th>sakit</th>
       <th>alpha</th>
      </tr>
  ';
  if($data->num_rows() > 0)
  {
    $no = 1;
   foreach($data->result() as $row)
   {
    $output .= '
      <tr>
       <td>'.$no++.'</td>
       <td>'.$row->nis.'</td>
       <td>'.$row->nama_siswa.'</td>
       <td>'.$row->jenis_kelamin.'</td>
       <td>'.$row->nama_sekolah.'</td>
       <td>'.$row->hadir.'</td>
       <td>'.$row->sakit.'</td>
       <td>'.$row->alpha.'</td>
      </tr>
    ';
   }
  }
  else
  {
   $output .= '<tr>
       <td colspan="5">No Data Found</td>
      </tr>';
  }
  $output .= '</table>';
  echo $output;
 }

}

?>
else{
    else
    $output .= '<tr>
        <colgroup><?php class: "5" ?>No Failed</colgroup>
        <p><?php echo base_url("nama_siswa") ?></p>
        <p><?php echo base_url("search") ?></p>
        <tr>
            <td>No</td>
            <td>NIS</td>
            <td>Nama Siswa</td>
            <td>Jenis Kelamin</td>
            <td>Nama Sekolah</td>
            <td>Hadir</td>
            <td>Sakit</td>
            <td>Alpha</td>
        </tr>
}else{
    $output ="
    <tr>
        <td><?php echo base_url($no++) ?></td>
        <td><?php echo base_url($nis) ?></td>
        <td><?php echo base_url($nama_siswa) ?></td>
        <td><?php echo base_url($jenis_kelamin) ?></td>
        <td><?php echo base_url($nama_sekolah) ?></td>
        <td><?php echo base url($hadir) ?></td>
        <td><?php echo base_url($sakit) ?></td>
        <td><?php echo base_url($alpha) ?></td>
    </tr>"
}
