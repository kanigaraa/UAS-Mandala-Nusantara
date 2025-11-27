<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logged extends CI_Controller {

    public function index()
    {
        $this->load->model('Rekomendasi_model');
        $this->load->model('Kerajaan_model');

        $data['rekomendasi'] = $this->Rekomendasi_model->getAll();
        $data['kerajaan']    = $this->Kerajaan_model->getAll();

        // Array fakta unik sejarah
        $fun_facts = [
            'Kerajaan Sriwijaya adalah kerajaan maritim terbesar di Asia Tenggara pada abad ke-7 hingga ke-13 Masehi.',
            'Candi Borobudur dibangun pada masa Dinasti Syailendra sekitar tahun 750-850 Masehi dan merupakan candi Buddha terbesar di dunia.',
            'Majapahit mencapai puncak kejayaannya di bawah kepemimpinan Hayam Wuruk dengan Mahapatih Gajah Mada yang terkenal dengan Sumpah Palapanya.',
            'Kerajaan Kutai adalah kerajaan Hindu tertua di Indonesia yang didirikan sekitar abad ke-4 Masehi.',
            'Kerajaan Mataram Kuno membangun Candi Prambanan yang merupakan kompleks candi Hindu terbesar di Indonesia.',
            'Kerajaan Tarumanagara meninggalkan prasasti-prasasti yang ditulis dalam aksara Pallawa dan bahasa Sansekerta.',
            'Kerajaan Singhasari hanya bertahan selama 70 tahun (1222-1292) namun meninggalkan warisan budaya yang sangat berharga.',
            'Kerajaan Kediri terkenal dengan karya sastra Jawa Kuno seperti Kitab Bharatayuddha dan Kitab Gatotkacasraya.',
            'Kerajaan Demak adalah kerajaan Islam pertama di Jawa yang didirikan oleh Raden Patah pada akhir abad ke-15.',
            'Kerajaan Banten pernah menjadi pelabuhan internasional yang ramai dikunjungi pedagang dari berbagai negara.',
            'Kerajaan Aceh Darussalam mencapai puncak kejayaannya pada masa Sultan Iskandar Muda (1607-1636).',
            'Kerajaan Gowa-Tallo di Sulawesi Selatan memiliki armada laut yang sangat kuat pada abad ke-16 dan ke-17.',
        ];

        // Pilih satu fakta secara acak
        $random_key = array_rand($fun_facts);
        $data['fun_fact'] = $fun_facts[$random_key];

        $this->load->view('landing_logged', $data);
    }
}