<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AboutLogged extends CI_Controller {

    public function index()
    {
        $this->load->view('about_logged');
    }
}
