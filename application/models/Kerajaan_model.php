<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kerajaan_model extends CI_Model {

    public function getAll()
    {
        return $this->db->get('kerajaan')->result_array();
    }
}
