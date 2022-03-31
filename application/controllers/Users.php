<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller {


   public $users;


   /**
    * Get All Data from this method.
    *
    * @return Response
   */
   public function __construct() {
      parent::__construct(); 

      $this->load->library('form_validation');
      $this->load->library('session');
      $this->load->model('UsersModel');


      $this->users = new UsersModel;
   }


   /**
    * Display Data this method.
    *
    * @return Response
   */
   public function index()
   {
       $data['title'] = "Users";
       $data['data'] = $this->users->get_users();
       $this->load->view('templates_admin/header',$data); 
       $this->load->view('templates_admin/sidebar');      
       $this->load->view('users/list',$data);
       $this->load->view('templates_admin/footer');
   }


   /**
    * Show Details this method.
    *
    * @return Response
   */
   public function view($id_user)
   {
      $user = $this->users->find_user($id_user);

      $data['title'] = $user->username;
      $this->load->view('templates_admin/header',$data);
      $this->load->view('templates_admin/sidebar');
      $this->load->view('users/view',array('user'=>$user));
      $this->load->view('templates_admin/footer');
   }


   /**
    * Create from display on this method.
    *
    * @return Response
   */
   public function create()
   {
      $data['title'] = "Tambah User";       
      $this->load->view('templates_admin/header',$data);
      $this->load->view('templates_admin/sidebar');
      $this->load->view('users/create');
      $this->load->view('templates_admin/footer');   
   }


   /**
    * Store Data from this method.
    *
    * @return Response
   */
   public function add()
   {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[users.username]',
                                          array(
                                             'required'      => '%s wajib diisi',
                                             'is_unique'     => '%s Sudah terdaftar.'
                                          ));
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('role', 'Role', 'required');


        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('errors', validation_errors());
            redirect(base_url('users/create'));
        }else{
           $this->users->insert_user();
           redirect(base_url('users'));
        }
    }


   /**
    * Edit Data from this method.
    *
    * @return Response
   */
   public function edit($id_user)
   {
       $data['title'] = "Edit Users";
       $user = $this->users->find_user($id_user);


       $this->load->view('templates_admin/header',$data);
       $this->load->view('templates_admin/sidebar');
       $this->load->view('users/edit',array('user'=>$user));
       $this->load->view('templates_admin/footer');
   }


   /**
    * Update Data from this method.
    *
    * @return Response
   */
   public function update($id_user)
   {
          $this->users->update_user($id_user);
          redirect(base_url('users'));
   }


   /**
    * Delete Data from this method.
    *
    * @return Response
   */
   public function delete($id_user)
   {
       $user = $this->users->delete_user($id_user);
       redirect(base_url('users'));
   }
}