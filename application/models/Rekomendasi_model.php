<?php
class Rekomendasi_model extends CI_Model {

    public function getAll()
    {
        return $this->db->get('rekomendasi')->result_array();
    }
}