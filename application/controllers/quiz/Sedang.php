<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sedang extends CI_Controller {

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
                'id' => 11,
                'difficulty' => 'Sedang',
                'question' => 'Prasasti Yupa yang ditemukan di Muara Kaman merupakan bukti keberadaan kerajaan?',
                'options' => [
                    'A' => 'Kerajaan Kutai',
                    'B' => 'Kerajaan Tarumanagara',
                    'C' => 'Kerajaan Kalingga',
                    'D' => 'Kerajaan Sriwijaya'
                ],
                'correct' => 'A'
            ],
            [
                'id' => 12,
                'difficulty' => 'Sedang',
                'question' => 'Mahapatih Majapahit yang terkenal dengan Sumpah Palapa adalah?',
                'options' => [
                    'A' => 'Hayam Wuruk',
                    'B' => 'Raden Wijaya',
                    'C' => 'Gajah Mada',
                    'D' => 'Jayanegara'
                ],
                'correct' => 'C'
            ],
            [
                'id' => 13,
                'difficulty' => 'Sedang',
                'question' => 'Kerajaan Singasari didirikan oleh?',
                'options' => [
                    'A' => 'Ken Arok',
                    'B' => 'Kertanegara',
                    'C' => 'Anusapati',
                    'D' => 'Ranggawuni'
                ],
                'correct' => 'A'
            ],
            [
                'id' => 14,
                'difficulty' => 'Sedang',
                'question' => 'Pendiri Kerajaan Mataram Islam adalah?',
                'options' => [
                    'A' => 'Sultan Agung',
                    'B' => 'Panembahan Senopati',
                    'C' => 'Amangkurat I',
                    'D' => 'Pakubuwono I'
                ],
                'correct' => 'B'
            ],
            [
                'id' => 15,
                'difficulty' => 'Sedang',
                'question' => 'Raja Majapahit yang mencapai puncak kejayaan kerajaan adalah?',
                'options' => [
                    'A' => 'Raden Wijaya',
                    'B' => 'Jayanegara',
                    'C' => 'Hayam Wuruk',
                    'D' => 'Wikramawardhana'
                ],
                'correct' => 'C'
            ],
            [
                'id' => 16,
                'difficulty' => 'Sedang',
                'question' => 'Prasasti Ciaruteun merupakan peninggalan dari kerajaan?',
                'options' => [
                    'A' => 'Kerajaan Sunda',
                    'B' => 'Kerajaan Tarumanagara',
                    'C' => 'Kerajaan Pajajaran',
                    'D' => 'Kerajaan Galuh'
                ],
                'correct' => 'B'
            ],
            [
                'id' => 17,
                'difficulty' => 'Sedang',
                'question' => 'Sistem pemerintahan Kerajaan Sriwijaya berbentuk?',
                'options' => [
                    'A' => 'Monarki absolut',
                    'B' => 'Mandala',
                    'C' => 'Feodal',
                    'D' => 'Kesultanan'
                ],
                'correct' => 'B'
            ],
            [
                'id' => 18,
                'difficulty' => 'Sedang',
                'question' => 'Raja terakhir Kerajaan Singasari sebelum runtuh adalah?',
                'options' => [
                    'A' => 'Ken Arok',
                    'B' => 'Anusapati',
                    'C' => 'Kertanegara',
                    'D' => 'Tohjaya'
                ],
                'correct' => 'C'
            ],
            [
                'id' => 19,
                'difficulty' => 'Sedang',
                'question' => 'Kerajaan Demak didirikan oleh?',
                'options' => [
                    'A' => 'Raden Patah',
                    'B' => 'Sunan Kalijaga',
                    'C' => 'Sultan Trenggono',
                    'D' => 'Sunan Ampel'
                ],
                'correct' => 'A'
            ],
            [
                'id' => 20,
                'difficulty' => 'Sedang',
                'question' => 'Ibu kota Kerajaan Majapahit terletak di?',
                'options' => [
                    'A' => 'Trowulan',
                    'B' => 'Singasari',
                    'C' => 'Kediri',
                    'D' => 'Daha'
                ],
                'correct' => 'A'
            ]
        ];

        $this->load->view('quiz/sedang', $data);
    }
}
