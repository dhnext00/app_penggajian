<?php 
    class Notif extends CI_Controller {
        public function __construct(){
            parent:: __construct();
    
            if($this->session->userdata('role') !='3') {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Anda belum login!</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
                        <span aria-hidden="true">&times;</span> 
                    </button>
                    </div>');
                    redirect('welcome');
            }
        }
        public function index(){
            $data['title'] = "Notif";
            $this->load->view('templates_admin/header',$data);
            $this->load->view('notif',$data);
            $this->load->view('templates_admin/footer');
        }
    }
?>