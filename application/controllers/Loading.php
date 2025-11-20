<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loading extends CI_Controller {

    public function index()
    {
        $this->load->view('loading');

        header("refresh:2;url=" . site_url('landing'));
    }
}