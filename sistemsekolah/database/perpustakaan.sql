-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jul 2024 pada 16.03
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL,
  `kode_admin` varchar(12) NOT NULL,
  `no_tlp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `nama_admin`, `password`, `kode_admin`, `no_tlp`) VALUES
(1, 'Alex', '1234', 'admin1', '085749051409'),
(2, 'Putri', '4321', 'admin2', '085870283409');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `cover` varchar(255) NOT NULL,
  `id_buku` varchar(20) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` date NOT NULL,
  `jumlah_halaman` int(11) NOT NULL,
  `buku_deskripsi` text NOT NULL,
  `popularity` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`cover`, `id_buku`, `kategori`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `jumlah_halaman`, `buku_deskripsi`, `popularity`) VALUES
('654e505d7eda4.jpg', 'bis01', 'bisnis', 'Bussiness is fun', 'Coach yohannes g pauly', 'Rejove', '2016-11-10', 500, '7 strategi untuk membangun bisnis', 0),
('654e62742ef40.jpg', 'bis02', 'bisnis', 'Digital Marketing Strategy', 'Simon kings north', '-', '2023-11-11', 250, 'Belajar strategi pemasaran digital', 0),
('654e4dc4dc0c6.jpg', 'fil01', 'filsafat', 'Filosofi Teras', 'Henry Manampiring ', 'Kompas', '2018-11-26', 320, 'Filosofi Teras adalah sebuah buku pengantar filsafat Stoa yang dibuat khusus sebagai panduan moral anak muda. Buku ini ditulis untuk menjawab permasalahan tentang tingkat kekhawatiran yang cukup tinggi dalam skala nasional, terutama yang dialami oleh anak muda.', 0),
('654e4f5e85f75.jpg', 'fil02', 'filsafat', 'Sejarah dunia yang disembunyikan ', 'Jonathan Black ', '-', '2007-11-10', 633, 'Banyak orang mengatakan bahwa sejarah ditulis oleh para pemenang. Hal ini sama sekali tak mengejutkan alias wajar belaka. Tetapi, bagaimana jika sejarahâ€”atau apa yang kita ketahui sebagai sejarahâ€”ditulis oleh orang yang salah? ', 6),
('654e48e1a1680.jpg', 'inf01', 'informatika', 'Dasar dasar pemrogramman web', 'Sandhika Galih ', 'Inkara', '2023-10-18', 414, 'Website di era sekarang sudah menjadi kebutuhan utama yang tidak bisa diabaikan. Seluruh sektor bisnis atau edukasi dapat memanfaatkan website sebagai alat untuk promosi, tukar informasi, dan lainnya. Berdasarkan data dari World Wide Web Technology Surveys, dari seluruh website yang aktif, 88.2% menggunakan HTML dan 95.6% menggunakan CSS. Buku ini membahas tuntas mengenai HTML dan CSS sebagai fondasi dalam pembuatan website serta dilengkapi dengan Studi Kasus yang Relevan dan sesuai trend.', 1),
('654e4a1c80441.jpg', 'inf02', 'informatika', 'Kursus Mandiri Python', 'Budi Raharjo', 'Informatika', '2022-05-10', 550, 'Belajar pemrogramman python dengan 5 tahapan yaitu : \r\n1. Dasar dasar python\r\n2. PBO(OOP)\r\n3. Eksplorasi Pustaka\r\n4. SQL &amp; MySql\r\n5. Pemrogramman GUI', 4),
('654e4b44d4d0e.png', 'inf03', 'informatika', 'Pemrogramman Javascript Dan NodeJS untuk teknologi web', 'Budi Raharjo', 'Informatika', '2022-09-16', 500, 'Panduan membuat sistem aplikasi berbasis web dengan javascript dan nodeJs', 0),
('654e4c1154bdd.jpg', 'inf04', 'informatika', 'Panduan Dasar ubuntu untuk pemula', 'Muhammad Ulil Fahri', 'Informatika', '2017-11-10', 404, 'Panduan awal ubuntu untuk pemula', 4),
('654e4cd06e0de.jpeg', 'inf05', 'informatika', 'Belajar dasar Pemrogramman C++', 'Muhammad Taufik Dwi Putra', 'Informatika', '2018-11-10', 512, 'Panduan dasar belajar pemrogramman C++ untuk pemula', 1),
('654e3d8b359df.jpg', 'nov01', 'novel', 'Dunia Sophie', 'Jostein Gardeer', 'Mizan', '1996-11-10', 800, 'Anda ingin tahu apa filsafat,  tetapi selalu tidak sempat,  terlalu kabur, abstrak, susah dan bertele tele?  Bacalah buku manis ini dimana sophie anak putri 14 tahun, menjadi terpesona karenanya. ', 0),
('654e402a8ad79.jpg', 'nov02', 'novel', 'Perahu Kertas', 'Dewi Lestari', 'Bentang Pustaka', '2003-11-10', 444, 'Perahu Kertas bercerita tentang dua orang yang sama-sama unik bernama Kugy dan Keenan. ', 0),
('654e4417e323e.jpeg', 'nov03', 'novel', 'Pulang', 'Tere Liye ', 'Sabak grip Nusantara ', '2015-11-10', 838, 'Pulangâ€ ini adalah novel yang menceritakan perjalanan hidup seorang anak laki-laki bernama Bujang, yang sejak berumur lima belas tahun di sebuah hutan rimba pedalaman Sumatera, rasa takutnya telah direnggut oleh seekor monster mengerikan (induk babi hutan).', 0),
('654e456c2e275.jpg', 'nov04', 'novel', 'Surat Kecil Untuk Tuhan', 'Agnes Danovar', 'Inandra Publised', '2008-11-10', 200, 'Surat kecil untuk Tuhan adalah sebuah buku yang diangkat dari kisah nyata perjuangan gadis remaja bernama Gita Sesa Wanda Cantika alias Keke melawan kanker ganas.', 0),
('654e46a08484e.jpg', 'nov05', 'novel', 'Ancika : dia yang bersamaku tahun 1995', 'Pidi baiq', 'Pastel books', '2021-09-02', 180, 'menceritakan tentang persahabatan antara Dilan dan Ancika Mehrunisa Rabu. Hubungan mereka yang semakin dekat membuat benih-benih cinta tumbuh dan hubungan mereka pun naik tingkat menjadi hubungan sepasang kekasih.', 0),
('654e63b7841f5.jpg', 'sai01', 'sains', 'Cosmos', 'Karl sagan', '-', '2016-12-18', 488, 'Buku â€œKOSMOSâ€ adalah salah satu buku sains yang paling laris sepanjang sejarah. Dengan prosa jernih yang memukau, ahli astronomi Carl Sagan mengungkapkan alam semesta yang dihuni oleh suatu bentuk kehidupan yang baru saja mulai berpetualang menjelajahi luasnya antariksa.', 0),
('654e64ee16c9a.jpg', 'sai02', 'sains', 'Kanker : Biografi suatu penyakit', 'Siddhartha mukherjee', '-', '2020-04-16', 682, 'kanker bukan hanya satu penyakit, melainkan banyak penyakit dengan ciri sama: pertumbuhan sel tak terkendali. Melawan kanker seolah melawan tubuh yang berkhianat: sel-sel kita sendiri yang berubah jadi ganas dan lepas kendali.', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_buku`
--

INSERT INTO `kategori_buku` (`kategori`) VALUES
('bisnis'),
('filsafat'),
('informatika'),
('novel'),
('sains');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `nisn` int(11) NOT NULL,
  `kode_member` varchar(12) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `tgl_pendaftaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`nisn`, `kode_member`, `nama`, `password`, `jenis_kelamin`, `kelas`, `jurusan`, `no_tlp`, `tgl_pendaftaran`) VALUES
