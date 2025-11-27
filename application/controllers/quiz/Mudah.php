<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mudah extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index() {
        if (!$this->session->userdata('logged_in')) {
            redirect('landing');
        }

        $data['questions'] = [
            [
                'id' => 1,
                'difficulty' => 'Mudah',
                'question' => 'Kerajaan maritim terbesar di Asia Tenggara pada abad ke-7 hingga ke-13 yang menguasai jalur perdagangan Selat Malaka adalah?',
                'options' => [
                    'A' => 'Kerajaan Majapahit',
                    'B' => 'Kerajaan Sriwijaya',
                    'C' => 'Kerajaan Mataram Kuno',
                    'D' => 'Kerajaan Kutai'
                ],
                'correct' => 'B'
            ],
            [
                'id' => 2,
                'difficulty' => 'Mudah',
                'question' => 'Candi Buddha terbesar di dunia yang dibangun pada masa Dinasti Syailendra adalah?',
                'options' => [
                    'A' => 'Candi Prambanan',
                    'B' => 'Candi Mendut',
                    'C' => 'Candi Borobudur',
                    'D' => 'Candi Pawon'
                ],
                'correct' => 'C'
            ],
            [
                'id' => 3,
                'difficulty' => 'Mudah',
                'question' => 'Kerajaan Hindu-Buddha terbesar di Nusantara yang mencapai puncak kejayaan pada masa Hayam Wuruk adalah?',
                'options' => [
                    'A' => 'Kerajaan Sriwijaya',
                    'B' => 'Kerajaan Singasari',
                    'C' => 'Kerajaan Majapahit',
                    'D' => 'Kerajaan Mataram Kuno'
                ],
                'correct' => 'C'
            ],
            [
                'id' => 4,
                'difficulty' => 'Mudah',
                'question' => 'Kerajaan Islam pertama di Nusantara yang terletak di Aceh adalah?',
                'options' => [
                    'A' => 'Kerajaan Demak',
                    'B' => 'Kerajaan Samudera Pasai',
                    'C' => 'Kesultanan Aceh',
                    'D' => 'Kerajaan Mataram Islam'
                ],
                'correct' => 'B'
            ],
            [
                'id' => 5,
                'difficulty' => 'Mudah',
                'question' => 'Kerajaan tertua di Indonesia yang bukti keberadaannya ditemukan di Kalimantan Timur adalah?',
                'options' => [
                    'A' => 'Kerajaan Kutai',
                    'B' => 'Kerajaan Tarumanagara',
                    'C' => 'Kerajaan Sriwijaya',
                    'D' => 'Kerajaan Kalingga'
                ],
                'correct' => 'A'
            ],
            [
                'id' => 6,
                'difficulty' => 'Mudah',
                'question' => 'Raja pendiri Kerajaan Majapahit adalah?',
                'options' => [
                    'A' => 'Hayam Wuruk',
                    'B' => 'Raden Wijaya',
                    'C' => 'Gajah Mada',
                    'D' => 'Kertanegara'
                ],
                'correct' => 'B'
            ],
            [
                'id' => 7,
                'difficulty' => 'Mudah',
                'question' => 'Kerajaan Hindu tertua di Jawa Barat adalah?',
                'options' => [
                    'A' => 'Kerajaan Pajajaran',
                    'B' => 'Kerajaan Galuh',
                    'C' => 'Kerajaan Tarumanagara',
                    'D' => 'Kerajaan Sunda'
                ],
                'correct' => 'C'
            ],
            [
                'id' => 8,
                'difficulty' => 'Mudah',
                'question' => 'Candi peninggalan Kerajaan Mataram Kuno yang terkenal selain Borobudur adalah?',
                'options' => [
                    'A' => 'Candi Sukuh',
                    'B' => 'Candi Prambanan',
                    'C' => 'Candi Sewu',
                    'D' => 'Candi Plaosan'
                ],
                'correct' => 'B'
            ],
            [
                'id' => 9,
                'difficulty' => 'Mudah',
                'question' => 'Kerajaan Islam yang berdiri setelah runtuhnya Majapahit adalah?',
                'options' => [
                    'A' => 'Kerajaan Samudera Pasai',
                    'B' => 'Kerajaan Demak',
                    'C' => 'Kesultanan Banten',
                    'D' => 'Kerajaan Mataram Islam'
                ],
                'correct' => 'B'
            ],
            [
                'id' => 10,
                'difficulty' => 'Mudah',
                'question' => 'Dinasti yang membangun Candi Borobudur adalah?',
                'options' => [
                    'A' => 'Dinasti Sanjaya',
                    'B' => 'Dinasti Syailendra',
                    'C' => 'Dinasti Isyana',
                    'D' => 'Dinasti Singasari'
                ],
                'correct' => 'B'
            ]
        ];

        $this->load->view('quiz/mudah', $data);
    }
}
