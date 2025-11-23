-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Nov 2025 pada 02.33
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mandala_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin1@mandala.id', 'Mandala1945'),
(2, 'admin2@mandala.id', 'Mandala1946'),
(3, 'admin3@mandala.id', 'Mandala1947'),
(4, 'admin4@mandala.id', 'Mandala1948');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kerajaan`
--

CREATE TABLE `kerajaan` (
  `id` int(11) NOT NULL,
  `kingdom_id` int(11) DEFAULT NULL,
  `nama` varchar(150) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `lokasi` varchar(150) NOT NULL,
  `deskripsi` text NOT NULL,
  `icon` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kerajaan`
--

INSERT INTO `kerajaan` (`id`, `kingdom_id`, `nama`, `kategori`, `lokasi`, `deskripsi`, `icon`) VALUES
(1, 5, 'Tarumanagara', 'Hindu-Buddha', 'Jawa Barat', 'Kerajaan Hindu tertua di Jawa Barat dengan sistem irigasi maju.', 'tarumanegara_icon.png'),
(2, 6, 'Demak', 'Islam', 'Jawa Tengah', 'Kerajaan Islam pertama di Pulau Jawa dengan masjid agung bersejarah.', 'demak_icon.png'),
(3, 7, 'Banjar', 'Pra-Kolonial', 'Kalimantan Selatan', 'Kerajaan dengan perdagangan lada dan hasil hutan yang makmur.', 'banjar_icon.png'),
(4, 8, 'Aceh', 'Islam', 'Aceh', 'Kerajaan Islam kuat dengan pengaruh di Selat Malaka.', 'aceh_icon.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kingdoms`
--

CREATE TABLE `kingdoms` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `subjudul` text DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `deskripsi` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kingdoms`
--

INSERT INTO `kingdoms` (`id`, `nama`, `subjudul`, `gambar`, `deskripsi`) VALUES
(1, 'Sriwijaya', 'Kerajaan pelaut terbesar yang menguasai jalur perdagangan Asia Tenggara.', 'sriwijaya_detail.png', 'Sriwijaya berkembang sebagai pusat pembelajaran Buddha yang terkenal, menarik pelajar dari berbagai wilayah Asia, termasuk Tiongkok dan India. Wilayahnya yang strategis menjadikan Sriwijaya sebagai pengendali jalur perdagangan internasional, terutama dalam komoditas seperti kapur barus, emas, dan rempah-rempah. Keberhasilan Sriwijaya juga ditopang oleh kekuatan armada laut yang menjaga keamanan perairan Nusantara.'),
(2, 'Majapahit: Kerajaan Hindu-Buddha di Jawa Timur', 'Menjelajahi kerajaan besar yang berpengaruh dalam sejarah Nusantara.', 'majapahit_detail.png', 'Kerajaan Majapahit dikenal sebagai kerajaan yang memiliki sistem pemerintahan teratur dan struktur birokrasi yang kuat. Kehidupan masyarakatnya berkembang dalam bidang pertanian, perdagangan, seni, dan sastra, sementara hubungan antarwilayah diperkuat melalui jaringan pelabuhan besar yang menghubungkan Nusantara dengan Asia Tenggara. Majapahit juga menghasilkan berbagai karya sastra penting yang menggambarkan kehidupan istana, upacara keagamaan, dan politik kerajaan.'),
(3, 'Kutai: Kerajaan Hindu Pertama di Nusantara', 'Kerajaan awal Indonesia yang meninggalkan prasasti tertua dalam sejarah.', 'kutai_detail.jpg', 'Kerajaan Kutai merupakan kerajaan tertua di Indonesia yang dikenal melalui keberadaan prasasti Yupa yang memuat informasi tentang kehidupan politik dan sosial masyarakatnya. Kutai berkembang melalui aktivitas perdagangan di sekitar Sungai Mahakam, serta mengadopsi pengaruh budaya India seperti penggunaan aksara Pallawa dan penyebaran ajaran Hindu pada masa awal.'),
(5, 'Tarumanagara', 'Kerajaan Hindu tertua di Jawa Barat dengan sistem irigasi maju', 'tarumanagara_detail.png', 'Tarumanagara adalah kerajaan Hindu tertua yang tercatat di Jawa Barat, berdiri sekitar abad ke-4 Masehi. Kerajaan ini terkenal dengan prasasti-prasasti Raja Purnawarman yang menunjukkan kemajuan dalam sistem irigasi dan pembangunan infrastruktur. Wilayah kekuasaan Tarumanagara meliputi sebagian besar Jawa Barat modern, dengan pusat kerajaan di daerah Bekasi dan Bogor. Sistem pemerintahan yang terorganisir dan kemampuan teknologi hidrolik menjadikan Tarumanagara sebagai kerajaan yang makmur dan berpengaruh di zamannya.'),
(6, 'Demak', 'Kerajaan Islam pertama di Pulau Jawa', 'demak_detail.png', 'Kerajaan Demak didirikan sekitar abad ke-15 dan menjadi kerajaan Islam pertama yang berdiri di Pulau Jawa. Dipimpin oleh Raden Patah, Demak berperan penting dalam penyebaran agama Islam di Jawa. Masjid Agung Demak yang dibangun oleh para Wali Songo menjadi simbol kejayaan kerajaan ini. Demak tidak hanya kuat dalam bidang keagamaan, tetapi juga dalam perdagangan dan politik, menguasai pelabuhan-pelabuhan penting di pesisir utara Jawa.'),
(7, 'Banjar', 'Kerajaan dengan perdagangan lada dan hasil hutan yang makmur', 'banjar_detail.png', 'Kerajaan Banjar berkembang di Kalimantan Selatan sejak abad ke-16 dengan basis ekonomi yang kuat dari perdagangan lada, kayu, dan hasil hutan lainnya. Terletak di daerah aliran Sungai Barito, Banjar menjadi pusat perdagangan penting yang menghubungkan pedalaman Kalimantan dengan jalur maritim Nusantara. Kerajaan ini juga terkenal dengan sistem pemerintahan yang terorganisir dan adaptasi Islam yang kuat dalam kultur masyarakatnya.'),
(8, 'Aceh', 'Kesultanan Islam dengan kekuatan maritim di Selat Malaka', 'aceh_detail.png', 'Kesultanan Aceh Darussalam mencapai puncak kejayaannya pada abad ke-16 dan 17 sebagai salah satu kekuatan maritim Islam terbesar di Asia Tenggara. Dengan posisi strategis di Selat Malaka, Aceh menguasai jalur perdagangan rempah-rempah dan menjadi pusat penyebaran Islam. Di bawah kepemimpinan Sultan Iskandar Muda, Aceh mengalami masa keemasan dengan armada laut yang ditakuti, perdagangan internasional yang ramai, dan perkembangan ilmu pengetahuan Islam yang pesat.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kingdom_events`
--

CREATE TABLE `kingdom_events` (
  `id` int(11) NOT NULL,
  `kingdom_id` int(11) DEFAULT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi_kiri` longtext DEFAULT NULL,
  `isi_kanan` longtext DEFAULT NULL,
  `gambar_kiri` varchar(255) DEFAULT NULL,
  `gambar_kanan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kingdom_events`
--

INSERT INTO `kingdom_events` (`id`, `kingdom_id`, `judul`, `isi_kiri`, `isi_kanan`, `gambar_kiri`, `gambar_kanan`) VALUES
(3, 2, 'Sumpah Palapa (1336 M)', 'Pada tahun 1336, seorang mahapatih muda bernama Gajah Mada berdiri di hadapan para pembesar kerajaan untuk mengucapkan sumpah yang kelak mengguncang sejarah Nusantara. Sumpah itu dikenal sebagai Sumpah Palapa, sebuah tekad bahwa ia tidak akan menikmati kehidupan duniawi sebelum seluruh wilayah Nusantara berhasil dipersatukan di bawah panji Majapahit. Sumpah ini bukan hanya sekadar ungkapan semangat, tetapi menjadi cerminan ambisi besar Majapahit untuk memperluas kekuasaan dan mengokohkan dirinya sebagai kerajaan terbesar di kepulauan Asia Tenggara.', 'Gajah Mada pun membuktikan kata-katanya. Dengan strategi yang matang dan kekuatan militer yang terorganisasi, ia memimpin ekspedisi ke berbagai wilayah, mulai dari Bali, Sunda, hingga kepulauan di kawasan timur Nusantara. Sedikit demi sedikit, kerajaan-kerajaan kecil berhasil ditaklukkan dan berada di bawah pengaruh Majapahit. Keberhasilan ini kemudian menjadi fondasi kejayaan Majapahit pada masa Hayam Wuruk, sehingga Sumpah Palapa dikenang sebagai titik awal penyatuan Nusantara.', 'peristiwa1_majapahit.png', 'peristiwa2_majapahit.png'),
(4, 3, 'Penulisan Prasasti Yupa (± Abad ke-4 M)', 'Pada masa pemerintahan Raja Mulawarman, sebuah upacara besar diadakan untuk menghormati para brahmana yang telah berjasa dalam kehidupan keagamaan kerajaan. Dalam peristiwa tersebut, Mulawarman memberikan hadiah berupa ribuan ekor sapi sebagai tanda bakti dan penghormatan. Untuk mengabadikan peristiwa penting ini, para brahmana menuliskan tujuh prasasti pada batu yang disebut Yupa. Prasasti-prasasti inilah yang menjadi bukti tertulis pertama tentang keberadaan kerajaan di wilayah Nusantara.', 'Prasasti Yupa tidak hanya mencatat kedermawanan Mulawarman, tetapi juga memberikan gambaran tentang struktur masyarakat, praktik keagamaan, dan budaya Kutai pada masa itu. Penulisan prasasti tersebut menandai berkembangnya pengaruh Hindu di Kalimantan Timur dan memperlihatkan kemajuan kehidupan politik serta spiritual kerajaan. Hingga kini, Yupa menjadi salah satu peninggalan sejarah paling penting yang menunjukkan bahwa peradaban Indonesia telah maju jauh sebelum masa kerajaan besar lainnya.', 'peristiwa1_kutai.png', 'peristiwa2_kutai.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kingdom_timelines`
--

CREATE TABLE `kingdom_timelines` (
  `id` int(11) NOT NULL,
  `kingdom_id` int(11) DEFAULT NULL,
  `tahun` varchar(50) DEFAULT NULL,
  `isi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kingdom_timelines`
--

INSERT INTO `kingdom_timelines` (`id`, `kingdom_id`, `tahun`, `isi`) VALUES
(7, 2, '1293', 'Kerajaan berdiri; Raden Wijaya membuka hutan Tarik dan mendirikan Majapahit di Trowulan.'),
(8, 2, '1336', 'Gajah Mada dilantik sebagai Mahapatih dan mengucapkan Sumpah Palapa.'),
(9, 2, '1350–1389', 'Masa keemasan di bawah Hayam Wuruk & Gajah Mada.'),
(10, 2, '1365', 'Penulisan kitab Nagarakretagama (Mpu Prapanca).'),
(11, 2, '1400–1510', 'Majapahit melemah akibat konflik internal.'),
(12, 2, '±1527', 'Majapahit runtuh; wilayah beralih ke kerajaan Islam di Jawa.'),
(13, 3, '±400 M', 'Kerajaan Kutai berdiri di Muara Kaman, Kalimantan Timur.'),
(14, 3, '350–400', 'Pembuatan Prasasti Yupa oleh raja Mulawarman.'),
(15, 3, 'Abad 5–10', 'Kutai berkembang sebagai pusat Hindu aliran Siwa.'),
(16, 3, 'Abad 13', 'Muncul kerajaan baru, Kutai Kartanegara.'),
(17, 3, '±1600', 'Kutai Martadipura menyatu dengan Kutai Kartanegara.'),
(18, 3, '1960', 'Kutai sebagai kerajaan tradisional resmi berakhir.'),
(19, 5, '358', 'Kerajaan Tarumanagara didirikan oleh Raja Rajadirajaguru Jayasingawarman'),
(20, 5, '395-434', 'Masa pemerintahan Raja Purnawarman, raja terbesar Tarumanagara'),
(21, 5, '417', 'Pembangunan Saluran Gomati (Kali Bekasi) sepanjang 6112 tumbak'),
(22, 5, '450', 'Pembuatan prasasti Ciaruteun yang menunjukkan jejak telapak kaki gajah raja'),
(23, 5, '500-650', 'Tarumanagara mengalami puncak kejayaan dengan wilayah kekuasaan luas'),
(24, 5, '669', 'Tarumanagara mulai melemah dan kemudian bergabung dengan Kerajaan Sunda'),
(25, 6, '1475', 'Raden Patah mendirikan Kesultanan Demak'),
(26, 6, '1478', 'Pembangunan Masjid Agung Demak oleh Wali Songo'),
(27, 6, '1500', 'Demak menjadi pusat penyebaran Islam di Jawa'),
(28, 6, '1518-1521', 'Masa pemerintahan Sultan Trenggana, puncak kejayaan Demak'),
(29, 6, '1546', 'Sultan Trenggana wafat dalam ekspedisi ke Pasuruan'),
(30, 6, '1568', 'Demak mulai melemah, kekuasaan beralih ke Pajang dan Mataram'),
(31, 7, '1526', 'Kerajaan Banjar didirikan oleh Pangeran Samudra (Sultan Suriansyah)'),
(32, 7, '1550', 'Islam menjadi agama resmi kerajaan'),
(33, 7, '1595-1638', 'Masa Sultan Mustain Billah, kejayaan perdagangan lada'),
(34, 7, '1650', 'Banjar menjadi penghasil lada terbesar di Kalimantan'),
(35, 7, '1785-1808', 'Masa Sultan Tahmidullah II, konflik dengan Belanda'),
(36, 7, '1860', 'Perang Banjar melawan Belanda, kerajaan berakhir'),
(37, 8, '1496', 'Kesultanan Aceh didirikan oleh Sultan Ali Mughayat Syah'),
(38, 8, '1520-1530', 'Ekspansi wilayah ke pesisir barat dan timur Sumatera'),
(39, 8, '1607-1636', 'Masa Sultan Iskandar Muda, puncak kejayaan Aceh'),
(40, 8, '1641', 'Armada Aceh menguasai Selat Malaka'),
(41, 8, '1699', 'Masa Sultanah Safiatuddin, perempuan pertama yang memerintah'),
(42, 8, '1873-1904', 'Perang Aceh melawan Belanda, perlawanan terlama di Nusantara');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kingdom_warisan`
--

CREATE TABLE `kingdom_warisan` (
  `id` int(11) NOT NULL,
  `kingdom_id` int(11) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `ikon` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kingdom_warisan`
--

INSERT INTO `kingdom_warisan` (`id`, `kingdom_id`, `nama`, `ikon`) VALUES
(5, 2, 'Arsitektur', 'arsi_majapahit.png'),
(6, 2, 'Sastra', 'sastra_majapahit.png'),
(7, 2, 'Maritim', 'maritim_majapahit.png'),
(8, 2, 'Seni', 'seni_majapahit.png'),
(9, 3, 'Arkeologi', 'arkeo_kutai.png'),
(10, 3, 'Kerajaan', 'kerajaan_kutai.png'),
(11, 3, 'Keagamaan', 'keagamaan_kutai.png'),
(12, 3, 'Seni', 'seni_kutai.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekomendasi`
--

CREATE TABLE `rekomendasi` (
  `id_kerajaan` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `gambar` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekomendasi`
--

INSERT INTO `rekomendasi` (`id_kerajaan`, `nama`, `kategori`, `lokasi`, `gambar`, `deskripsi`) VALUES
(1, 'Sriwijaya', 'Hindu-Buddha', 'Sumatera', 'sriwijaya1.jpg', 'Kerajaan Sriwijaya adalah kerajaan maritim besar yang menguasai jalur perdagangan di Asia Tenggara.'),
(2, 'Majapahit', 'Hindu-Buddha', 'Jawa Timur', 'majapahit1.jpg', 'Kerajaan Majapahit adalah kerajaan terbesar di Nusantara yang mencapai puncak kejayaan pada masa Hayam Wuruk.'),
(3, 'Kutai', 'Hindu-Buddha', 'Kalimantan', 'kutai.jpg', 'Kerajaan tertua di Indonesia yang meninggalkan prasasti Yupa sebagai bukti peradaban Hindu awal di Nusantara.'),
(4, 'Mataram Kuno', 'Hindu-Buddha', 'Jawa Tengah', 'mataram.jpg', 'Kerajaan agraris yang terkenal dengan pembangunan candi-candi besar seperti Borobudur dan Prambanan.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`) VALUES
(2, 'aca@gmail.com', '$2y$10$Yo84fHHugfFQJ9H983nfKe9hiUxlfNMNBRkstHMfKtU25B1abonnq'),
(3, 'saskia@gmail.com', '$2y$10$BkzMTI/S/nFNgc9Bn/tPm.vzatq6JfxxnG9IZTIKoVBoX4zOly50G'),
(4, 'nayla@gmail.com', '$2y$10$4tPBVAuyJEyMmqtqx9VnpezhQqMMZGsHuFLG92opOgdCXgTvr9ro6'),
(5, 'adla@gmail.com', '$2y$10$I51vSdXW11U3sJYRpqyI5./bfTIFNjdoiMHLbnRh8vrq8uoqcGIaS'),
(6, 'cardiana@gmail.com', '$2y$10$lxA/./O.EgszkthKZKbnfOOf8sUzv.zz.WWpOdO9EYIGd36N/egiS');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indeks untuk tabel `kerajaan`
--
ALTER TABLE `kerajaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kingdom_id` (`kingdom_id`);

--
-- Indeks untuk tabel `kingdoms`
--
ALTER TABLE `kingdoms`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kingdom_events`
--
ALTER TABLE `kingdom_events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kingdom_id` (`kingdom_id`);

--
-- Indeks untuk tabel `kingdom_timelines`
--
ALTER TABLE `kingdom_timelines`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kingdom_id` (`kingdom_id`);

--
-- Indeks untuk tabel `kingdom_warisan`
--
ALTER TABLE `kingdom_warisan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kingdom_id` (`kingdom_id`);

--
-- Indeks untuk tabel `rekomendasi`
--
ALTER TABLE `rekomendasi`
  ADD PRIMARY KEY (`id_kerajaan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kerajaan`
--
ALTER TABLE `kerajaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kingdoms`
--
ALTER TABLE `kingdoms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kingdom_events`
--
ALTER TABLE `kingdom_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kingdom_timelines`
--
ALTER TABLE `kingdom_timelines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `kingdom_warisan`
--
ALTER TABLE `kingdom_warisan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `rekomendasi`
--
ALTER TABLE `rekomendasi`
  MODIFY `id_kerajaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kerajaan`
--
ALTER TABLE `kerajaan`
  ADD CONSTRAINT `kerajaan_ibfk_1` FOREIGN KEY (`kingdom_id`) REFERENCES `kingdoms` (`id`) ON DELETE SET NULL;

--
-- Ketidakleluasaan untuk tabel `kingdom_events`
--
ALTER TABLE `kingdom_events`
  ADD CONSTRAINT `kingdom_events_ibfk_1` FOREIGN KEY (`kingdom_id`) REFERENCES `kingdoms` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kingdom_timelines`
--
ALTER TABLE `kingdom_timelines`
  ADD CONSTRAINT `kingdom_timelines_ibfk_1` FOREIGN KEY (`kingdom_id`) REFERENCES `kingdoms` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kingdom_warisan`
--
ALTER TABLE `kingdom_warisan`
  ADD CONSTRAINT `kingdom_warisan_ibfk_1` FOREIGN KEY (`kingdom_id`) REFERENCES `kingdoms` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