(110000123, '321', 'noah', '$2y$10$o.XuMw9FhWd87awGau0c7ujQo7gRD2WDGPwSV6YOuE05l20UgCjoK', 'Laki laki', 'X', 'Teknik Konstruksi Perumahan', '0858748374834', '2024-07-13'),
(1200001222, '123', 'kaslana', '$2y$10$B0SKoFI9LREWtAfgkykdeuzI6Xo3Iycb0l0VTVMJZpP/ZeK9fI1T.', 'Perempuan', 'XII', 'Sistem Informatika Jaringan dan Aplikasi', '089734547463', '2024-07-13'),
(1300001200, '1122', 'sofia', '$2y$10$0OfmQdmmr4uIjFCgzdUhDelLiNQsFly7D782h2WvK5jiicll1xyTu', 'Perempuan', 'XI', 'Rekayasa Perangkat Lunak', '085347834783', '2024-07-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` varchar(20) NOT NULL,
  `nisn` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_pengembalian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_buku`, `nisn`, `id_admin`, `tgl_peminjaman`, `tgl_pengembalian`) VALUES
(105, 'fil01', 1200001222, 1, '2024-07-08', '2024-07-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` varchar(20) NOT NULL,
  `nisn` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `buku_kembali` date NOT NULL,
  `keterlambatan` enum('YA','TIDAK') NOT NULL,
  `denda` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_peminjaman`, `id_buku`, `nisn`, `id_admin`, `buku_kembali`, `keterlambatan`, `denda`) VALUES
(77, 101, 'fil02', 1200001222, 1, '2024-07-13', 'TIDAK', 0),
(78, 102, 'inf02', 1200001222, 1, '2024-07-13', 'TIDAK', 0),
(79, 102, 'inf02', 1200001222, 1, '2024-07-13', 'TIDAK', 0),
(80, 103, 'fil02', 1200001222, 2, '2024-07-13', 'TIDAK', 0),
(81, 104, 'fil01', 1200001222, 1, '2024-07-13', 'TIDAK', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(11) NOT NULL,
  `endpoint` text NOT NULL,
  `keys_auth` text NOT NULL,
  `keys_p256dh` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `endpoint`, `keys_auth`, `keys_p256dh`, `created_at`) VALUES
(1, 'https://fcm.googleapis.com/fcm/send/fa6AphOG1Cs:APA91bGmCjnrhj6FgiVmEdUPbpXPA4mNpJkz-3LXKbOvZBbxZSLFmqjGVHs6v8lFWW9iYY8snBSXVA6R5HGZi0Y6vRZLq_Ss51wrVGZX5SUwkW3ynjCR3DjfWi1tqb1N2Faikbkp5PQa', 'o1U_9N5jjWqMGGw88uLt0Q', 'BPFzkXn8r-HaFZ3QnW-XZLhfRL2VP_CdEZmtMjTUKKQf145cBDOSPq1zp5KWeRUkJIlVp3EK6hBE882zhX9pPYQ', '2024-07-12 23:28:29'),
(2, 'https://fcm.googleapis.com/fcm/send/cUv1DEhVREQ:APA91bERndG_Z2iR6BfBaqeplhkb_A2ZCVnWMwacQ3EfJVB7LVxO3DPGjsqjMhaly-mlmScR67Y-cPBaL5hzKi_EuwsmNndUSpfemM5Irm8iBx-eIhwqqx-_trtRsuCBUt_FeBdWhoOY', 'mZErGmAhBSWGIFuwS2NyoQ', 'BKjvr7HOjC-iLTe_5ZyqdlI2rnKMetqoLXIO3n78UAWJ0Ajjp6Ze_bFM1IPnmTHQx-B2KkqWEj1-ddRAijmgxIQ', '2024-07-12 20:50:54'),
(3, 'https://fcm.googleapis.com/fcm/send/dRXEojqMKMU:APA91bGjc1HmbBEX_ZGtKcZpH3kyHGOg515wXVdxq4_09hFZCw4c9qUraHVF5hy1jXGMPYKVRCbsavexCoiRYmrCeqZhIdQaV0LrYfnn-qfZswH5mdDEML9k3K1mztcej96ztYq_FvLS', '3YIoifNYl3nV3HBKUflPHw', 'BPBzakuNYMZdA3eSXyTEpiTyme7-zFXVamsN28OsvXsZy6LdgRT5A2RCEAMiXcCZtwZOGDM1LY7kBNd-fV6yVPE', '2024-07-13 04:23:44');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_admin` (`kode_admin`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `kategori` (`kategori`);

--
-- Indeks untuk tabel `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`kategori`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`nisn`),
  ADD UNIQUE KEY `kode_member` (`kode_member`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `id_peminjaman` (`id_peminjaman`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `kategori_buku` (`kategori`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`nisn`) REFERENCES `member` (`nisn`),
  ADD CONSTRAINT `peminjaman_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`);

--
-- Ketidakleluasaan untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `pengembalian_ibfk_3` FOREIGN KEY (`nisn`) REFERENCES `member` (`nisn`),
  ADD CONSTRAINT `pengembalian_ibfk_4` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
