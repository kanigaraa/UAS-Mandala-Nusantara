<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Regist extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('regist');
    }

    public function authenticate() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $password_confirm = $this->input->post('password_confirm');

        if ($password !== $password_confirm) {
            $this->session->set_flashdata('error', 'Password tidak cocok.');
            redirect('regist');
        }

        if ($this->User_model->email_exists($email)) {
            $this->session->set_flashdata('error', 'Email sudah terdaftar.');
            redirect('regist');
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $this->User_model->create_user($email, $hash);

        $this->session->set_flashdata('success', 'Akun berhasil dibuat. Silakan login.');
        redirect('login');
    }
}
