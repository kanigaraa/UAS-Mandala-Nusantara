<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rekomendasi_model extends CI_Model {

    public function getAll()
    {
        return $this->db->get('rekomendasi')->result_array();
    }

    public function insert($data)
    {
        return $this->db->insert('rekomendasi', $data);
    }

    public function getById($id)
    {
        return $this->db->get_where('rekomendasi', ['id_kerajaan' => $id])->row_array();
    }

    public function update($id, $data)
    {
        $this->db->where('id_kerajaan', $id);
        return $this->db->update('rekomendasi', $data);
    }

    public function delete($id)
    {
        $this->db->where('id_kerajaan', $id);
        return $this->db->delete('rekomendasi');
    }
}