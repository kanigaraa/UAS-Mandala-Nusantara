<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function check_login($email, $password) {
        return $this->db
            ->where('email', $email)
            ->where('password', $password)
            ->get('admin')
            ->row();
    }
}