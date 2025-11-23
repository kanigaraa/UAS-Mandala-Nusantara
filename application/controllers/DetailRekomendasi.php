<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailRekomendasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('DetailRekomendasi_model');
    }

    public function detail($id)
    {
        $data['kingdom']  = $this->DetailRekomendasi_model->get_detail($id);
        $data['timeline'] = $this->DetailRekomendasi_model->get_timeline($id);
        $data['warisan']  = $this->DetailRekomendasi_model->get_warisan($id);
        $data['event']    = $this->DetailRekomendasi_model->get_event($id);

        $this->load->view('kerajaan/detail_rekomendasi', $data);
    }


    public function index() {
        $data['kingdoms'] = $this->DetailRekomendasi_model->get_all();
        $this->load->view('kerajaan/detail_rekomendasi', $data);
    }
}
