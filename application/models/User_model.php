<?php

class User_model extends CI_Model
{
  public function getData($data)
  {
    return $this->db->get_where('data_pegawai', ['email' => $data])->row_array();
  }
  public function updateUser($data)
  {
    $this->db->where('email', $data['email']);
    return $this->db->update('data_pegawai', $data);
  }
}
