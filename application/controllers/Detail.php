<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Detail_model');
    }

    public function detail($id)
    {
        $data['kingdom']  = $this->Detail_model->get_detail($id);
        $data['timeline'] = $this->Detail_model->get_timeline($id);
        $data['warisan']  = $this->Detail_model->get_warisan($id);

        $this->load->view('kerajaan/detail', $data);
    }


    public function index() {
        $data['kingdoms'] = $this->Detail_model->get_all();
        $this->load->view('kerajaan/detail', $data);
    }
}
