<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

    public function index()
    {
        $this->load->library('session');
        if ($this->session->userdata('logged_in')) {
            redirect('about_logged');
        }
        $this->load->view('about');
    }
}
