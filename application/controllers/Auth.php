<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('email') != "") {
      if ($this->session->userdata('id_role') == 1) {
        redirect('admin');
      } else {
        redirect('user');
      }
    }
  }
  public function index()
  {
    $this->form_validation->set_rules('email', 'Email', 'required|trim', array(
      'required' => 'Kolom Email harus diisi!'
    ));
    $this->form_validation->set_rules('password', 'Password', 'required|trim', array(
      'required' => "Kolom Password harus diisi!"
    ));

    if ($this->form_validation->run() == false) {
      $data['title'] = "Halaman Login";
      $this->load->view('templates/header', $data);
      $this->load->view('auth/login');
      $this->load->view('templates/footer');
    } else {
      $email = $this->input->post('email');
      $password = $this->input->post('password');
      $user = $this->Model_admin->getData($email);
      if ($user) {
        if (password_verify($password, $user['password'])) {
          $data = [
            'email' => $email,
            'id_role' => $user['id_role'],
          ];
          $this->session->set_userdata($data);
          if ($user['id_role'] == 1) {
            redirect('admin');
          } else {
            redirect('user');
          }
        } else {
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
         Password yang anda masukkan salah!
         </div>');
          redirect('auth');
        }
      } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                                      Email yang anda masukkan belum terdaftar!
                                    </div>');
        redirect('auth');
      }
    }
  }
  public function registration()
  {
    $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', array(
      'required' => "Kolom Nama Lengkap harus terisi!"
    ));
    $this->form_validation->set_rules(
      'nik',
      'NIK',
      'required|trim|max_length[16]|numeric',
      array(
        'required' => 'Kolom NIK wajib diisi.',
        'numeric' => "Kolom NIK harus berisi angka saja.",
        'max_length' => "Panjang angka maksimal 16."
      )
    );
    $this->form_validation->set_rules('jabatan', 'Jabatan', 'required|trim', array(
      'required' => "Kolom jabatan harus diisi!",
    ));
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[data_pegawai.email]', array(
      'required' => "Kolom Email harus di isi!",
      'is_unique' => "Email yang anda masukkan sudah pernah terdaftar!"
    ));
    $this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'required', array(
      'required' => "Kolom tanggal harus diisi!"
    ));
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]|min_length[3]', array(
      'required' => "Kolom password harus diisi!",
      'matches' => "Password tidak sama!",
      'min_length' => "Password terlalu pendek!"
    ));
    $this->form_validation->set_rules('password2', 'Konfirmasi', 'required|trim|matches[password1]|min_length[3]', array(
      'required' => "Kolom password harus diisi!",
      'matches' => "Password tidak sama!",
      'min_length' => "Password terlalu pendek!"
    ));
    $data['jabatan'] = $this->Model_admin->dataJabatanAll();
    if ($this->form_validation->run() == false) {
      $data['title'] = "Halaman Registrasi";
      $this->load->view('templates/header', $data);
      $this->load->view('auth/registrasi', $data);
      $this->load->view('templates/footer');
    } else {
      $jenisK = $this->input->post('jk');
      $data = [
        'nama_pegawai' => htmlspecialchars($this->input->post('nama'), true),
        'nik' => $this->input->post('nik'),
        'jk' => $jenisK,
        'email' => htmlspecialchars($this->input->post('email'), true),
        'jabatan' => htmlspecialchars($this->input->post('jabatan'), true),
        'tgl_masuk' => $this->input->post('tgl_masuk'),
        'status' => $this->input->post('status'),
        'images' => ($jenisK == "Laki-Laki" ? "default.jpg" : "default2.jpg"),
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'id_role' => 2,
      ];
      $this->Register_model->insertRegister($data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                                      Akun anda berhasil dibuat. Silahkan Login!
                                    </div>');
      redirect('auth');
    }
  }
  public function forgotPassword()
  {
    $data['title'] = "Lupa Password";
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', array(
      'required' => "Kolom Email harus terisi!",
      'valid_email' => "Masukkan Email yang valid",
    ));
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]|matches[password2]', array(
      'required' => "Kolom Password Baru harus terisi!",
      'min_length' => "Kolom Password Baru Panjang Karakter 3!",
      'matches' => "Kolom Password tidak sama dengan Konfirmasi Password!"
    ));
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password]', array(
      'required' => "Kolom Konfirmasi Password harus terisi!",
      'min_length' => "Kolom Konfirmasi Password Panjang Karakter 3!",
      'matches' => "Kolom Konfirmasi Password tidak sama dengan Password Baru!"
    ));
    if ($this->form_validation->run() ==  false) {
      $this->load->view('templates/header', $data);
      $this->load->view('auth/forgotPassword');
      $this->load->view('templates/footer');
    } else {
      $email = $this->input->post('email');
      $query = $this->db->query("SELECT * FROM data_pegawai WHERE data_pegawai.email='$email'")->row_array();
      if (!$query) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Anda gagal Membuat Password baru!
      </div>');
        redirect('auth/forgotPassword');
      } else {
        $passwordHash = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $this->db->set('password', $passwordHash);
        $this->db->where('email', $email);
        $this->db->update('data_pegawai');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
          Anda Telah Berhasil Membuat Password Baru!
        </div>');
        redirect('auth');
      }
    }
  }
}
