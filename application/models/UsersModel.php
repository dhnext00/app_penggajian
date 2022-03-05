<?php


class UsersModel extends CI_Model{


    public function get_users(){
        if(!empty($this->input->get("search"))){
          $this->db->like('username', $this->input->get("search"));
          $this->db->or_like('role', $this->input->get("search")); 
        }
        $query = $this->db->get("users");
        return $query->result();
    }


    public function insert_user()
    {    
        $data = array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'role' => $this->input->post('role')
        );
        return $this->db->insert('users', $data);
    }


    public function update_user($id_user) 
    {
        $data=array(
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'role' => $this->input->post('role')
        );
        if($id_user==0){
            return $this->db->insert('users',$data);
        }else{
            $this->db->where('id_user',$id_user);
            return $this->db->update('users',$data);
        }        
    }


    public function find_user($id_user)
    {
        return $this->db->get_where('users', array('id_user' => $id_user))->row();
    }


    public function delete_user($id_user)
    {
        return $this->db->delete('users', array('id_user' => $id_user));
    }
}
?>