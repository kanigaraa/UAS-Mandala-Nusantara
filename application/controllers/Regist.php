<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regist extends CI_Controller {

    public function index()
    {
        // $this->load->model('Regist_model');

        // $data['login'] = $this->Regist_model->getAll();

        $this->load->view('regist');
    }
}
