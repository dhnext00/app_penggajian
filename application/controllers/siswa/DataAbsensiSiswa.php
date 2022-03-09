<?php 

class DataAbsensiSiswa extends CI_Controller{

     public function __construct(){
        parent:: __construct();

        if($this->session->userdata('hak_akses') !='2') {
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
        $nis=$this->session->userdata('nis');
    
    if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];
        $bulantahun = $bulan.$tahun;
    }else{
        $bulan = date('m');
        $tahun = date('Y');
        $bulantahun = $bulan.$tahun;
    }

        $data['absensi'] = $this->db->query("SELECT data_kehadiran.*, data_siswa.nama_siswa,data_siswa.nis,data_sekolah.alamat_sekolah,data_sekolah.tahun_ajaran,data_kehadiran.hadir,data_kehadiran.bulan,data_kehadiran.id_kehadiran
            FROM data_siswa
            INNER JOIN data_kehadiran ON data_kehadiran.nis=data_siswa.nis
            INNER JOIN data_sekolah ON data_sekolah.nama_sekolah=data_siswa.sekolah
            WHERE data_kehadiran.bulan='$bulantahun'
            ORDER BY data_kehadiran.bulan ASC")->result();
       
        $this->load->view('templates_siswa/header',$data);
        $this->load->view('templates_siswa/sidebar');
        $this->load->view('siswa/dataAbsensiSiswa',$data);
        $this->load->view('templates_siswa/footer');
    }

    public function cetakAbsensi($id)
    {
        $data['title'] = "Cetak Absensi Siswa";
        $data['print_slip'] = $this->db->query("SELECT data_kehadiran.*,data_siswa.nama_siswa,data_siswa.jenis_kelamin,data_siswa.sekolah
            FROM data_kehadiran
            INNER JOIN data_siswa ON data_kehadiran.nis=data_siswa.nis
            INNER JOIN data_sekolah ON data_siswa.sekolah=data_sekolah.nama_sekolah
            WHERE data_kehadiran.id_kehadiran='$id'")->result();
        $this->load->view('templates_siswa/header',$data);
        $this->load->view('siswa/cetakAbsensi',$data);
    }
}

?>  