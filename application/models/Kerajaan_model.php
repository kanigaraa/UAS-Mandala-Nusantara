<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kerajaan_model extends CI_Model {

    public function getAll()
    {
        return $this->db->get('kerajaan')->result_array();
    }

    public function insert($data)
    {
        return $this->db->insert('kerajaan', $data);
    }

    public function getById($id)
    {
        return $this->db->get_where('kerajaan', ['id' => $id])->row_array();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('kerajaan', $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('kerajaan');
    }
}
