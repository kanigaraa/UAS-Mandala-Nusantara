<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

    public function index()
    {
        $this->load->model('Kerajaan_model');

        $data['kerajaan'] = $this->Kerajaan_model->getAll();

        $this->load->view('landing', $data);
    }
}