<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sulit extends CI_Controller {

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
                'id' => 21,
                'difficulty' => 'Sulit',
                'question' => 'Kitab yang berisi catatan perjalanan dan keadaan Kerajaan Majapahit yang ditulis oleh Mpu Prapanca pada tahun 1365 adalah?',
                'options' => [
                    'A' => 'Kitab Sutasoma',
                    'B' => 'Kitab Arjunawiwaha',
                    'C' => 'Kitab Negarakertagama',
                    'D' => 'Kitab Pararaton'
                ],
                'correct' => 'C'
            ],
            [
                'id' => 22,
                'difficulty' => 'Sulit',
                'question' => 'Sultan Mataram Islam yang melancarkan serangan ke Batavia pada tahun 1628-1629 adalah?',
                'options' => [
                    'A' => 'Sultan Agung Hanyokrokusumo',
                    'B' => 'Panembahan Senopati',
                    'C' => 'Amangkurat I',
                    'D' => 'Pakubuwono I'
                ],
                'correct' => 'A'
            ],
            [
                'id' => 23,
                'difficulty' => 'Sulit',
                'question' => 'Prasasti yang berisi tentang telapak kaki Gajah Raja Purnawarman adalah?',
                'options' => [
                    'A' => 'Prasasti Tugu',
                    'B' => 'Prasasti Ciaruteun',
                    'C' => 'Prasasti Kebon Kopi',
                    'D' => 'Prasasti Jambu'
                ],
                'correct' => 'B'
            ],
            [
                'id' => 24,
                'difficulty' => 'Sulit',
                'question' => 'Ekspedisi Pamalayu yang dilakukan Kertanegara bertujuan untuk?',
                'options' => [
                    'A' => 'Menaklukkan Sriwijaya',
                    'B' => 'Bersekutu dengan Melayu melawan Mongol',
                    'C' => 'Menyebarkan agama Buddha',
                    'D' => 'Membuka jalur perdagangan'
                ],
                'correct' => 'B'
            ],
            [
                'id' => 25,
                'difficulty' => 'Sulit',
                'question' => 'Nama asli Panembahan Senopati sebelum mendirikan Mataram Islam adalah?',
                'options' => [
                    'A' => 'Mas Jolang',
                    'B' => 'Sutawijaya',
                    'C' => 'Ki Ageng Pemanahan',
                    'D' => 'Arya Penangsang'
                ],
                'correct' => 'B'
            ],
            [
                'id' => 26,
                'difficulty' => 'Sulit',
                'question' => 'Tahun berapa Kerajaan Majapahit mencapai puncak kejayaannya di bawah Hayam Wuruk?',
                'options' => [
                    'A' => '1293-1309',
                    'B' => '1350-1389',
                    'C' => '1309-1328',
                    'D' => '1389-1429'
                ],
                'correct' => 'B'
            ],
            [
                'id' => 27,
                'difficulty' => 'Sulit',
                'question' => 'Sumber sejarah asing yang mencatat keberadaan Kerajaan Sriwijaya adalah catatan dari?',
                'options' => [
                    'A' => 'Marco Polo',
                    'B' => 'I-Tsing',
                    'C' => 'Tome Pires',
                    'D' => 'Ibn Battuta'
                ],
                'correct' => 'B'
            ],
            [
                'id' => 28,
                'difficulty' => 'Sulit',
                'question' => 'Raja Tarumanagara yang namanya tertulis dalam Prasasti Tugu adalah?',
                'options' => [
                    'A' => 'Rajadirajaguru',
                    'B' => 'Purnawarman',
                    'C' => 'Suryawarman',
                    'D' => 'Linggawarman'
                ],
                'correct' => 'B'
            ],
            [
                'id' => 29,
                'difficulty' => 'Sulit',
                'question' => 'Peristiwa Pralaya yang menyebabkan perpecahan Mataram Islam terjadi pada masa pemerintahan?',
                'options' => [
                    'A' => 'Sultan Agung',
                    'B' => 'Amangkurat I',
                    'C' => 'Amangkurat II',
                    'D' => 'Pakubuwono II'
                ],
                'correct' => 'D'
            ],
            [
                'id' => 30,
                'difficulty' => 'Sulit',
                'question' => 'Istilah "Dwipantara" dalam Sumpah Palapa Gajah Mada merujuk kepada?',
                'options' => [
                    'A' => 'Pulau Jawa',
                    'B' => 'Nusantara',
                    'C' => 'Sumatera',
                    'D' => 'Bali'
                ],
                'correct' => 'B'
            ]
        ];

        $this->load->view('quiz/sulit', $data);
    }
}
