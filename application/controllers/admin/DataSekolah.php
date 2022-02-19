<?php 

class DataSekolah extends CI_Controller{

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
	$data['title'] = "Data Sekolah";
	$data['sekolah'] = $this->penggajianModel->get_data('data_sekolah')->result();
	$this->load->view('templates_admin/header',$data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/dataSekolah',$data);
    $this->load->view('templates_admin/footer');
	}

	public function tambahData()
	{
	$data['title'] = "Tambah Data Sekolah";
	$this->load->view('templates_admin/header',$data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/tambahDataSekolah',$data);
    $this->load->view('templates_admin/footer');
	}

	public function tambahDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->tambahData();
		}else{
			$nama_sekolah			=$this->input->post('nama_sekolah');
			$alamat_sekolah			=$this->input->post('alamat_sekolah');
			$tahun_ajaran			=$this->input->post('tahun_ajaran');

			$data = array(
				'nama_sekolah'  	=>$nama_sekolah,
				'alamat_sekolah'  	=>$alamat_sekolah,
				'tahun_ajaran'  	=>$tahun_ajaran,
			);

			$this->penggajianModel->insert_data($data,'data_sekolah');
			$this->session->set_flashdata('pesan','<div class="alert alert-success dismissible fade show" role="alert">
  			<strong>Data berhasil ditambahkan!</strong>
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  			<span aria-hidden="true">&times;</span>
  			</button>
			</div>');
			redirect('admin/dataSekolah');

		}
	}

	public function updateData($id)
	{
	$where = array('id_sekolah' => $id);
	$data['sekolah'] = $this->db->query("SELECT * FROM data_sekolah WHERE id_sekolah='$id'")->result();
	$data['title'] = "Tambah Data Sekolah";
	$this->load->view('templates_admin/header',$data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/updateDataSekolah',$data);
    $this->load->view('templates_admin/footer');
	}

	public function updateDataAksi()
	{
		$this->_rules();

		if($this->form_validation->run() == FALSE){
			$this->updateData();
		}else{
			$id						=$this->input->post('id_sekolah');
			$nama_sekolah			=$this->input->post('nama_sekolah');
			$alamat_sekolah				=$this->input->post('alamat_sekolah');
			$tahun_ajaran			=$this->input->post('tahun_ajaran');

			$data = array(
				'nama_sekolah'  	=>$nama_sekolah,
				'alamat_sekolah'  	=>$alamat_sekolah,
				'tahun_ajaran' 		=>$tahun_ajaran,
			);

			$where = array(
				'id_sekolah' => $id
			);

			$this->penggajianModel->update_data('data_sekolah',$data,$where);
			$this->session->set_flashdata('pesan','<div class="alert alert-success dismissible fade show" role="alert">
  			<strong>Data berhasil diupdate!</strong>
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  			<span aria-hidden="true">&times;</span>
  			</button>
			</div>');
			redirect('admin/dataSekolah');

		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_sekolah','nama sekolah','required');
		$this->form_validation->set_rules('alamat_sekolah','alamat sekolah','required');
		$this->form_validation->set_rules('tahun_ajaran','tahun ajaran','required');
	}

	public function deleteData($id)
	{
		$where = array('id_sekolah' => $id);
		$this->penggajianModel->delete_data($where, 'data_sekolah');
		$this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
  			<strong>Data berhasil dihapus!</strong>
  			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  			<span aria-hidden="true">&times;</span>
  			</button>
			</div>');
			redirect('admin/dataSekolah');
	}
} 

?>