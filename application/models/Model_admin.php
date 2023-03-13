<?php

class Model_admin extends CI_Model
{
  public function getData($data)
  {
    return $this->db->get_where('data_pegawai', ['email' => $data])->row_array();
  }
  public function AllData()
  {
    return $this->db->get('data_pegawai')->num_rows();
  }
  public function DataAdmin()
  {
    $this->db->where('id_role', 1);
    return $this->db->get('data_pegawai')->num_rows();
  }
  public function DataJabatan()
  {
    return $this->db->get('data_jabatan')->num_rows();
  }
  public function DataKehadiran()
  {
    return $this->db->get('data_kehadiran')->num_rows();
  }
  public function dataJabatanAll()
  {
    return $this->db->get('data_jabatan')->result_array();
  }
  public function insertDataJabatan($data)
  {
    return $this->db->insert('data_jabatan', $data);
  }
  public function getDataById($data)
  {
    $this->db->where('id_jabatan', $data);
    return $this->db->get('data_jabatan')->row_array();
  }
  public function updateDataJabatan($data)
  {
    $this->db->where('id_jabatan', $data['id_jabatan']);
    return $this->db->update('data_jabatan', $data);
  }
  public function deleteDataJabatan($data)
  {
    $this->db->where('id_jabatan', $data);
    return $this->db->delete('data_jabatan');
  }
  public function insertDataPegawai($data)
  {
    return $this->db->insert('data_pegawai', $data);
  }
  public function JoinData()
  {
    $this->db->select('*');
    $this->db->from('data_pegawai');
    $this->db->join('data_jabatan', 'data_jabatan.id_jabatan = data_pegawai.jabatan');
    return $this->db->get()->result_array();
  }
  public function joinDataPegawai($data)
  {
    $this->db->select('*');
    $this->db->from('data_pegawai');
    $this->db->join('data_jabatan', 'data_jabatan.id_jabatan = data_pegawai.jabatan');
    $this->db->where('id_pegawai', $data);
    return $this->db->get()->row_array();
  }
  public function updateDataPegawai($data)
  {
    $this->db->where('id_pegawai', $data['id_pegawai']);
    return $this->db->update('data_pegawai', $data);
  }
  public function insertDataKehadiran($data)
  {
    $jumlah = count($data);
    if ($jumlah > 0) {
      return $this->db->insert_batch('data_kehadiran', $data);
    }
  }
}
