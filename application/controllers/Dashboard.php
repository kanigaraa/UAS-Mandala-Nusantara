<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('admin');
        }
        // Load Model Kerajaan
        $this->load->model('Kerajaan_model');
    }

    public function index() {
        $data['title'] = 'Dashboard Admin - Mandala';
        
        // AMBIL DATA KERAJAAN DARI DATABASE
        $data['kerajaan'] = $this->Kerajaan_model->getAll(); 

        // Kirim data $kerajaan ke view
        $this->load->view('admin/dashboard', $data);
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('admin');
    }
}