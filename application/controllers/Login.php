<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function index()
    {
        // $this->load->model('Login_model');

        // $data['login'] = $this->Login_model->getAll();

        $this->load->view('login');
    }
}
