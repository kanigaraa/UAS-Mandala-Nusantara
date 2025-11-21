<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('admin');
    }

    public function authenticate() {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $admin = $this->Admin_model->check_login($email, $password);

        if ($admin) {
            $this->session->set_userdata([
                'id'   => $admin->id,
                'logged_in'  => true
            ]);

            redirect('dashboard');  
        } else {
            $this->session->set_flashdata('error', 'Email atau password salah.');
            redirect('admin');
        }
    }
}
