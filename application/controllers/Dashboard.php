<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('logged_in')) {
            redirect('admin');
        }
        
        $this->load->model('Kerajaan_model');
        $this->load->model('Rekomendasi_model');
    }

    public function index() {
        $data['title'] = 'Dashboard Admin - Mandala';
        
        $data['kerajaan'] = $this->Kerajaan_model->getAll(); 
        $data['rekomendasi'] = $this->Rekomendasi_model->getAll();

        $this->load->view('admin/dashboard', $data);
    }
    
    public function logout() {
        $this->session->sess_destroy();
        redirect('admin');
    }
}