<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailRekomendasi_model extends CI_Model {

    public function get_all() {
        return $this->db->get('kingdoms')->result();
    }

    public function get_detail($id) {
        return $this->db->get_where('kingdoms', ['id' => $id])->row();
    }

    public function get_timeline($id) {
        $this->db->order_by('tahun', 'ASC');
        return $this->db->get_where('kingdom_timelines', ['kingdom_id' => $id])->result();
    }

    public function get_warisan($id) {
        return $this->db->get_where('kingdom_warisan', ['kingdom_id' => $id])->result();
    }

    public function get_event($id) {
        return $this->db->get_where('kingdom_events', ['kingdom_id' => $id])->result();
    }
}

