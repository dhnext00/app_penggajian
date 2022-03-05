<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->_rules();

		if($this->form_validation->run()==FALSE) {
			$data['title'] = "Form Login";
			$this->load->view('templates_admin/header',$data);
			$this->load->view('formLogin');
		}else{
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$cek = $this->penggajianModel->cek_login($username, $password);

			if($cek == FALSE)
			{
			$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Username atau password salah!</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> 
     				<span aria-hidden="true">&times;</span> 
				</button>
                </div>');
                redirect('welcome');	
			}else{
				$this->session->set_userdata('id_user', $cek->id_user);
				$this->session->set_userdata('username', $cek->username);
				$this->session->set_userdata('role',$cek->role);
				switch ($cek->role) {
					case 0 : 	redirect('admin/dashboard');
								break;
					case 1 : 	redirect('siswa/dashboard');
								break;
					case 2 :	redirect('pegawai/dashboard');
								break;
					case 3 :	redirect('../notif');
					default:	break;
				}
			}
		}

		
	}

	public function _rules()
	{
		$this->form_validation->set_rules('username','username','required');
		$this->form_validation->set_rules('password','password','required');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('welcome');
	}
}
