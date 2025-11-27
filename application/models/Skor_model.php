<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skor_model extends CI_Model {

    // Ambil 10 skor tertinggi beserta email user-nya
    public function get_leaderboard() {
        $this->db->select('users.email, skor_kuis.skor, skor_kuis.kategori, skor_kuis.tanggal');
        $this->db->from('skor_kuis');
        $this->db->join('users', 'users.id = skor_kuis.id_user');
        $this->db->order_by('skor_kuis.skor', 'DESC');
        $this->db->limit(10);
        return $this->db->get()->result_array();
    }

    // Simpan skor baru
    public function simpan_skor($id_user, $skor, $kategori) {
        $data = [
            'id_user' => $id_user,
            'skor' => $skor,
            'kategori' => $kategori
        ];
        return $this->db->insert('skor_kuis', $data);
    }
}