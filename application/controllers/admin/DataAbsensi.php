<?php 

class DataAbsensi extends CI_Controller{

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
	$data['absensi'] = $this->db->query("SELECT data_kehadiran.*,data_siswa.nama_siswa, data_siswa.jenis_kelamin, data_siswa.sekolah
		FROM data_kehadiran
		INNER JOIN data_siswa ON data_kehadiran.nis=data_siswa.nis
		INNER JOIN data_sekolah ON data_siswa.sekolah = data_sekolah.nama_sekolah
		WHERE data_kehadiran.bulan='$bulantahun'
		ORDER BY data_siswa.nama_siswa ASC")->result();
	
	$this->load->view('templates_admin/header',$data);
    $this->load->view('templates_admin/sidebar');
    $this->load->view('admin/dataAbsensi',$data);
    $this->load->view('templates_admin/footer');
	}
	public function searchResult(){
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
		$nama_siswa = $_GET['nama_siswa'];
		$data['absensi'] = $this->db->query("SELECT data_kehadiran.*,data_siswa.nama_siswa, data_siswa.jenis_kelamin, data_siswa.sekolah
			FROM data_kehadiran
			INNER JOIN data_siswa ON data_kehadiran.nis=data_siswa.nis
			INNER JOIN data_sekolah ON data_siswa.sekolah = data_sekolah.nama_sekolah
			WHERE data_kehadiran.bulan='$bulantahun' AND data_kehadiran.nama_siswa = '$nama_siswa'
			ORDER BY data_siswa.nama_siswa ASC")->result();

			$this->load->view('templates_admin/header',$data);
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/dataAbsensi',$data);
			$this->load->view('templates_admin/footer');
	}
	public function inputAbsensi()
	{
		if($this->input->post('submit', TRUE) == 'submit'){

			$post = $this->input->post();

			foreach ($post['bulan'] as $key => $value) {
				if($post['bulan'][$key] !='' || $post['nis'][$key] !='' )
				{
					$simpan[] = array(

						'bulan'				=> $post['bulan'][$key],
						'nis'				=> $post['nis'][$key],
						'nama_siswa'		=> $post['nama_siswa'][$key],
						'jenis_kelamin'		=> $post['jenis_kelamin'][$key],
						'nama_sekolah'		=> $post['nama_sekolah'][$key],
						'hadir'				=> $post['hadir'][$key],
						'sakit'				=> $post['sakit'][$key],
						'alpha'				=> $post['alpha'][$key],
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
			redirect('admin/dataAbsensi');
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
}

 ?>
 