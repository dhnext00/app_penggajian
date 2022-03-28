<?php
class AbsensiSearch_model extends CI_Model
{
 function fetch_data($query,$bulantahun)
 {
  $bt = $bulantahun;
  $this->db->select("*");
  $this->db->from("data_kehadiran a");
  $this->db->join('data_siswa b', 'a.nis = b.nis', 'inner');
  $this->db->join('data_sekolah c', 'b.sekolah = c.nama_sekolah', 'inner');
  $this->db->where("a.bulan='$bt'");
  if($query != '')
  {
   $this->db->where('a.nama_siswa', $query);
  }
  return $this->db->get();
 }
}
?>