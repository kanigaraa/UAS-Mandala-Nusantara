<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('admin');
        }
        
        // 1. Load KEDUA Model di sini
        $this->load->model('Kerajaan_model');
        $this->load->model('Rekomendasi_model'); // <--- Tambahkan baris ini!
    }

    public function index() {
        $data['title'] = 'Dashboard Admin - Mandala';
        
        // 2. Ambil semua data dan masukkan ke variabel $data
        $data['kerajaan'] = $this->Kerajaan_model->getAll(); 
        $data['rekomendasi'] = $this->Rekomendasi_model->getAll(); // <--- Sekarang ini aman

        // 3. Load view CUKUP SEKALI SAJA di akhir
        // Jangan load view sepotong-sepotong, nanti tampilannya dobel atau error
        $this->load->view('admin/dashboard', $data);
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('admin');
    }
}