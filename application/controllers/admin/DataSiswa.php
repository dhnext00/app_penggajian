<?php 

class dataSiswa extends CI_Controller{

	 public function __construct(){
        parent:: __construct();

        if($this->session->userdata('hak_akses') !='1') {
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
	$data['title'] = "Data Siswa";
	$data['siswa'] = $this->penggajianModel->get_data_siswa('data_siswa')->result();
	$this->load->view('templates_admin/header',$data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/dataSiswa',$data);
    $this->load->view('templates_admin/footer');
	}

	public function tambahData()
	{
	$data['title'] = "Tambah Data Siswa";
	$data['sekolah'] = $this->penggajianModel->get_data('data_sekolah')->result();
	$this->load->view('templates_admin/header',$data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/formTambahSiswa',$data);
    $this->load->view('templates_admin/footer');
	}

	public function tambahDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->tambahData();
		}else{
			$nis 					=$this->input->post('nis');
			$nama_siswa 			=$this->input->post('nama_siswa');
			$jenis_kelamin 			=$this->input->post('jenis_kelamin');
			$tanggal_masuk 			=$this->input->post('tanggal_masuk');
			$sekolah 				=$this->input->post('sekolah');
			$kelas 					=$this->input->post('kelas');
			$jurusan 				=$this->input->post('jurusan');
			$hak_akses 				=$this->input->post('hak_akses');
			$username 				=$this->input->post('username');
			$password 				=md5($this->input->post('password'));
			$photo 					=$_FILES['photo']['name'];
			if($photo=''){}else{
				$config ['upload_path'] = './assets/photo';
				$config ['allowed_types'] = 'jpg|jpeg|png|tiff';
				$this->load->library('upload',$config);
				if(!$this->upload->do_upload('photo')){
					echo "Photo Gagal diupload!";
				}else{
					$photo=$this->upload->data('file_name');
				}
			}

			$data = array(
				'nis'				=> $nis,
				'nama_siswa'		=> $nama_siswa,
				'jenis_kelamin'		=> $jenis_kelamin,
				'sekolah'			=> $sekolah,
				'tanggal_masuk'		=> $tanggal_masuk,
				'kelas'				=> $kelas,
				'jurusan'			=> $jurusan,
				'hak_akses'			=> $hak_akses,
				'username'			=> $username,
				'password'			=> $password,
				'photo'				=> $photo,
			);

			$this->penggajianModel->insert_data($data,'data_siswa');
			$this->session->set_flashdata('pesan','<div class="alert alert-success dismissible fade show" role="alert">
  			<strong>Data berhasil ditambahkan!</strong>
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  			<span aria-hidden="true">&times;</span>
  			</button>
			</div>');
			redirect('admin/dataSiswa');
		}
	}

	public function updateData($id)
	{
		$where = array('id_siswa' => $id);
		$data['title'] = 'Update Data Siswa';
		$data['sekolah'] = $this->penggajianModel->get_data('data_sekolah')->result();
		$data['siswa'] = $this->db->query("SELECT * FROM data_siswa WHERE id_siswa='$id'")->result();
		$this->load->view('templates_admin/header',$data);
    	$this->load->view('templates_admin/sidebar');
    	$this->load->view('admin/formUpdateSiswa',$data);
    	$this->load->view('templates_admin/footer');
	
	}

	public function updateDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->updateData();
		}else{
			$nis 					=$this->input->post('nis');
			$nama_siswa 			=$this->input->post('nama_siswa');
			$jenis_kelamin 			=$this->input->post('jenis_kelamin');
			$tanggal_masuk 			=$this->input->post('tanggal_masuk');
			$sekolah 				=$this->input->post('sekolah');
			$kelas 					=$this->input->post('kelas');
			$jurusan 				=$this->input->post('jurusan');
			$hak_akses 				=$this->input->post('hak_akses');
			$username 				=$this->input->post('username');
			$password 				=md5($this->input->post('password'));
			$photo 					=$_FILES['photo']['name'];
			if($photo){
				$config ['upload_path'] = './assets/photo';
				$config ['allowed_types'] = 'jpg|jpeg|png|tiff';
				$this->load->library('upload',$config);
				if($this->upload->do_upload('photo')){
					$photo=$this->upload->data('file_name');
				}else{
					echo $this->upload->display_errors();
				}
			}

			$data = array(
				'nis'				=> $nis,
				'nama_siswa'		=> $nama_siswa,
				'jenis_kelamin'		=> $jenis_kelamin,
				'sekolah'			=> $sekolah,
				'tanggal_masuk'		=> $tanggal_masuk,
				'kelas'				=> $kelas,
				'jurusan'			=> $jurusan,
				'hak_akses'			=> $hak_akses,
				'username'			=> $username,
				'password'			=> $password,
				'photo'				=> $photo,
			);

			$where = array(
				'id_siswa' => $this->input->post('id_siswa')
			);
			$this->penggajianModel->update_data('data_siswa',$data,$where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success dismissible fade show" role="alert">
  			<strong>Data berhasil diupdate!</strong>
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  			<span aria-hidden="true">&times;</span>
  			</button>
			</div>');
			redirect('admin/dataSiswa');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nis','NIS','required');
		$this->form_validation->set_rules('nama_siswa','Nama Siswa','required');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
		$this->form_validation->set_rules('tanggal_masuk','Tanggal Masuk','required');
		$this->form_validation->set_rules('sekolah','Sekolah','required');
		$this->form_validation->set_rules('kelas','Kelas','required');
		$this->form_validation->set_rules('jurusan','Jurusan','required');
	}


	public function deleteData($id)
	{
		$where = array('id_siswa' => $id);
		$this->penggajianModel->delete_data($where, 'data_siswa');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  			<strong>Data berhasil dihapus!</strong>
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  			<span aria-hidden="true">&times;</span>
  			</button>
			</div>');
			redirect('admin/dataSiswa');
	}
} 



?>
