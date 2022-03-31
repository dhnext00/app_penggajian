<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absensi extends CI_Controller {
public function __construct() {
      parent::__construct();
      $this->load->database();
   }

 public function index()
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
    $this->session->set_userdata('bulantahun',$bulantahun);
    $this->load->view('templates_admin/header',$data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/absensi',$data);
    $this->load->view('templates_admin/footer');
 }

<<<<<<< HEAD
 public function inputAbsensi()
  {
    if($this->input->post('submit', TRUE) == 'submit'){

      $post = $this->input->post();

      foreach ($post['bulan'] as $key => $value) {
        if($post['bulan'][$key] !='' || $post['nis'][$key] !='' )
        {
          $simpan[] = array(

            'bulan'       => $post['bulan'][$key],
            'nis'       => $post['nis'][$key],
            'nama_siswa'    => $post['nama_siswa'][$key],
            'jenis_kelamin'   => $post['jenis_kelamin'][$key],
            'nama_sekolah'    => $post['nama_sekolah'][$key],
            'hadir'       => $post['hadir'][$key],
            'sakit'       => $post['sakit'][$key],
            'alpha'       => $post['alpha'][$key],
          );
        }
      }

      $this->penggajianModel->insert_batch('data_kehadiran', $simpan);
      $this->session->set_flashdata('pesan','<div class="alert alert-success dismissible fade show" role="alert">
        <strong>Data berhasil ditambahkan!</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>');
      redirect('admin/absensi');
    }

    $data['title'] = "Form Input Absensi";
    if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $bulantahun = $bulan.$tahun;
    }else{
        $bulan = date('m');
        $tahun = date('Y');
        $bulantahun = $bulan.$tahun;
    }
    $data['input_absensi'] = $this->db->query("SELECT data_siswa.*, data_sekolah.nama_sekolah FROM data_siswa
      INNER JOIN data_sekolah ON data_siswa.sekolah=data_sekolah.nama_sekolah
      WHERE NOT EXISTS (SELECT * FROM data_kehadiran WHERE bulan='$bulantahun' AND data_siswa.nis=data_kehadiran.nis) ORDER BY data_siswa.nama_siswa ASC")->result();
    $this->load->view('templates_admin/header',$data);
      $this->load->view('templates_admin/sidebar');
      $this->load->view('admin/formInputAbsensi',$data);
      $this->load->view('templates_admin/footer');
  }

=======
>>>>>>> e75c021408cdce3ef023e621f9440039eb6f7b3e
 function fetch($data=array())
 {
  $bulantahun = $this->session->userdata('bulantahun');
  $output = '';
  $query = '';
  $this->load->model('AbsensiSearch_model');
  if($this->input->post('query'))
  {
   $query = $this->input->post('query');
  }
  $data = $this->AbsensiSearch_model->fetch_data($query,$bulantahun);
  $output .= '
  <div class="table-responsive">
     <table class="table table-bordered table-striped">
      <tr>
       <th>No</th>
       <th>NIS</th>
       <th>Bulan</th>
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
       <td>'.$row->bulan.'</td>
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

 function resetDate(){
    $this->session->unset_userdata('bulantahun');
    redirect('admin/absensi');
 }
 
}
