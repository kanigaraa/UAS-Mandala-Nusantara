<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailKelola_model extends CI_Model {

    // --- 1. DATA UTAMA (KINGDOMS) ---
    public function getKingdomById($id) {
        return $this->db->get_where('kingdoms', ['id' => $id])->row();
    }

    public function updateKingdom($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('kingdoms', $data);
    }

    // --- 2. TIMELINE ---
    public function getTimeline($kingdom_id) {
        return $this->db->get_where('kingdom_timelines', ['kingdom_id' => $kingdom_id])->result();
    }
    public function insertTimeline($data) {
        return $this->db->insert('kingdom_timelines', $data);
    }
    public function deleteTimeline($id) {
        $this->db->where('id', $id);
        return $this->db->delete('kingdom_timelines');
    }

    // --- 3. WARISAN ---
    public function getWarisan($kingdom_id) {
        return $this->db->get_where('kingdom_warisan', ['kingdom_id' => $kingdom_id])->result();
    }
    public function insertWarisan($data) {
        return $this->db->insert('kingdom_warisan', $data);
    }
    public function deleteWarisan($id) {
        return $this->db->delete('kingdom_warisan', ['id' => $id]);
    }

    // --- 4. EVENTS (KHUSUS REKOMENDASI) ---
    public function getEvents($kingdom_id) {
        return $this->db->get_where('kingdom_events', ['kingdom_id' => $kingdom_id])->result();
    }
    public function insertEvent($data) {
        return $this->db->insert('kingdom_events', $data);
    }
    public function deleteEvent($id) {
        return $this->db->delete('kingdom_events', ['id' => $id]);
    }

    public function isRekomendasi($kingdom_id) {
        $this->db->where('id_kerajaan', $kingdom_id);
        $cek = $this->db->get('rekomendasi'); 
        
        return $cek->num_rows() > 0;
    }

    // --- FITUR EDIT ---

    // 1. TIMELINE
    public function getTimelineById($id) {
        return $this->db->get_where('kingdom_timelines', ['id' => $id])->row();
    }
    public function updateTimeline($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('kingdom_timelines', $data);
    }

    // 2. WARISAN
    public function getWarisanById($id) {
        return $this->db->get_where('kingdom_warisan', ['id' => $id])->row();
    }
    public function updateWarisan($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('kingdom_warisan', $data);
    }

    // 3. EVENTS (PERISTIWA)
    public function getEventById($id) {
        return $this->db->get_where('kingdom_events', ['id' => $id])->row();
    }
    public function updateEvent($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('kingdom_events', $data);
    }
}