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
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('admin/tambah_kerajaan');
        } else{
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
            
            // Get manual ID if provided
            $manual_id = $this->input->post('id');
            $manual_kingdom_id = $this->input->post('kingdom_id');
            
            // If kingdom_id is not provided, create a new kingdoms entry
            if (empty($manual_kingdom_id)) {
                // Create entry in kingdoms table first
                $kingdoms_data = [
                    'nama' => $this->input->post('nama'),
                    'subjudul' => $this->input->post('kategori') . ' - ' . $this->input->post('lokasi'),
                    'gambar' => $file_name,
                    'deskripsi' => $this->input->post('deskripsi')
                ];
                
                // If manual ID is provided, use it for kingdoms table too
                if (!empty($manual_id)) {
                    $kingdoms_data['id'] = $manual_id;
                }
                
                $this->db->insert('kingdoms', $kingdoms_data);
                $kingdom_id = !empty($manual_id) ? $manual_id : $this->db->insert_id();
            } else {
                $kingdom_id = $manual_kingdom_id;
            }
            
            // Now insert into kerajaan table
            $data = [
                'kingdom_id'    => $kingdom_id,
                'nama'          => $this->input->post('nama'),
                'lokasi'        => $this->input->post('lokasi'),
                'icon'          => $file_name,
                'kategori'      => $this->input->post('kategori'),
                'deskripsi'     => $this->input->post('deskripsi')
            ];
            
            // Add ID if provided manually
            if (!empty($manual_id)) {
                $data['id'] = $manual_id;
            }
            
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
        if (!$data['kerajaan']) redirect('dashboard');

        $this->load->view('admin/kerajaan_edit', $data);
    }

    public function update_kerajaan() {
        if (!$this->session->userdata('logged_in')) redirect('admin');

        $id = $this->input->post('id');
        $data = [
            'kingdom_id' => $this->input->post('kingdom_id') ?: null,
            'nama'      => $this->input->post('nama'),
            'lokasi'    => $this->input->post('lokasi'),
            'kategori'  => $this->input->post('kategori'), 
            'deskripsi' => $this->input->post('deskripsi')
        ];
        if (!empty($_FILES['icon']['name'])) {
            $config['upload_path']   = './assets/kerajaan/';
            $config['allowed_types'] = 'png|jpg|jpeg';
            $config['max_size']      = 5048;
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('icon')) {
                $upload_data = $this->upload->data();
                $data['icon'] = $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/edit_kerajaan/' . $id);
            }
        }

        $this->load->model('Kerajaan_model');
        $this->Kerajaan_model->update($id, $data);

        $this->session->set_flashdata('success', 'Data Kerajaan berhasil diperbarui!');
        redirect('dashboard');
    }

    // --- FITUR HAPUS KERAJAAN ---
    public function hapus_kerajaan($id = null) {
        if (!$this->session->userdata('logged_in')) redirect('admin');
        if ($id == null) redirect('dashboard');

        $this->load->model('Kerajaan_model');
        $kerajaan = $this->Kerajaan_model->getById($id);
        if ($kerajaan && !empty($kerajaan['icon'])) {
            $path = './assets/kerajaan/' . $kerajaan['icon'];
            if (file_exists($path)) {
                unlink($path); // Hapus file gambar
            }
        }
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
            $error = $this->upload->display_errors();
            $this->session->set_flashdata('error', $error);
            redirect('admin/tambah_rekomendasi');
        } else{
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];
            
            // Get id_kerajaan from form
            $id_kerajaan = $this->input->post('id_kerajaan');
            $nama = $this->input->post('nama');
            $kategori = $this->input->post('kategori');
            $lokasi = $this->input->post('lokasi');
            $deskripsi = $this->input->post('deskripsi');
            
            // Check if kingdoms entry exists
            $this->db->where('id', $id_kerajaan);
            $kingdom_exists = $this->db->get('kingdoms')->num_rows() > 0;
            
            // If kingdoms entry doesn't exist, create it
            if (!$kingdom_exists) {
                $kingdoms_data = [
                    'id' => $id_kerajaan,
                    'nama' => $nama,
                    'subjudul' => $kategori . ' - ' . $lokasi,
                    'gambar' => $file_name,
                    'deskripsi' => $deskripsi
                ];
                $this->db->insert('kingdoms', $kingdoms_data);
            }
            
            // Insert into rekomendasi table
            $data = [
                'id_kerajaan'   => $id_kerajaan,
                'nama'          => $nama,
                'kategori'      => $kategori,
                'lokasi'        => $lokasi,
                'gambar'        => $file_name,
                'deskripsi'     => $deskripsi
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
        if (!$data['rekomendasi']) redirect('dashboard');

        $this->load->view('admin/rekomendasi_edit', $data);
    }

    public function update_rekomendasi() {
        if (!$this->session->userdata('logged_in')) redirect('admin');

        // Use id_kerajaan as the primary key for rekomendasi table
        $id_kerajaan = $this->input->post('id_kerajaan');
        
        if (!$id_kerajaan) {
            $this->session->set_flashdata('error', 'ID Kerajaan tidak valid!');
            redirect('dashboard');
        }
        
        $nama = $this->input->post('nama');
        $kategori = $this->input->post('kategori');
        $lokasi = $this->input->post('lokasi');
        $deskripsi = $this->input->post('deskripsi');
        
        $data = [
            'nama'          => $nama,
            'kategori'      => $kategori,
            'lokasi'        => $lokasi,
            'deskripsi'     => $deskripsi
        ];
        
        $gambar_baru = null;
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path']   = './assets/rekomendasi/';
            $config['allowed_types'] = 'png|jpg|jpeg';
            $config['max_size']      = 5048;
            $config['encrypt_name']  = TRUE;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('gambar')) {
                $upload_data = $this->upload->data();
                $data['gambar'] = $upload_data['file_name'];
                $gambar_baru = $upload_data['file_name'];
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/edit_rekomendasi/' . $id_kerajaan);
            }
        }

        // Update rekomendasi table
        $this->load->model('Rekomendasi_model');
        $result = $this->Rekomendasi_model->update($id_kerajaan, $data);
        
        // Also update kingdoms table if it exists
        $this->db->where('id', $id_kerajaan);
        $kingdom_exists = $this->db->get('kingdoms')->num_rows() > 0;
        
        if ($kingdom_exists) {
            $kingdoms_data = [
                'nama' => $nama,
                'subjudul' => $kategori . ' - ' . $lokasi,
                'deskripsi' => $deskripsi
            ];
            if ($gambar_baru) {
                $kingdoms_data['gambar'] = $gambar_baru;
            }
            $this->db->where('id', $id_kerajaan);
            $this->db->update('kingdoms', $kingdoms_data);
        }
        
        if ($result) {
            $this->session->set_flashdata('success', 'Data Rekomendasi Kerajaan berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui data Rekomendasi!');
        }
        redirect('dashboard');
    }

    // --- FITUR HAPUS REKOMENDASI ---
    public function hapus_rekomendasi($id = null) {
        if (!$this->session->userdata('logged_in')) redirect('admin');
        if ($id == null) redirect('dashboard');

        $this->load->model('Rekomendasi_model');

        $rekomendasi = $this->Rekomendasi_model->getById($id);
        if ($rekomendasi && !empty($rekomendasi->gambar)) {
            $path = './assets/rekomendasi/' . $rekomendasi->gambar;
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
        $data['timelines'] = $this->DetailKelola_model->getTimeline($kingdom_id);
        $data['warisan']   = $this->DetailKelola_model->getWarisan($kingdom_id);
        $data['events']    = $this->DetailKelola_model->getEvents($kingdom_id);
        $data['is_rekomendasi'] = $this->DetailKelola_model->isRekomendasi($kingdom_id);
        
        $data['kingdom_id'] = $kingdom_id;

        $this->load->view('admin/kelola_detail', $data);
    }

    // --- A. UPDATE DATA UTAMA ---
    public function update_info_utama() {
        if (!$this->session->userdata('logged_in')) redirect('admin');
        
        $id = $this->input->post('id');
        
        if (!$id) {
            $this->session->set_flashdata('error', 'ID tidak valid!');
            redirect('dashboard');
        }
        
        $data = [
            'nama'      => $this->input->post('nama'),
            'subjudul'  => $this->input->post('subjudul'),
            'deskripsi' => $this->input->post('deskripsi'),
        ];
        
        if (!empty($_FILES['gambar']['name'])) {
            $config['upload_path']   = './assets/detail/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']      = 5048;
            $config['encrypt_name']  = TRUE;
            
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('gambar')) {
                $data['gambar'] = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/kelola_detail/' . $id);
            }
        }

        $this->load->model('DetailKelola_model');
        $result = $this->DetailKelola_model->updateKingdom($id, $data);
        
        if ($result) {
            $this->session->set_flashdata('success', 'Info Utama berhasil diupdate!');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengupdate Info Utama!');
        }
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
        $this->session->set_flashdata('success', 'Timeline berhasil ditambahkan!');
        redirect('admin/kelola_detail/' . $kingdom_id . '#timeline');
    }

    public function hapus_timeline($id, $kingdom_id) {
        if (!$this->session->userdata('logged_in')) redirect('admin');
        
        $this->load->model('DetailKelola_model');
        $this->DetailKelola_model->deleteTimeline($id);
        $this->session->set_flashdata('success', 'Timeline berhasil dihapus!');
        redirect('admin/kelola_detail/' . $kingdom_id . '#timeline');
    }

    // --- C. KELOLA WARISAN ---
    public function tambah_warisan() {
        $kingdom_id = $this->input->post('kingdom_id');
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
        redirect('admin/kelola_detail/' . $kingdom_id . '#warisan');
    }

    public function hapus_warisan($id, $kingdom_id) {
        if (!$this->session->userdata('logged_in')) redirect('admin');
        
        $this->load->model('DetailKelola_model');
        $this->DetailKelola_model->deleteWarisan($id);
        $this->session->set_flashdata('success', 'Warisan berhasil dihapus!');
        redirect('admin/kelola_detail/' . $kingdom_id . '#warisan');
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
        if (!empty($_FILES['gambar_kiri']['name'])) {
            if ($this->upload->do_upload('gambar_kiri')) {
                $gambar_kiri = $this->upload->data('file_name');
            }
        }
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
        redirect('admin/kelola_detail/' . $kingdom_id . '#event');
    }

    public function hapus_event($id, $kingdom_id) {
        if (!$this->session->userdata('logged_in')) redirect('admin');
        
        $this->load->model('DetailKelola_model');
        $this->DetailKelola_model->deleteEvent($id);
        $this->session->set_flashdata('success', 'Peristiwa berhasil dihapus!');
        redirect('admin/kelola_detail/' . $kingdom_id . '#event');
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
        if (!$this->session->userdata('logged_in')) redirect('admin');
        
        $id = $this->input->post('id');
        $kingdom_id = $this->input->post('kingdom_id');

        if (!$id || !$kingdom_id) {
            $this->session->set_flashdata('error', 'Data tidak lengkap!');
            redirect('dashboard');
        }

        $data = [
            'tahun' => $this->input->post('tahun'),
            'isi'   => $this->input->post('isi')
        ];

        $this->load->model('DetailKelola_model');
        $result = $this->DetailKelola_model->updateTimeline($id, $data);
        
        if ($result) {
            $this->session->set_flashdata('success', 'Timeline berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui Timeline!');
        }
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
        if (!$this->session->userdata('logged_in')) redirect('admin');
        
        $id = $this->input->post('id');
        $kingdom_id = $this->input->post('kingdom_id');

        if (!$id || !$kingdom_id) {
            $this->session->set_flashdata('error', 'Data tidak lengkap!');
            redirect('dashboard');
        }

        $data = [
            'nama' => $this->input->post('nama')
        ];
        
        if (!empty($_FILES['ikon']['name'])) {
            $config['upload_path']   = './assets/warisan/';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['encrypt_name']  = TRUE;
            $this->load->library('upload', $config);

            if ($this->upload->do_upload('ikon')) {
                $data['ikon'] = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
                redirect('admin/kelola_detail/' . $kingdom_id);
            }
        }

        $this->load->model('DetailKelola_model');
        $result = $this->DetailKelola_model->updateWarisan($id, $data);
        
        if ($result) {
            $this->session->set_flashdata('success', 'Warisan berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui Warisan!');
        }
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
        if (!$this->session->userdata('logged_in')) redirect('admin');
        
        $id = $this->input->post('id');
        $kingdom_id = $this->input->post('kingdom_id');

        if (!$id || !$kingdom_id) {
            $this->session->set_flashdata('error', 'Data tidak lengkap!');
            redirect('dashboard');
        }

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
        
        if (!empty($_FILES['gambar_kiri']['name'])) {
            if ($this->upload->do_upload('gambar_kiri')) {
                $data['gambar_kiri'] = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', 'Upload gambar kiri gagal: ' . $this->upload->display_errors());
                redirect('admin/kelola_detail/' . $kingdom_id);
            }
        }
        
        if (!empty($_FILES['gambar_kanan']['name'])) {
            $this->upload->initialize($config);
            if ($this->upload->do_upload('gambar_kanan')) {
                $data['gambar_kanan'] = $this->upload->data('file_name');
            } else {
                $this->session->set_flashdata('error', 'Upload gambar kanan gagal: ' . $this->upload->display_errors());
                redirect('admin/kelola_detail/' . $kingdom_id);
            }
        }

        $this->load->model('DetailKelola_model');
        $result = $this->DetailKelola_model->updateEvent($id, $data);
        
        if ($result) {
            $this->session->set_flashdata('success', 'Peristiwa berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui Peristiwa!');
        }
        redirect('admin/kelola_detail/' . $kingdom_id);
    }
}