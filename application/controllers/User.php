<?php

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('email') == NULL) {
      redirect('auth');
    }
  }
  public function index()
  {
    $data['title'] = "Halaman Dashboard Pegawai";
    $email = $this->session->userdata('email');
    $data['bulan'] = date('m');
    $data['tahun'] = date('Y');
    $data['user'] =  $this->db->query("SELECT data_pegawai.*,data_jabatan.id_jabatan, data_jabatan.nama_jabatan, data_jabatan.gaji_pokok,data_jabatan.tunjangan,data_jabatan.uang_makan,
    data_kehadiran.bulan, data_kehadiran.nik
    FROM data_pegawai
    INNER JOIN data_jabatan ON data_pegawai.jabatan = data_jabatan.id_jabatan
    INNER JOIN data_kehadiran ON data_pegawai.nik = data_kehadiran.nik
    WHERE data_pegawai.email='$email'")->row_array();
    $this->load->view('user/templates/header', $data);
    $this->load->view('user/templates/sidebar', $data);
    $this->load->view('user/templates/topbar', $data);
    $this->load->view('user/index', $data);
    $this->load->view('user/templates/footer');
  }
  public function cetakSlipGaji()
  {
    $data['title'] = "Cetak Slip Gaji";
    $email = $this->session->userdata('email');
    $data['potongan'] = $this->db->query('SELECT * FROM potongan_gaji')->row_array();
    $data['user'] =  $this->db->query("SELECT data_pegawai.*,data_jabatan.id_jabatan, data_jabatan.nama_jabatan,data_jabatan.gaji_pokok,data_jabatan.tunjangan,data_jabatan.uang_makan, data_kehadiran.bulan,data_kehadiran.tahun,data_kehadiran.jml_hadir, data_kehadiran.sakit, data_kehadiran.alfa FROM data_pegawai
    INNER JOIN data_jabatan ON data_pegawai.jabatan = data_jabatan.id_jabatan
    INNER JOIN data_kehadiran ON data_pegawai.nik = data_kehadiran.nik
    WHERE data_pegawai.email='$email' ORDER BY data_kehadiran.bulan DESC")->row_array();
    $this->load->view('user/cetakSlip', $data);
  }
  public function ubahPassword()
  {
    $this->form_validation->set_rules('passwordLama', 'Password Lama', 'required|trim|min_length[3]', array(
      'required' => "Form Password harus terisi!",
      'min_length' => "Panjang Password Minimal 5 Karakter!"
    ));
    $this->form_validation->set_rules('password1', 'Password Baru', 'required|trim|min_length[3]|matches[password2]', array(
      'required' => "Form Password Baru harus terisi!",
      'min_length' => "Panjang Password Minimal 5 Karakter!"
    ));
    $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|trim|min_length[3]|matches[password1]', array(
      'required' => "Form Password Password Baru harus terisi!",
      'min_length' => "Panjang Password Minimal 5 Karakter!"
    ));
    $email = $this->session->userdata('email');
    $data['title'] = "Ubah Password";
    $data['bulan'] = date('m');
    $data['tahun'] = date('Y');
    $data['user'] =  $this->db->query("SELECT data_pegawai.*,data_jabatan.id_jabatan, data_jabatan.nama_jabatan, data_jabatan.gaji_pokok,data_jabatan.tunjangan,data_jabatan.uang_makan,
    data_kehadiran.bulan, data_kehadiran.nik
    FROM data_pegawai
    INNER JOIN data_kehadiran ON data_pegawai.nik = data_kehadiran.nik
    INNER JOIN data_jabatan ON data_pegawai.jabatan = data_jabatan.id_jabatan
    WHERE data_pegawai.email='$email'")->row_array();
    if ($this->form_validation->run() == false) {
      $this->load->view('user/templates/header', $data);
      $this->load->view('user/templates/sidebar', $data);
      $this->load->view('user/templates/topbar', $data);
      $this->load->view('user/ubahPassword');
      $this->load->view('user/templates/footer');
    } else {
      $currentPassword = $this->input->post('passwordLama');
      $passwordLama = $data['user']['password'];
      if (!password_verify($currentPassword, $passwordLama)) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Password saat ini yang anda masukkan tidak sesuai!
      </div>');
        redirect('user/ubahPassword');
      } else {
        $newPassword = $this->input->post('password1');
        if ($newPassword == $currentPassword) {
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
          Password yang anda masukkan tidak boleh sama dengan password lama!
        </div>');
          redirect('user/ubahPassword');
        } else {
          $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
          $this->db->set('password', $passwordHash);
          $this->db->where('email', $email);
          $this->db->update('data_pegawai');
          $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
         password anda berhasil diubah!
        </div>');
          redirect('user/ubahPassword');
        }
      }
    }
  }
  public function myProfile()
  {
    $data['status'] = ['Karyawan Tidak Tetap', 'Karyawan Tetap', 'Karyawan Magang', 'Fresh Graduate'];
    $data['bulan'] = date('m');
    $data['tahun'] = date('Y');
    $data['title'] = "Halaman Profile";
    $data['jenis_kelamin'] = ['Laki-Laki', 'Perempuan'];
    $data['jabatanUser'] = $this->db->query("SELECT * FROM data_jabatan")->result_array();
    $email = $this->session->userdata('email');
    $data['user'] =  $this->db->query("SELECT data_pegawai.*, data_jabatan.id_jabatan, data_jabatan.nama_jabatan,data_jabatan.gaji_pokok,data_jabatan.tunjangan,data_jabatan.uang_makan,data_kehadiran.nik,data_kehadiran.bulan 
     FROM data_pegawai
      INNER JOIN data_jabatan ON data_pegawai.jabatan = data_jabatan.id_jabatan
      INNER JOIN data_kehadiran ON data_pegawai.nik = data_kehadiran.nik
      WHERE data_pegawai.email='$email'")->row_array();
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim', array(
      'required' => "Form Email harus terisi!",
      'valid_email' => 'Kolom Email harus berisi alamat email yang valid!',
      'is_unique' => 'Email yang anda masukkan sudah pernah terdaftar!'
    ));
    $this->form_validation->set_rules('nama_pegawai', 'Nama', 'required', array(
      'required' => "Kolom Nama harus terisi!"
    ));
    $this->form_validation->set_rules('nik', 'NIK', 'required|min_length[5]', array(
      'required' => "Kolom NIK harus terisi!",
      'min_length' => "Kolom NIK panjang harus 12 Karakter"
    ));
    if ($this->form_validation->run() == false) {
      $this->load->view('user/templates/header', $data);
      $this->load->view('user/templates/sidebar', $data);
      $this->load->view('user/templates/topbar', $data);
      $this->load->view('user/profile', $data);
      $this->load->view('user/templates/footer');
    } else {
      $newGambar = null;
      $uploadGambar = $_FILES['gambar']['name'];
      if ($uploadGambar) {
        $config['upload_path'] = './assets/images/profile/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 2048;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('gambar')) {
          $gambarLama = $data['user']['images'];
          if ($gambarLama != 'default.jpg' || $gambarLama != 'default2.jpg' ||  $gambarLama != 'default2.png' || $gambarLama != 'default.png') {
            unlink(FCPATH . "./assets/images/profile/" . $gambarLama);
          }
          $newGambar = $this->upload->data('file_name');
        } else {
          echo $this->upload->display_errors();
        }
      } else {
        $newGambar = $data['user']['images'];
      }

      $data = [
        'id_pegawai' => $this->input->post('id_pegawai'),
        'images' => $newGambar,
        'email' => $this->input->post('email'),
        'nama_pegawai' => $this->input->post('nama_pegawai'),
        'nik' => $this->input->post('nik'),
        'status' => $this->input->post('status'),
        'jabatan' => $this->input->post('jabatan'),
        'jk' => $this->input->post('jk'),
        'tgl_masuk' => $this->input->post('tgl_masuk'),
      ];
      $this->db->where('id_pegawai', $data['id_pegawai']);
      $this->db->update('data_pegawai', $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Profile anda berhasil di Update!
      </div>');
      redirect('user/myProfile');
    }
  }
  public function blocked()
  {
    $data['title'] = "Block Access";
    $this->load->view('user/templates/header', $data);
    $this->load->view('user/blockedAccess', $data);
    $this->load->view('user/templates/footer');
  }
  public function logout()
  {
    if ($this->session->userdata('email') != NULL) {
      $this->session->unset_userdata('email');
      $this->session->unset_userdata('role_id');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Anda berhasil Logout!
      </div>');
      redirect('auth');
    }
  }
}
