<?php 

class SlipAbsensi extends CI_Controller{

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
		$data['title'] = "Filter Slip Absensi Siswa";
		$data['siswa'] = $this->penggajianModel->get_data('data_siswa')->result();
		$this->load->view('templates_admin/header',$data);
    	$this->load->view('templates_admin/sidebar');
    	$this->load->view('admin/filterSlipAbsensi',$data);
    	$this->load->view('templates_admin/footer');
	}

	public function cetakSlipAbsensi()
	{
		$data['title'] = "Cetak Slip Absensi";
		$data['lap_kehadiran'] = $this->penggajianModel->get_data('data_kehadiran')->result();
		$nama = $this->input->post('nama_siswa');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');
		$bulantahun=$bulan.$tahun;
		
		$data['print_slip'] = $this->db->query("SELECT data_siswa.nis,data_siswa.nama_siswa,data_sekolah.nama_sekolah,data_sekolah.alamat_sekolah,data_sekolah.tahun_ajaran,data_kehadiran.hadir,data_kehadiran.sakit,data_kehadiran.alpha,data_kehadiran.bulan
			FROM data_siswa
			INNER JOIN data_kehadiran ON data_kehadiran.nis=data_siswa.nis
			INNER JOIN data_sekolah ON data_sekolah.nama_sekolah=data_siswa.sekolah
			WHERE data_kehadiran.bulan='$bulantahun' AND data_kehadiran.nama_siswa='$nama'")->result();
		$this->load->view('templates_admin/header',$data);
    	$this->load->view('admin/cetakSlipAbsensi',$data);
	}
}

 ?>