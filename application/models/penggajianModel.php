<?php 

class PenggajianModel extends CI_model{

	public function get_data($table){
		return $this->db->get($table);
	}
<<<<<<< HEAD

=======
>>>>>>> 0f31d6380ef60ae6a3f236a209710d3aac414161
	public function get_data_siswa($table){
		$this->db->order_by("nama_siswa", "asc");
		return $this->db->get($table);
	}
<<<<<<< HEAD

	public function get_data_sekolah($table){
		$this->db->order_by("nama_sekolah", "asc");
		return $this->db->get($table);
	}

=======
>>>>>>> 0f31d6380ef60ae6a3f236a209710d3aac414161
	public function insert_data($data,$table){
		$this->db->insert($table,$data);
	}

	public function update_data($table, $data, $where){
		$this->db->update($table, $data, $where);
	}

	public function delete_data($where,$table){
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function insert_batch($table = null, $data = array())
	{
		$jumlah = count($data);
		if($jumlah > 0)
		{
			$this->db->insert_batch($table, $data);
		}
	}

	public function cek_login()
	{
		$username		= set_value('username');
		$password		= set_value('password');

		$result			= $this->db->where('username',$username)
								   ->where('password',md5($password))
								   ->limit(1)
								   ->get('data_siswa');
		if($result->num_rows()>0){
			return $result->row();
		}else{
			return FALSE;
		}
	}
} 

?>