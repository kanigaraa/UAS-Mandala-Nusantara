<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('login');
    }

public function authenticate() {
    $email = $this->input->post('email');
    $password = $this->input->post('password');

    $user = $this->User_model->check_login($email, $password);

    if ($user) {
        $this->session->set_userdata([
            'id' => $user->id,
            'email' => $user->email,
            'logged_in' => true
        ]);
        redirect('landing_logged'); // atau halaman kamu
    } else {
        $this->session->set_flashdata('error', 'Email atau password salah.');
        redirect('login');
    }
    }
}