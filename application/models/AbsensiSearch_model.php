<?php
class AbsensiSearch_model extends CI_Model
{
 function fetch_data($query)
 {
  $this->db->select("*");
  $this->db->from("data_kehadiran a");
  $this->db->join('data_siswa b', 'a.nis = b.nis', 'inner');
  $this->db->join('data_sekolah c', 'b.sekolah = c.nama_sekolah', 'inner');
  // $this->db->where('data_kehadiran.bulan='$bulantahun' AND data_kehadiran.nama_siswa = '$nama_siswa'');
  if($query != '')
  {
   $this->db->like('a.nis', $query);
   $this->db->or_like('a.nama_siswa', $query);
   $this->db->or_like('a.jenis_kelamin', $query);
   $this->db->or_like('a.nama_sekolah', $query);
   $this->db->or_like('a.hadir', $query);
   $this->db->or_like('a.sakit', $query);
   $this->db->or_like('a.alpha', $query);
  }
  return $this->db->get();
 }
}
?>