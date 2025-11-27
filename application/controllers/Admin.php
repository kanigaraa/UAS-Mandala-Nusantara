<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('session');
        $this->load->helper('form');
    }

    public function index() {
        $this->load->view('admin');
    }

    public function authenticate() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $admin = $this->Admin_model->check_login($email, $password);

        if ($admin) {
            $this->session->set_userdata([
                'id'   => $admin->id,
                'logged_in'  => true,
                'admin_logged_in' => true  // Add this to identify admin
            ]);

            redirect('landing_admin');  
        } else {
            $this->session->set_flashdata('error', 'Email atau password salah.');
            redirect('admin');
        }
    }

    // --- KERAJAAN ---
    // --- FITUR TAMBAH KERAJAAN ---
    public function tambah_kerajaan() {
        if (!$this->session->userdata('logged_in')) redirect('admin');
        
        $this->load->view('admin/kerajaan_tambah');

    }

    public function simpan_kerajaan() {
        if (!$this->session->userdata('logged_in')) redirect('admin');
        $config['upload_path']      = './assets/kerajaan/'; 
        $config['allowed_types']    = 'png|jpg|jpeg';      
        $config['max_size']         = 5048;               
        $config['encrypt_name']     = TRUE;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('icon')) {
            // JIKA UPLOAD GAGAL
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('admin/tambah_kerajaan');
        } else{
            // JIKA UPLOAD BERHASIL
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
            $data = [
                'nama'          => $this->input->post('nama'),
                'lokasi'        => $this->input->post('lokasi'),
                'icon'          => $file_name,
                'kategori'      => $this->input->post('kategori'),
                'deskripsi'     => $this->input->post('deskripsi')
            ];
            $this->load->model('Kerajaan_model');
            $this->Kerajaan_model->insert($data);

            $this->session->set_flashdata('success', 'Data Kerajaan berhasil ditambahkan!');
            redirect('dashboard');
        }
    }

    // --- FITUR EDIT KERAJAAN ---
    public function edit_kerajaan($id) {
        if (!$this->session->userdata('logged_in')) redirect('admin');

        $this->load->model('Kerajaan_model');
        $data['kerajaan'] = $this->Kerajaan_model->getById($id);

        // Cek jika data ditemukan
        if (!$data['kerajaan']) redirect('dashboard');

        $this->load->view('admin/kerajaan_edit', $data);
    }

    public function update_kerajaan() {
        if (!$this->session->userdata('logged_in')) redirect('admin');

        $id = $this->input->post('id');

        // gambar diproses terpisah
        $data = [
            'nama'      => $this->input->post('nama'),
            'lokasi'    => $this->input->post('lokasi'),
            'kategori'  => $this->input->post('kategori'), 
            'deskripsi' => $this->input->post('deskripsi')
        ];

        // Cek apakah user upload gambar baru
        if (!empty($_FILES['icon']['name'])) {
            $config['upload_path']   = './assets/kerajaan/';
            $config['allowed_types'] = 'png|jpg|jpeg';
            $config['max_size']      = 5048;
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('icon')) {
                // Upload Sukses -> Update nama gambar di database
                $upload_data = $this->upload->data();
                $data['icon'] = $upload_data['file_name'];
            } else {
                // Upload Gagal -> Tampilkan error dan kembalikan ke form edit
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/edit_kerajaan/' . $id);
            }
        }
        // Jika tidak upload gambar, field 'icon' tidak diubah (tetap gambar lama)

        $this->load->model('Kerajaan_model');
        $this->Kerajaan_model->update($id, $data);

        $this->session->set_flashdata('success', 'Data Kerajaan berhasil diperbarui!');
        redirect('dashboard');
    }

    // --- FITUR HAPUS KERAJAAN ---
    public function hapus_kerajaan($id = null) {
        // Cek Login & ID
        if (!$this->session->userdata('logged_in')) redirect('admin');
        if ($id == null) redirect('dashboard');

        $this->load->model('Kerajaan_model');
        
        // Ambil data dulu untuk tahu nama file gambarnya
        $kerajaan = $this->Kerajaan_model->getById($id);

        // Hapus file gambar dari folder assets (jika ada)
        if ($kerajaan && !empty($kerajaan['icon'])) {
            $path = './assets/kerajaan/' . $kerajaan['icon'];
            // Cek apakah file benar-benar ada di folder
            if (file_exists($path)) {
                unlink($path); // Hapus file gambar
            }
        }

        // Hapus data dari database
        $this->Kerajaan_model->delete($id);

        $this->session->set_flashdata('success', 'Data Kerajaan berhasil dihapus!');
        redirect('dashboard');
    }

    // ==========================================

    // --- BAGIAN REKOMENDASI ---
    // --- FITUR TAMBAH REKOMENDASI ---
    public function tambah_rekomendasi() {
        if (!$this->session->userdata('logged_in')) redirect('admin');
        
        $this->load->view('admin/rekomendasi_tambah');

    }

    public function simpan_rekomendasi() {
        if (!$this->session->userdata('logged_in')) redirect('admin');
        $config['upload_path']      = './assets/rekomendasi/'; 
        $config['allowed_types']    = 'png|jpg|jpeg';      
        $config['max_size']         = 5048;               
        $config['encrypt_name']     = TRUE;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('gambar')) {
            // JIKA UPLOAD GAGAL
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('admin/tambah_rekomendasi');
        } else{
            // JIKA UPLOAD BERHASIL
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
            $data = [
                'nama'          => $this->input->post('nama'),
                'kategori'      => $this->input->post('kategori'),
                'lokasi'        => $this->input->post('lokasi'),
                'gambar'        => $file_name,
                'deskripsi'     => $this->input->post('deskripsi')
            ];
            $this->load->model('Rekomendasi_model');
            $this->Rekomendasi_model->insert($data);

            $this->session->set_flashdata('success', 'Data Rekomendasi Kerajaan berhasil ditambahkan!');
            redirect('dashboard');
        }
    }

    // --- FITUR EDIT REKOMENDASI ---
    public function edit_rekomendasi($id) {
        if (!$this->session->userdata('logged_in')) redirect('admin');

        $this->load->model('Rekomendasi_model');
        $data['rekomendasi'] = $this->Rekomendasi_model->getById($id);

        // Cek jika data ditemukan
        if (!$data['rekomendasi']) redirect('dashboard');

        $this->load->view('admin/rekomendasi_edit', $data);
    }

    public function update_rekomendasi() {
        if (!$this->session->userdata('logged_in')) redirect('admin');

        $id = $this->input->post('id');

        // gambar diproses terpisah
        $data = [
            'nama'          => $this->input->post('nama'),
            'kategori'      => $this->input->post('kategori'),
            'lokasi'        => $this->input->post('lokasi'),
            'deskripsi'     => $this->input->post('deskripsi')
        ];

        // Cek apakah user upload gambar baru
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path']   = './assets/rekomendasi/';
            $config['allowed_types'] = 'png|jpg|jpeg';
            $config['max_size']      = 5048;
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                // Upload Sukses -> Update nama gambar di database
                $upload_data = $this->upload->data();
                $data['gambar'] = $upload_data['file_name'];
            } else {
                // Upload Gagal -> Tampilkan error dan kembalikan ke form edit
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/edit_rekomendasi/' . $id);
            }
        }
        // Jika tidak upload gambar, field 'gambar' tidak diubah (tetap gambar lama)

        $this->load->model('Rekomendasi_model');
        $this->Rekomendasi_model->update($id, $data);

        $this->session->set_flashdata('success', 'Data Rekomendasi Kerajaan berhasil diperbarui!');
        redirect('dashboard');
    }

    // --- FITUR HAPUS REKOMENDASI ---
    public function hapus_rekomendasi($id = null) {
        if (!$this->session->userdata('logged_in')) redirect('admin');
        if ($id == null) redirect('dashboard');

        $this->load->model('Rekomendasi_model');

        $rekomendasi = $this->Rekomendasi_model->getById($id);

        // Hapus file gambar dari folder assets (jika ada)
        if ($rekomendasi && !empty($rekomendasi->gambar)) {
            $path = './assets/rekomendasi/' . $rekomendasi->gambar;
            
            // Cek apakah file benar-benar ada di folder sebelum dihapus
            if (file_exists($path)) {
                unlink($path);
            }
        }

        $this->Rekomendasi_model->delete($id);

        $this->session->set_flashdata('success', 'Data Rekomendasi berhasil dihapus!');
        redirect('dashboard');
    }


    // === FITUR KELOLA DETAIL ===
    public function kelola_detail($kingdom_id = null) {
        if (!$this->session->userdata('logged_in')) redirect('admin');
        
        $this->load->model('DetailKelola_model');

        $data['k'] = $this->DetailKelola_model->getKingdomById($kingdom_id);
        
        // Ambil semua data anak-anaknya
        $data['timelines'] = $this->DetailKelola_model->getTimeline($kingdom_id);
        $data['warisan']   = $this->DetailKelola_model->getWarisan($kingdom_id);
        $data['events']    = $this->DetailKelola_model->getEvents($kingdom_id);
        
        // Cek status: Apakah ini rekomendasi?
        $data['is_rekomendasi'] = $this->DetailKelola_model->isRekomendasi($kingdom_id);
        
        $data['kingdom_id'] = $kingdom_id;

        $this->load->view('admin/kelola_detail', $data);
    }

    // --- A. UPDATE DATA UTAMA ---
    public function update_info_utama() {
        $id = $this->input->post('id');
        $data = [
            'nama'      => $this->input->post('nama'),
            'subjudul'  => $this->input->post('subjudul'),
            'deskripsi' => $this->input->post('deskripsi'),
        ];

        // Upload Gambar Utama (Hero Image)
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path']   = './assets/kerajaan/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $data['gambar'] = $this->upload->data('file_name');
            }
        }

        $this->load->model('DetailKelola_model');
        $this->DetailKelola_model->updateKingdom($id, $data);
        $this->session->set_flashdata('success', 'Info Utama berhasil diupdate!');
        redirect('admin/kelola_detail/' . $id);
    }

    // --- B. KELOLA TIMELINE ---
    public function tambah_timeline() {
        $kingdom_id = $this->input->post('kingdom_id');
        $data = [
            'kingdom_id' => $kingdom_id,
            'tahun'      => $this->input->post('tahun'),
            'isi'        => $this->input->post('isi')
        ];
        $this->load->model('DetailKelola_model');
        $this->DetailKelola_model->insertTimeline($data);
        redirect('admin/kelola_detail/' . $kingdom_id);
    }

    public function hapus_timeline($id, $kingdom_id) {
        $this->load->model('DetailKelola_model');
        $this->DetailKelola_model->deleteTimeline($id);
        redirect('admin/kelola_detail/' . $kingdom_id);
    }

    // --- C. KELOLA WARISAN ---
    public function tambah_warisan() {
        $kingdom_id = $this->input->post('kingdom_id');
        
        // Upload Ikon Warisan
        $config['upload_path']   = './assets/warisan/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name']  = TRUE; 
        $this->load->library('upload', $config);

        $ikon = '';
        if ($this->upload->do_upload('ikon')) {
            $ikon = $this->upload->data('file_name');
        }

        $data = [
            'kingdom_id' => $kingdom_id,
            'nama'       => $this->input->post('nama'),
            'ikon'       => $ikon
        ];

        $this->load->model('DetailKelola_model');
        $this->DetailKelola_model->insertWarisan($data);
        $this->session->set_flashdata('success', 'Warisan berhasil ditambahkan!');
        redirect('admin/kelola_detail/' . $kingdom_id);
    }

    // --- D. KELOLA EVENTS/PERISTIWA ---
    public function tambah_event() {
        $kingdom_id = $this->input->post('kingdom_id');
        
        // Config Upload untuk 2 Gambar (Kiri & Kanan)
        $config['upload_path']   = './assets/peristiwa/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name']  = TRUE;
        $this->load->library('upload', $config);

        $gambar_kiri = '';
        $gambar_kanan = '';

        // Upload Gambar Kiri
        if (!empty($_FILES['gambar_kiri']['name'])) {
            if ($this->upload->do_upload('gambar_kiri')) {
                $gambar_kiri = $this->upload->data('file_name');
            }
        }
        // Upload Gambar Kanan (Reset config)
        if (!empty($_FILES['gambar_kanan']['name'])) {
            $this->upload->initialize($config); 
            if ($this->upload->do_upload('gambar_kanan')) {
                $gambar_kanan = $this->upload->data('file_name');
            }
        }

        $data = [
            'kingdom_id'   => $kingdom_id,
            'judul'        => $this->input->post('judul'),
            'isi_kiri'     => $this->input->post('isi_kiri'),
            'isi_kanan'    => $this->input->post('isi_kanan'),
            'gambar_kiri'  => $gambar_kiri,
            'gambar_kanan' => $gambar_kanan
        ];

        $this->load->model('DetailKelola_model');
        $this->DetailKelola_model->insertEvent($data);
        $this->session->set_flashdata('success', 'Detail Peristiwa berhasil ditambahkan!');
        redirect('admin/kelola_detail/' . $kingdom_id);
    }


    // FITUR EDIT TIMELINE
    public function edit_timeline($id) {
        if (!$this->session->userdata('logged_in')) redirect('admin');
        $this->load->model('DetailKelola_model');
        
        $data['t'] = $this->DetailKelola_model->getTimelineById($id);
        if(!$data['t']) redirect('dashboard');

        $this->load->view('admin/edit_timeline', $data);
    }

    public function update_timeline() {
        $id = $this->input->post('id');
        $kingdom_id = $this->input->post('kingdom_id');

        $data = [
            'tahun' => $this->input->post('tahun'),
            'isi'   => $this->input->post('isi')
        ];

        $this->load->model('DetailKelola_model');
        $this->DetailKelola_model->updateTimeline($id, $data);
        
        $this->session->set_flashdata('success', 'Timeline berhasil diperbarui!');
        redirect('admin/kelola_detail/' . $kingdom_id);
    }

    // FITUR EDIT WARISAN
    public function edit_warisan($id) {
        if (!$this->session->userdata('logged_in')) redirect('admin');
        $this->load->model('DetailKelola_model');
        
        $data['w'] = $this->DetailKelola_model->getWarisanById($id);
        $this->load->view('admin/edit_warisan', $data);
    }

    public function update_warisan() {
        $id = $this->input->post('id');
        $kingdom_id = $this->input->post('kingdom_id');

        $data = [
            'nama' => $this->input->post('nama')
        ];

        // Cek Upload Ikon Baru
        if (!empty($_FILES['ikon']['name'])) {
            $config['upload_path']   = './assets/warisan/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['encrypt_name']  = TRUE;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('ikon')) {
                $data['ikon'] = $this->upload->data('file_name');
            }
        }

        $this->load->model('DetailKelola_model');
        $this->DetailKelola_model->updateWarisan($id, $data);
        redirect('admin/kelola_detail/' . $kingdom_id);
    }

    // FITUR EDIT EVENT / PERISTIWA
    public function edit_event($id) {
        if (!$this->session->userdata('logged_in')) redirect('admin');
        $this->load->model('DetailKelola_model');
        
        $data['e'] = $this->DetailKelola_model->getEventById($id);
        $this->load->view('admin/edit_event', $data);
    }

    public function update_event() {
        $id = $this->input->post('id');
        $kingdom_id = $this->input->post('kingdom_id');

        $data = [
            'judul'     => $this->input->post('judul'),
            'isi_kiri'  => $this->input->post('isi_kiri'),
            'isi_kanan' => $this->input->post('isi_kanan')
        ];

        // Config Upload
        $config['upload_path']   = './assets/peristiwa/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['encrypt_name']  = TRUE;
        $this->load->library('upload', $config);

        // Cek Gambar Kiri
        if (!empty($_FILES['gambar_kiri']['name'])) {
            if ($this->upload->do_upload('gambar_kiri')) {
                $data['gambar_kiri'] = $this->upload->data('file_name');
            }
        }
        // Cek Gambar Kanan
        if (!empty($_FILES['gambar_kanan']['name'])) {
            $this->upload->initialize($config);
            if ($this->upload->do_upload('gambar_kanan')) {
                $data['gambar_kanan'] = $this->upload->data('file_name');
            }
        }

        $this->load->model('DetailKelola_model');
        $this->DetailKelola_model->updateEvent($id, $data);
        redirect('admin/kelola_detail/' . $kingdom_id);
    }
}