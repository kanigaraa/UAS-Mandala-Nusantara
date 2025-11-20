<?php
class Kerajaan_model extends CI_Model {

    public function getAll()
    {
        return $this->db->get('kerajaan')->result_array();
    }
}