<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leaderboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Skor_model');
    }

    public function index() {
        // Cek login
        if (!$this->session->userdata('email')) {
            redirect('landing');
        }

        $data['top_skor'] = $this->Skor_model->get_leaderboard();
        
        // Helper biar nama yang muncul cuma depan email (misal: aca@gmail.com -> Acha)
        $data['format_nama'] = function($email) {
            $parts = explode('@', $email);
            return ucfirst($parts[0]);
        };

        $this->load->view('leaderboard', $data);
    }

    public function simpan() {
        // Ambil data dari form yang dikirim kuis
        $id_user = $this->session->userdata('id');
        $skor = $this->input->post('skor');
        $kategori = $this->input->post('kategori');

        if ($id_user && $skor !== null) {
            $this->Skor_model->simpan_skor($id_user, $skor, $kategori);
        }
        
        redirect('leaderboard');
    }
}