<?php
class Kerajaan extends CI_Controller {

    public function index()
    {
        $this->load->model('Kerajaan_model');
        $data['kerajaan'] = $this->Kerajaan_model->getAll();

        $this->load->view('kerajaan/index', $data);
    }
}