<?php 

class dashboard extends CI_Controller{

    public function __construct(){
        parent:: __construct();

        if($this->session->userdata('role') !='0') {
            $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Anda belum login!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                    <span aria-hidden="true">&times;</span> 
                </button>
                </div>');
                redirect('welcome');
        }
    }
    public function index()
    {
    $data['title'] = "Dashboard";
    $siswa = $this->db->query("SELECT * FROM data_siswa");
    $admin = $this->db->query("SELECT * FROM data_siswa WHERE sekolah = 'Admin'");
    $sekolah = $this->db->query("SELECT * FROM data_sekolah");
    $kehadiran = $this->db->query("SELECT * FROM data_kehadiran");
    $data['siswa']=$siswa->num_rows();
    $data['admin']=$admin->num_rows();
    $data['sekolah']=$sekolah->num_rows();
    $data['kehadiran']=$kehadiran->num_rows();
    $this->load->view('templates_admin/header',$data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/dashboard',$data);
    $this->load->view('templates_admin/footer');
    }
}

?>  