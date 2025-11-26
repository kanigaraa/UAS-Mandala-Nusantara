<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logged extends CI_Controller {

    public function index()
    {
        $this->load->model('Rekomendasi_model');
        $this->load->model('Kerajaan_model');

        $data['rekomendasi'] = $this->Rekomendasi_model->getAll();
        $data['kerajaan']    = $this->Kerajaan_model->getAll();

        $this->load->view('landing_logged', $data);
    }
}