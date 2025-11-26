<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AboutAdmin extends CI_Controller {

    public function index()
    {
        $this->load->view('about_admin');
    }
}
