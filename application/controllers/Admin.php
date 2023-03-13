<?php
class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if ($this->session->userdata('email') == "") {
      redirect('auth');
    }
    if ($this->session->userdata('id_role') != 1) {
      redirect('user/blocked');
    }
  }
  public function index()
  {
    $data['title'] = "Halaman Dashboard";
    $email = $this->session->userdata('email');
    $data['user'] =  $this->Model_admin->getData($email);
    $data['total'] = $this->Model_admin->AllData();
    $data['adminTotal'] = $this->Model_admin->DataAdmin();
    $data['jabatanTotal'] = $this->Model_admin->DataJabatan();
    $data['kehadiranTotal'] = $this->Model_admin->DataKehadiran();
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/templates/top_bar', $data);
    $this->load->view('admin/index');
    $this->load->view('admin/templates/footer');
  }
  public function dataJabatan()
  {
    $email = $this->session->userdata('email');
    $data['user'] =  $this->Model_admin->getData($email);
    $data['jabatan'] = $this->Model_admin->dataJabatanAll();
    $data['title'] = "Halaman Data Jabatan";
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/templates/top_bar', $data);
    $this->load->view('admin/jabatan', $data);
    $this->load->view('admin/templates/footer');
  }
  public function TambahData()
  {
    $this->form_validation->set_rules('namaJabatan', 'Nama Jabatan', 'required', array(
      'required' => "Kolom Nama Jabatan harus diisi!"
    ));
    $this->form_validation->set_rules('gajiPokok', 'Gaji Pokok', 'required|numeric', array(
      'required' => "Kolom Gaji Pokok harus diisi!",
      'numeric' => "Kolom Gaji Pokok harus diisi angka"

    ));
    $this->form_validation->set_rules('tunjangan', 'Tunjangan', 'required|numeric', array(
      'required' => "Kolom Tunjangan harus diisi!",
      'numeric' => "Kolom Tunjangan harus diisi angka!"
    ));
    $this->form_validation->set_rules('uangMakan', 'Uang Makan', 'required|numeric', array(
      'required' => "Kolom Uang Makan harus diisi!",
      'numeric' => "Kolom Uang Makan harus diisi angka"
    ));
    if ($this->form_validation->run() == false) {
      $email = $this->session->userdata('email');
      $data['user'] =  $this->Model_admin->getData($email);
      $data['title'] = "Halaman Tambah Jabatan";
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/top_bar', $data);
      $this->load->view('admin/tambahJabatan');
      $this->load->view('admin/templates/footer');
    } else {
      $data = [
        'nama_jabatan' => htmlspecialchars($this->input->post('namaJabatan'), true),
        'gaji_pokok' => htmlspecialchars($this->input->post('gajiPokok'), true),
        'tunjangan' => htmlspecialchars($this->input->post('tunjangan'), true),
        'uang_makan' => htmlspecialchars($this->input->post('uangMakan'), true),
      ];
      $this->Model_admin->insertDataJabatan($data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Anda berhasil Menambahkan Data!
      </div>');
      redirect('admin/dataJabatan');
    }
  }
  public function editJabatan($id = '')
  {
    $this->form_validation->set_rules('namaJabatan', 'Nama Jabatan', 'required', array(
      'required' => "Kolom Nama Jabatan harus diisi!"
    ));
    $this->form_validation->set_rules('gajiPokok', 'Gaji Pokok', 'required|numeric', array(
      'required' => "Kolom Gaji Pokok harus diisi!",
      'numeric' => "Kolom Gaji Pokok harus diisi angka"

    ));
    $this->form_validation->set_rules('tunjangan', 'Tunjangan', 'required|numeric', array(
      'required' => "Kolom Tunjangan harus diisi!",
      'numeric' => "Kolom Tunjangan harus diisi angka!"
    ));
    $this->form_validation->set_rules('uangMakan', 'Uang Makan', 'required|numeric', array(
      'required' => "Kolom Uang Makan harus diisi!",
      'numeric' => "Kolom Uang Makan harus diisi angka"
    ));
    if ($this->form_validation->run() == false) {
      $email = $this->session->userdata('email');
      $data['user'] =  $this->Model_admin->getData($email);
      $data['title'] = "Halaman Edit Jabatan";
      $data['userEdit'] = $this->Model_admin->getDataById($id);
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/top_bar', $data);
      $this->load->view('admin/editJabatan', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $data = [
        'id_jabatan' => $this->input->post('id_jabatan'),
        'nama_jabatan' => htmlspecialchars($this->input->post('namaJabatan'), true),
        'gaji_pokok' => htmlspecialchars($this->input->post('gajiPokok'), true),
        'tunjangan' => htmlspecialchars($this->input->post('tunjangan'), true),
        'uang_makan' => htmlspecialchars($this->input->post('uangMakan'), true),
      ];
      $this->Model_admin->updateDataJabatan($data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Anda berhasil Mengedit Data!
      </div>');
      redirect('admin/dataJabatan');
    }
  }
  public function hapusJabatan($id)
  {
    $this->Model_admin->deleteDataJabatan($id);
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    Anda berhasil Menghapus Data!
    </div>');
    redirect('admin/dataJabatan');
  }
  public function dataPegawai()
  {
    $email = $this->session->userdata('email');
    $data['user'] =  $this->Model_admin->getData($email);
    $data['userJabatan'] = $this->Model_admin->JoinData();
    $data['title'] = "Halaman Data Pegawai";
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/templates/top_bar', $data);
    $this->load->view('admin/pegawai', $data);
    $this->load->view('admin/templates/footer');
  }
  public function tambahPegawai()
  {
    $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required', array(
      'required' => 'Kolom Nama Pegawai harus diisi!',
    ));
    $this->form_validation->set_rules('nik', 'NIK', 'required|min_length[10]', array(
      'required' => 'Kolom NIK harus diisi!',
      'min_length' => "Kolom NIK harus diisi angka minimal 10",
    ));
    $this->form_validation->set_rules('jabatan', 'Jabatan', 'required', array(
      'required' => 'Kolom NIK harus diisi!',
    ));
    $this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'required', array(
      'required' => 'Kolom Tanggal & Tahun harus diisi!',
    ));
    $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[data_pegawai.email]|valid_email', array(
      'required' => 'Kolom Email harus diisi!',
      'is_unique' => 'Email yang anda masukkan sudah pernah terdaftar!'
    ));
    $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', array(
      'required' => 'Kolom Password harus diisi!',
      'min_length' => 'Kolom password panjang minimal 3'
    ));

    if ($this->form_validation->run() == false) {
      $email = $this->session->userdata('email');
      $data['user'] =  $this->Model_admin->getData($email);
      $data['title'] = "Halaman Tambah Pegawai";
      $data['jabatan'] = $this->db->get('data_jabatan')->result_array();
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/top_bar', $data);
      $this->load->view('admin/TambahPegawai', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $jenisK = $this->input->post('jk');
      $data = [
        'nik' => htmlspecialchars($this->input->post('nik'), true),
        'nama_pegawai' => htmlspecialchars($this->input->post('nama_pegawai'), true),
        'jk' => $jenisK,
        'jabatan' => $this->input->post('jabatan'),
        'tgl_masuk' => $this->input->post('tgl_masuk'),
        'status' => $this->input->post('status'),
        'images' => ($jenisK == "Laki-Laki" ? "default.jpg" : "default2.jpg"),
        'email' => htmlspecialchars($this->input->post('email')),
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'id_role' => 2,
      ];
      $this->Model_admin->insertDataPegawai($data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Anda berhasil Menambahkan Data Pegawai!
      </div>');
      redirect('admin/dataPegawai');
    }
  }
  public function editPegawai($id = '')
  {
    $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'trim|required', array(
      'required' => "Kolom Nama Pegawai harus diisi!",
    ));
    $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|min_length[14]', array(
      'required' => "Kolom NIK harus diisi!",
      'numeric' => "Kolom NIK harus diisi angka!",
      'min_length' => "Kolom NIK panjang minimal 14 Angka!"
    ));

    $this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required', array(
      'required' => "Kolom Jenis Kelamin harus diisi!"
    ));
    $this->form_validation->set_rules('jabatan', 'Jabatan', 'required', array(
      'required' => "Kolom Jabatan harus diisi!"
    ));
    $this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'required', array(
      'required' => "Kolom Tanggal Masuk harus diisi!"
    ));
    $this->form_validation->set_rules('status', 'Status', 'required', array(
      'required' => 'Kolom Status harus diisi!'
    ));
    $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[data_pegawai.nama_pegawai]', array(
      'required' => "Kolom Email harus diisi!",
      'valid_email' => "Kolom Email harus valid",
      'is_unique' => "Kolom Email yang anda masukkan telah terdaftar!"
    ));
    if ($this->form_validation->run() == false) {
      $email = $this->session->userdata('email');
      $data['user'] =  $this->Model_admin->getData($email);
      $data['title'] = "Halaman Edit Pegawai";
      $data['jabatan'] = $this->db->get('data_jabatan')->result_array();
      $data['userById'] =  $this->Model_admin->joinDataPegawai($id);
      $data['jenisKelamin'] = ['Laki-Laki', 'Perempuan'];
      $data['jabatan'] = $this->db->get('data_jabatan')->result_array();
      $data['statusKaryawan'] = ['Karyawan Tetap', 'Karyawan Tidak Tetap', 'Fresh Graduate'];
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/top_bar', $data);
      $this->load->view('admin/editPegawai', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $uploadImages = $_FILES['images']['name'];
      $newFile = null;
      $data['userById'] =  $this->Model_admin->joinDataPegawai($id);
      if (!empty($uploadImages)) {
        $config['upload_path'] = './assets/images/profile';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']     = 2048;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('images')) {
          $gambarLama = $data['userById']['images'];
          if ($gambarLama !== 'default.jpg' || $gambarLama !== 'default2.jpg') {
            unlink(FCPATH . "./assets/images/profile" . $gambarLama);
          }
          $newFile = $this->upload->data('file_name');
          $data = [
            'id_pegawai' => $this->input->post('id_pegawai'),
            'nama_pegawai' => htmlspecialchars($this->input->post('nama_pegawai'), true),
            'nik' => htmlspecialchars($this->input->post('nik'), true),
            'jk' => $this->input->post('jk'),
            'jabatan' => $this->input->post('jabatan'),
            'tgl_masuk' => $this->input->post('tgl_masuk'),
            'status' => $this->input->post('status'),
            'images' => $newFile,
            'email' => $this->input->post('email'),
          ];
          $this->Model_admin->updateDataPegawai($data);
          $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
          Anda Telah berhasil Mengedit Data!
          </div>');
          redirect('admin/dataPegawai');
        } else {
          echo  $this->upload->display_errors();
        }
      } else {
        $data = [
          'id_pegawai' => $this->input->post('id_pegawai'),
          'nama_pegawai' => htmlspecialchars($this->input->post('nama_pegawai'), true),
          'nik' => htmlspecialchars($this->input->post('nik'), true),
          'jk' => $this->input->post('jk'),
          'jabatan' => $this->input->post('jabatan'),
          'tgl_masuk' => $this->input->post('tgl_masuk'),
          'status' => $this->input->post('status'),
          'email' => $this->input->post('email'),
        ];
        $this->Model_admin->updateDataPegawai($data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Anda Telah berhasil Mengedit Data!
        </div>');
        redirect('admin/dataPegawai');
      }
    }
  }
  public function hapusPegawai($id)
  {
    $this->db->where('id_pegawai', $id);
    $this->db->delete('data_pegawai');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    Anda Telah berhasil Menghapus Data!
    </div>');
    redirect('admin/dataPegawai');
  }
  public function dataAbsensi()
  {
    $email = $this->session->userdata('email');
    $data['user'] =  $this->Model_admin->getData($email);
    $data['title'] = "Halaman Data Absensi";
    if ((isset($_GET['bulan']) && $_GET['bulan'] !== "") && (isset($_GET['tahun']) && $_GET['tahun'] !== "")) {
      $bulan = $_GET['bulan'];
      $tahun = $_GET['tahun'];
    } else {
      $bulan = date('m');
      $tahun = date('Y');
    }
    $data['absensi'] = $this->db->query("SELECT  data_kehadiran.*, data_pegawai.nama_pegawai, data_pegawai.jabatan,data_pegawai.nik,data_pegawai.jk,data_jabatan.nama_jabatan
    FROM data_kehadiran
    INNER JOIN data_pegawai ON data_kehadiran.nik = data_pegawai.nik
    INNER JOIN data_jabatan ON data_kehadiran.jabatan = data_jabatan.id_jabatan
    WHERE data_kehadiran.bulan = $bulan && data_kehadiran.tahun = $tahun
    ORDER BY data_pegawai.nama_pegawai ASC
    ")->result_array();
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/templates/top_bar', $data);
    $this->load->view('admin/absensi/dataAbsensi', $data);
    $this->load->view('admin/templates/footer');
  }
  public function inputKehadiran()
  {
    if (isset($_POST['submit'])) {
      $post = $this->input->post();
      foreach ($post['bulan'] as $key => $value) {
        if ($post['bulan'][$key] != "" || $post['nik'][$key] != "") {
          $simpan[] = array(
            'bulan' => $post['bulan'][$key],
            'tahun' => $post['tahun'][$key],
            'nik' => $post['nik'][$key],
            'nama_pegawai' => $post['nama_pegawai'][$key],
            'jk' => $post['jk'][$key],
            'jabatan' => $post['jabatan'][$key],
            'jml_hadir' => $post['jml_hadir'][$key],
            'sakit' => $post['sakit'][$key],
            'alfa' => $post['alfa'][$key]
          );
        }
      }
      $this->Model_admin->insertDataKehadiran($simpan);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Anda Telah berhasil Menginput Kehadiran!
      </div>');
      redirect('admin/dataAbsensi');
    }
    $email = $this->session->userdata('email');
    $data['user'] =  $this->Model_admin->getData($email);
    $data['title'] = "Halaman Input Absensi";
    if ((isset($_GET['bulan']) && $_GET['bulan'] !== "") && (isset($_GET['tahun']) && $_GET['tahun'] !== "")) {
      $bulan = $_GET['bulan'];
      $tahun = $_GET['tahun'];
    } else {
      $bulan = date('m');
      $tahun = date('Y');
    }
    $data['absensi'] = $this->db->query("SELECT data_pegawai.*, data_jabatan.nama_jabatan FROM data_pegawai
    INNER JOIN data_jabatan ON data_pegawai.jabatan = data_jabatan.id_jabatan 
    WHERE NOT EXISTS (SELECT * FROM data_kehadiran WHERE bulan=$bulan && tahun=$tahun && data_pegawai.nik = data_kehadiran.nik)
     ORDER BY data_pegawai.nama_pegawai ASC
    ")->result_array();
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/templates/top_bar', $data);
    $this->load->view('admin/absensi/inputAbsensi', $data);
    $this->load->view('admin/templates/footer');
  }
  public function potonganGaji()
  {
    $email = $this->session->userdata('email');
    $data['user'] =  $this->Model_admin->getData($email);
    $data['title'] = "Halaman Potongan Gaji";
    $data['potongan'] = $this->db->get('potongan_gaji')->result_array();
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/templates/top_bar', $data);
    $this->load->view('admin/absensi/potonganGaji', $data);
    $this->load->view('admin/templates/footer');
  }
  public function tambahPotongan()
  {
    $this->form_validation->set_rules('potongan', 'Jenis Potongan', 'required', array(
      'required' => "Form Jenis Potongan Harus Terisi!"
    ));
    $this->form_validation->set_rules('jml_potongan', 'Jumlah Potongan', 'required|numeric|min_length[3]', array(
      'required' => "Form Jumlah Potongan Harus Terisi!",
      'numeric' => "Form Jumlah Potongan Harus angka!",
      'min_length' => "Form Jumlah Potongan Harus Lebih dari 3 angka!"
    ));
    if ($this->form_validation->run() == false) {
      $email = $this->session->userdata('email');
      $data['user'] =  $this->Model_admin->getData($email);
      $data['title'] = "Halaman Tambah Potongan Gaji";
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/top_bar', $data);
      $this->load->view('admin/absensi/tambahPotonganGaji', $data);
      $this->load->view('admin/templates/footer');
    } else {

      $data = array(
        'potongan' => $this->input->post('potongan'),
        'jml_potongan' => $this->input->post('jml_potongan')
      );
      $this->db->insert('potongan_gaji', $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Anda Telah berhasil Menambahkan Data!
      </div>');
      redirect('admin/potonganGaji');
    }
  }
  public function updatePotongan($id)
  {
    $this->form_validation->set_rules('potongan', 'Jenis Potongan', 'required', array(
      'required' => "Form Jenis Potongan Harus Terisi!"
    ));
    $this->form_validation->set_rules('jml_potongan', 'Jumlah Potongan', 'required|numeric|min_length[3]', array(
      'required' => "Form Jumlah Potongan Harus Terisi!",
      'numeric' => "Form Jumlah Potongan Harus angka!",
      'min_length' => "Form Jumlah Potongan Harus Lebih dari 3 angka!"
    ));
    if ($this->form_validation->run() == false) {
      $email = $this->session->userdata('email');
      $data['user'] =  $this->Model_admin->getData($email);
      $data['title'] = "Halaman Edit Potongan Gaji";
      $data['potongan'] = $this->db->get_where('potongan_gaji', ['id_potongan' => $id])->row_array();
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/top_bar', $data);
      $this->load->view('admin/absensi/editPotonganGaji', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $data = [
        'id_potongan' => $this->input->post('id_potongan'),
        'potongan' => $this->input->post('potongan'),
        'jml_potongan' => $this->input->post('jml_potongan')
      ];
      $this->db->where('id_potongan', $data['id_potongan']);
      $this->db->update('potongan_gaji', $data);
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Anda Telah berhasil Mengedit Data!
      </div>');
      redirect('admin/potonganGaji');
    }
  }
  public function hapusPotongan($id)
  {
    $this->db->where('id_potongan', $id);
    $this->db->delete('potongan_gaji');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
    Anda Telah berhasil Menghapus Data!
    </div>');
    redirect('admin/potonganGaji');
  }
  public function dataPenggajian()
  {
    $email = $this->session->userdata('email');
    $data['user'] =  $this->Model_admin->getData($email);
    $data['title'] = "Halaman Data Penggajian";
    if ((isset($_GET['bulan']) && $_GET['bulan'] !== "") && (isset($_GET['tahun']) && $_GET['tahun'] !== "")) {
      $bulan = $_GET['bulan'];
      $tahun = $_GET['tahun'];
    } else {
      $bulan = date('m');
      $tahun = date('Y');
    }
    $data['potongan'] = $this->db->get('potongan_gaji')->result_array();
    $data['gajiPegawai'] = $this->db->query("SELECT data_pegawai.nama_pegawai, data_pegawai.nik, data_pegawai.jk,data_jabatan.nama_jabatan, data_jabatan.gaji_pokok,data_jabatan.tunjangan, data_jabatan.uang_makan, data_kehadiran.alfa FROM data_pegawai
    INNER JOIN data_jabatan ON data_pegawai.jabatan = data_jabatan.id_jabatan
    INNER JOIN data_kehadiran ON data_pegawai.nik = data_kehadiran.nik
    WHERE data_kehadiran.bulan = $bulan && data_kehadiran.tahun = $tahun
    ORDER BY data_pegawai.nama_pegawai ASC
    ")->result_array();
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/templates/top_bar', $data);
    $this->load->view('admin/penggajian/dataPenggajian', $data);
    $this->load->view('admin/templates/footer');
  }
  public function cetakPenggajian($bulan = '', $tahun  = '')
  {
    $data['title'] = "Cetak Data Penggajian";
    $data['potongan'] = $this->db->get('potongan_gaji')->result_array();
    $data['gajiPegawai'] = $this->db->query("SELECT data_pegawai.nama_pegawai, data_pegawai.nik, data_pegawai.jk,data_jabatan.nama_jabatan, data_jabatan.gaji_pokok,data_jabatan.tunjangan, data_jabatan.uang_makan, data_kehadiran.alfa FROM data_pegawai
    INNER JOIN data_jabatan ON data_pegawai.jabatan = data_jabatan.id_jabatan
    INNER JOIN data_kehadiran ON data_pegawai.nik = data_kehadiran.nik
    WHERE data_kehadiran.bulan = $bulan && data_kehadiran.tahun = $tahun
    ORDER BY data_pegawai.nama_pegawai ASC
    ")->result_array();
    $this->load->view('admin/penggajian/cetakPenggajian', $data);
  }
  public function cetakAbsensi($bulan = '', $tahun = '')
  {
    $data = array(
      'title' => "Cetak Data Absensi Pegawai",
      'absensiPegawai' => $this->db->query("SELECT data_kehadiran.*, data_jabatan.nama_jabatan FROM data_kehadiran 
      INNER JOIN data_jabatan ON data_kehadiran.jabatan = data_jabatan.id_jabatan
      WHERE data_kehadiran.bulan = $bulan && data_kehadiran.tahun = $tahun  
      ORDER BY `data_kehadiran`.`nama_pegawai` DESC")->result_array(),
    );
    $this->load->view('admin/absensi/cetakAbsensi', $data);
  }
  public function slipGaji($bulan = '', $tahun = '')
  {
    if ((isset($_GET['bulan']) && $_GET['bulan'] !== "") && (isset($_GET['tahun']) && $_GET['tahun'] !== "")) {
      $bulan = $_GET['bulan'];
      $tahun = $_GET['tahun'];
    } else {
      $bulan = date('m');
      $tahun = date('Y');
    }
    $email = $this->session->userdata('email');
    $data['user'] =  $this->Model_admin->getData($email);
    $data['title'] = "Halaman Cetak Slip Gaji Karyawan";
    $data['potongan'] = $this->db->get('potongan_gaji')->result_array();
    $data['gajiPegawai'] = $this->db->query("SELECT data_pegawai.id_pegawai, data_pegawai.nama_pegawai, data_pegawai.nik, data_pegawai.jk,data_jabatan.nama_jabatan, data_jabatan.gaji_pokok,data_jabatan.tunjangan, data_jabatan.uang_makan, data_kehadiran.alfa FROM data_pegawai
    INNER JOIN data_jabatan ON data_pegawai.jabatan = data_jabatan.id_jabatan
    INNER JOIN data_kehadiran ON data_pegawai.nik = data_kehadiran.nik
    WHERE data_kehadiran.bulan = $bulan && data_kehadiran.tahun = $tahun
    ORDER BY data_pegawai.nama_pegawai ASC
    ")->result_array();
    $this->load->view('admin/templates/header', $data);
    $this->load->view('admin/templates/sidebar');
    $this->load->view('admin/templates/top_bar', $data);
    $this->load->view('admin/penggajian/slipGaji', $data);
    $this->load->view('admin/templates/footer');
  }
  public function cetakSlipGaji($bulan, $tahun, $id)
  {
    $data['title'] = "Halaman Cetak Slip Gaji Karyawan";
    $data['potongan'] = $this->db->get('potongan_gaji')->result_array();
    $data['gajiPegawai'] = $this->db->query("SELECT data_pegawai.id_pegawai, data_pegawai.nama_pegawai, data_pegawai.nik, data_pegawai.jk,data_jabatan.nama_jabatan, data_jabatan.gaji_pokok,data_jabatan.tunjangan, data_jabatan.uang_makan, data_kehadiran.alfa FROM data_pegawai
    INNER JOIN data_jabatan ON data_pegawai.jabatan = data_jabatan.id_jabatan
    INNER JOIN data_kehadiran ON data_pegawai.nik = data_kehadiran.nik
    WHERE data_kehadiran.bulan = $bulan && data_kehadiran.tahun = $tahun && data_pegawai.id_pegawai=$id
    ORDER BY data_pegawai.nama_pegawai ASC
    ")->row_array();
    $data['bulan'] = $bulan;
    $data['tahun'] = $tahun;
    $this->load->view('admin/penggajian/cetakSlipGaji', $data);
  }
  public function ubahPassword()
  {
    $email = $this->session->userdata('email');
    $data['user'] =  $this->Model_admin->getData($email);
    $data['title'] = "Halaman Ubah Password";
    $this->form_validation->set_rules('passwordLama', 'Password', 'required|trim|min_length[3]', array(
      'required' => "Kolom Password Saat ini harus terisi!",
      'min_length' => "Kolom Password Saat ini Minimal panjang karakter 3!"
    ));
    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', array(
      'required' => "Kolom Password Baru harus terisi!",
      'min_length' => "Kolom Password Baru Minimal panjang karakter 3!",
      'matches' => "Kolom Konfirmasi Password Baru tidak sama dengan Konfirmasi Password!"
    ));
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|min_length[3]|matches[password1]', array(
      'required' => "Kolom Konfirmasi Password Saat ini harus terisi!",
      'min_length' => "Kolom Konfirmasi Password Minimal panjang karakter 3!",
      'matches' => "Kolom Konfirmasi Password tidak sama dengan Password Baru!"
    ));
    if ($this->form_validation->run() == false) {
      $this->load->view('admin/templates/header', $data);
      $this->load->view('admin/templates/sidebar');
      $this->load->view('admin/templates/top_bar', $data);
      $this->load->view('admin/ubahPassword', $data);
      $this->load->view('admin/templates/footer');
    } else {
      $passwordSaatIni = $this->input->post('passwordLama');
      $passwordBaru = $this->input->post('password1');
      if (!password_verify($passwordSaatIni, $data['user']['password'])) {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Password yang anda masukkan salah!
        </div>');
        redirect('admin/ubahPassword');
      } else {
        if ($passwordBaru == $passwordSaatIni) {
          $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
        Password yang anda masukkan tidak boleh sama dengan password lama!
        </div>');
          redirect('admin/ubahPassword');
        } else {
          $passwordHash = password_hash($passwordBaru, PASSWORD_DEFAULT);
          $this->db->set('password', $passwordHash);
          $this->db->where('email', $data['user']['email']);
          $this->db->update('data_pegawai');
          $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
          Password anda berhasil di update!
          </div>');
          redirect('admin/ubahPassword');
        }
      }
    }
  }
  public function logout()
  {
    if ($this->session->userdata('email') != NULL) {
      $this->session->unset_userdata('email');
      $this->session->unset_userdata('id_role');
      $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
      Anda berhasil Logout!
      </div>');
      redirect('auth');
    }
  }
}
