-- Membuat database perpustakaan
CREATE DATABASE perpustakaan;

-- Menggunakan database perpustakaan
USE perpustakaan;

-- Membuat tabel admin
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_admin` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL,
  `kode_admin` varchar(12) NOT NULL UNIQUE,
  `no_tlp` varchar(13) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuat tabel buku
CREATE TABLE `buku` (
  `cover` varchar(255) NOT NULL,
  `id_buku` varchar(20) NOT NULL UNIQUE,
  `kategori` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` date NOT NULL,
  `jumlah_halaman` int(11) NOT NULL,
  `buku_deskripsi` text NOT NULL,
  PRIMARY KEY (`id_buku`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuat tabel kategori_buku
CREATE TABLE `kategori_buku` (
  `kategori` varchar(255) NOT NULL UNIQUE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuat tabel member
CREATE TABLE `member` (
  `nisn` int(11) NOT NULL UNIQUE,
  `kode_member` varchar(12) NOT NULL UNIQUE,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `tgl_pendaftaran` date NOT NULL,
  PRIMARY KEY (`nisn`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuat tabel peminjaman
CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT,
  `id_buku` varchar(20) NOT NULL,
  `nisn` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  PRIMARY KEY (`id_peminjaman`),
  FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  FOREIGN KEY (`nisn`) REFERENCES `member` (`nisn`),
  FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Membuat tabel pengembalian
CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT,
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` varchar(20) NOT NULL,
  `nisn` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `buku_kembali` date NOT NULL,
  `keterlambatan` enum('ya','tidak') NOT NULL,
  `denda` int(15) NOT NULL,
  PRIMARY KEY (`id_pengembalian`),
  FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`),
  FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  FOREIGN KEY (`nisn`) REFERENCES `member` (`nisn`),
  FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Mengisi tabel admin
INSERT INTO `admin` (`id`, `nama_admin`, `password`, `kode_admin`, `no_tlp`) VALUES
(1, 'sabda prathama', '12345', 'admin1', '085975258066'),
(2, 'Gibran Al Imrani', '12345', 'admin2', '085975258099'),
(3, 'Dara Safitri', '12345', 'admin3', '085975258077');

-- Mengisi tabel buku
INSERT INTO `buku` (`cover`, `id_buku`, `kategori`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `jumlah_halaman`, `buku_deskripsi`) VALUES
('654e505d7eda4.jpg', 'bis01', 'bisnis', 'Bussiness is fun', 'Coach yohannes g pauly', 'Rejove', '2016-11-10', 500, '7 strategi untuk membangun bisnis'),
('654e62742ef40.jpg', 'bis02', 'bisnis', 'Digital Marketing Strategy', 'Simon kings north', '-', '2023-11-11', 250, 'Belajar strategi pemasaran digital'),
('654e4dc4dc0c6.jpg', 'fil01', 'filsafat', 'Filosofi Teras', 'Henry Manampiring ', 'Kompas', '2018-11-26', 320, 'Filosofi Teras adalah sebuah buku pengantar filsafat Stoa yang dibuat khusus sebagai panduan moral anak muda. Buku ini ditulis untuk menjawab permasalahan tentang tingkat kekhawatiran yang cukup tinggi dalam skala nasional, terutama yang dialami oleh anak muda.'),
('654e4f5e85f75.jpg', 'fil02', 'filsafat', 'Sejarah dunia yang disembunyikan ', 'Jonathan Black ', '-', '2007-11-10', 633, 'Banyak orang mengatakan bahwa sejarah ditulis oleh para pemenang. Hal ini sama sekali tak mengejutkan alias wajar belaka. Tetapi, bagaimana jika sejarahâ€”atau apa yang kita ketahui sebagai sejarahâ€”ditulis oleh orang yang salah? '),
('654e48e1a1680.jpg', 'inf01', 'informatika', 'Dasar dasar pemrogramman web', 'Sandhika Galih ', 'Inkara', '2023-10-18', 414, 'Website di era sekarang sudah menjadi kebutuhan utama yang tidak bisa diabaikan. Seluruh sektor bisnis atau edukasi dapat memanfaatkan website sebagai alat untuk promosi, tukar informasi, dan lainnya. Berdasarkan data dari World Wide Web Technology Surveys, dari seluruh website yang aktif, 88.2% menggunakan HTML dan 95.6% menggunakan CSS. Buku ini membahas tuntas mengenai HTML dan CSS sebagai fondasi dalam pembuatan website serta dilengkapi dengan Studi Kasus yang Relevan dan sesuai trend.'),
('654e4a1c80441.jpg', 'inf02', 'informatika', 'Kursus Mandiri Python', 'Budi Raharjo', 'Informatika', '2022-05-10', 550, 'Belajar pemrogramman python dengan 5 tahapan yaitu : \r\n1. Dasar dasar python\r\n2. PBO(OOP)\r\n3. Eksplorasi Pustaka\r\n4. SQL &amp; MySql\r\n5. Pemrogramman GUI'),
('654e4b44d4d0e.png', 'inf03', 'informatika', 'Pemrogramman Javascript Dan NodeJS untuk teknologi web', 'Budi Raharjo', 'Informatika', '2022-09-16', 500, 'Panduan membuat sistem aplikasi berbasis web dengan javascript dan nodeJs'),
('654e4c1154bdd.jpg', 'inf04', 'informatika', 'Panduan Dasar ubuntu untuk pemula', 'Muhammad Ulil Fahri', 'Informatika', '2017-11-10', 404, 'Panduan awal ubuntu untuk pemula'),
('654e4cd06e0de.jpeg', 'inf05', 'informatika', 'Belajar dasar Pemrogramman C++', 'Muhammad Taufik Dwi Putra', 'Informatika', '2018-11-10', 512, 'Panduan dasar belajar pemrogramman C++ untuk pemula'),
('654e3d8b359df.jpg', 'nov01', 'novel', 'Dunia Sophie', 'Jostein Gardeer', 'Mizan', '1996-11-10', 800, 'Anda ingin tahu apa filsafat,  tetapi selalu tidak sempat,  terlalu kabur, abstrak, susah dan bertele tele?  Bacalah buku manis ini dimana sophie anak putri 14 tahun, menjadi terpesona karenanya. '),
('654e402a8ad79.jpg', 'nov02', 'novel', 'Perahu Kertas', 'Dewi Lestari', 'Bentang Pustaka', '2003-11-10', 444, 'Perahu Kertas bercerita tentang dua orang yang sama-sama unik bernama Kugy dan Keenan. '),
('654e4417e323e.jpeg', 'nov03', 'novel', 'Pulang', 'Tere Liye ', 'Sabak grip Nusantara ', '2015-11-10', 838, 'Pulangâ€ ini adalah novel yang menceritakan perjalanan hidup seorang anak laki-laki bernama Bujang, yang sejak berumur lima belas tahun di sebuah hutan rimba pedalaman Sumatera, rasa takutnya telah direnggut oleh seekor monster mengerikan (induk babi hutan).'),
('654e456c2e275.jpg', 'nov04', 'novel', 'Surat Kecil Untuk Tuhan', 'Agnes Danovar', 'Inandra Publised', '2008-11-10', 200, 'Surat kecil untuk Tuhan adalah sebuah buku yang diangkat dari kisah nyata perjuangan gadis remaja bernama Gita Sesa Wanda Cantika alias Keke melawan kanker ganas.'),
('654e46a08484e.jpg', 'nov05', 'novel', 'Ancika : dia yang bersamaku tahun 1995', 'Pidi baiq', 'Pastel books', '2021-09-02', 180, 'menceritakan tentang persahabatan antara Dilan dan Ancika Mehrunisa Rabu. Hubungan mereka yang semakin dekat membuat benih-benih cinta tumbuh dan hubungan mereka pun naik tingkat menjadi hubungan sepasang kekasih.'),
('654e63b7841f5.jpg', 'sai01', 'sains', 'Cosmos', 'Karl sagan', '-', '2016-12-18', 488, 'Buku â€œKOSMOSâ€ adalah salah satu buku sains yang paling laris sepanjang sejarah. Dengan prosa jernih yang memukau, ahli astronomi Carl Sagan mengungkapkan alam semesta yang dihuni oleh suatu bentuk kehidupan yang baru saja mulai berpetualang menjelajahi luasnya antariksa.'),
('654e64ee16c9a.jpg', 'sai02', 'sains', 'Kanker : Biografi suatu penyakit', 'Siddhartha mukherjee', '-', '2020-04-16', 682, 'kanker bukan hanya satu penyakit, melainkan banyak penyakit dengan ciri sama: pertumbuhan sel tak terkendali. Melawan kanker seolah melawan tubuh yang berkhianat: sel-sel kita sendiri yang berubah jadi ganas dan lepas kendali.');

-- Mengisi tabel kategori_buku
INSERT INTO `kategori_buku` (`kategori`) VALUES
('bisnis'),
('filsafat'),
('informatika'),
('novel'),
('sains');

-- Mengisi tabel member
INSERT INTO `member` (`nisn`, `kode_member`, `nama`, `password`, `jenis_kelamin`, `kelas`, `jurusan`, `no_tlp`, `tgl_pendaftaran`) VALUES
(1234567890, 'M001', 'Ahmad', 'password123', 'Laki-laki', '10', 'IPA', '081234567890', '2023-01-01'),
(2345678901, 'M002', 'Aisyah', 'password456', 'Perempuan', '11', 'IPS', '082345678901', '2023-02-01');


-- Memeriksa isi tabel admin
SELECT * FROM `admin`;

-- Memeriksa isi tabel buku
SELECT * FROM `buku`;

-- Memeriksa isi tabel kategori_buku
SELECT * FROM `kategori_buku`;

-- Memeriksa isi tabel member
SELECT * FROM `member`;

-- Memeriksa isi tabel peminjaman
SELECT * FROM `peminjaman`;

-- Memeriksa isi tabel pengembalian
SELECT * FROM `pengembalian`;
