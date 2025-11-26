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
        $config['encrypt_name']     = FALSE;

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
            $config['encrypt_name']  = FALSE;

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
        $config['encrypt_name']     = FALSE;

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
            $config['encrypt_name']  = FALSE;

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
}
