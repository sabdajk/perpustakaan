<?php
$host = "127.0.0.1";
$username = "root";
$password = "";
$database_name = "perpustakaan";
$connection = mysqli_connect($host, $username, $password, $database_name);

// === FUNCTION KHUSUS ADMIN START ===

// MENAMPILKAN DATA KATEGORI BUKU
function queryReadData($dataKategori) {
  global $connection;
  $result = mysqli_query($connection, $dataKategori);
  $items = [];
  while($item = mysqli_fetch_assoc($result)) {
    $items[] = $item;
  }     
  return $items;
}

// Menambahkan data buku 
function tambahBuku($dataBuku) {
  global $connection;
  
  $cover = upload();
  $idBuku = htmlspecialchars($dataBuku["id_buku"]);
  $kategoriBuku = $dataBuku["kategori"];
  $judulBuku = htmlspecialchars($dataBuku["judul"]);
  $pengarangBuku = htmlspecialchars($dataBuku["pengarang"]);
  $penerbitBuku = htmlspecialchars($dataBuku["penerbit"]);
  $tahunTerbit = $dataBuku["tahun_terbit"];
  $jumlahHalaman = $dataBuku["jumlah_halaman"];
  $deskripsiBuku = htmlspecialchars($dataBuku["buku_deskripsi"]);
  
  if(!$cover) {
    return 0;
  } 
  
  // Menyusun query dengan penamaan kolom
  $queryInsertDataBuku = "INSERT INTO buku (cover, id_buku, kategori, judul, pengarang, penerbit, tahun_terbit, jumlah_halaman, buku_deskripsi) 
                          VALUES ('$cover', '$idBuku', '$kategoriBuku', '$judulBuku', '$pengarangBuku', '$penerbitBuku', '$tahunTerbit', $jumlahHalaman, '$deskripsiBuku')";
  
  mysqli_query($connection, $queryInsertDataBuku);
  return mysqli_affected_rows($connection);
}


// Function upload gambar 
function upload() {
  $namaFile = $_FILES["cover"]["name"];
  $ukuranFile = $_FILES["cover"]["size"];
  $error = $_FILES["cover"]["error"];
  $tmpName = $_FILES["cover"]["tmp_name"];
  
  // cek apakah ada gambar yg diupload
  if($error === 4) {
    echo "<script>
    alert('Silahkan upload cover buku terlebih dahulu!')
    </script>";
    return 0;
  }
  
  // cek kesesuaian format gambar
  $jpg = "jpg";
  $jpeg = "jpeg";
  $png = "png";
  $svg = "svg";
  $bmp = "bmp";
  $psd = "psd";
  $tiff = "tiff";
  $formatGambarValid = [$jpg, $jpeg, $png, $svg, $bmp, $psd, $tiff];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  
  if(!in_array($ekstensiGambar, $formatGambarValid)) {
    echo "<script>
    alert('Format file tidak sesuai');
    </script>";
    return 0;
  }
  
  // batas ukuran file
  if($ukuranFile > 2000000) {
    echo "<script>
    alert('Ukuran file terlalu besar!');
    </script>";
    return 0;
  }
  
   //generate nama file baru, agar nama file tdk ada yg sama
  $namaFileBaru = uniqid();
  $namaFileBaru .= ".";
  $namaFileBaru .= $ekstensiGambar;
  
  move_uploaded_file($tmpName, '../../imgDB/' . $namaFileBaru);
  return $namaFileBaru;
} 

// MENAMPILKAN SESUATU SESUAI DENGAN INPUTAN USER PADA * SEARCH ENGINE *
function search($keyword) {
  global $connection;
  // search data buku
  $querySearch = "SELECT * FROM buku 
  WHERE
  judul LIKE '%$keyword%' OR
  kategori LIKE '%$keyword%'";
  
  $result = mysqli_query($connection, $querySearch);
  $items = [];
  while($item = mysqli_fetch_assoc($result)) {
    updateBookPopularity($item["id_buku"]); // Update popularitas buku
    $items[] = $item;
  }
  return $items;
}


function searchMember ($keyword) {
  // search member terdaftar || admin
   $searchMember = "SELECT * FROM member WHERE 
   nisn LIKE '%$keyword%' OR 
   kode_member LIKE '%$keyword%' OR
   nama LIKE '%$keyword%' OR 
   jurusan LIKE '%$keyword%'
   ";
   return queryReadData($searchMember);
}


// DELETE DATA Buku
function delete($bukuId) {
  global $connection;
  $queryDeleteBuku = "DELETE FROM buku WHERE id_buku = '$bukuId'
  ";
  mysqli_query($connection, $queryDeleteBuku);
  
  return mysqli_affected_rows($connection);
}

// UPDATE || EDIT DATA BUKU 
function updateBuku($dataBuku) {
  global $connection;

  $gambarLama = htmlspecialchars($dataBuku["coverLama"]);
  $idBuku = htmlspecialchars($dataBuku["id_buku"]);
  $kategoriBuku = $dataBuku["kategori"];
  $judulBuku = htmlspecialchars($dataBuku["judul"]);
  $pengarangBuku = htmlspecialchars($dataBuku["pengarang"]);
  $penerbitBuku = htmlspecialchars($dataBuku["penerbit"]);
  $tahunTerbit = $dataBuku["tahun_terbit"];
  $jumlahHalaman = $dataBuku["jumlah_halaman"];
  $deskripsiBuku = htmlspecialchars($dataBuku["buku_deskripsi"]);
  
  
  // pengecekan mengganti gambar || tidak
  if($_FILES["cover"]["error"] === 4) {
    $cover = $gambarLama;
  }else {
    $cover = upload();
  }
  // 4 === gagal upload gambar
  // 0 === berhasil upload gambar
  
  $queryUpdate = "UPDATE buku SET 
  cover = '$cover',
  id_buku = '$idBuku',
  kategori = '$kategoriBuku',
  judul = '$judulBuku',
  pengarang = '$pengarangBuku',
  penerbit = '$penerbitBuku',
  tahun_terbit = '$tahunTerbit',
  jumlah_halaman = $jumlahHalaman,
  buku_deskripsi = '$deskripsiBuku'
  WHERE id_buku = '$idBuku'
  ";
  
  mysqli_query($connection, $queryUpdate);
  return mysqli_affected_rows($connection);
}

// Hapus member yang terdaftar
function deleteMember($nisnMember) {
  global $connection;
  
  $deleteMember = "DELETE FROM member WHERE nisn = $nisnMember";
  mysqli_query($connection, $deleteMember);
  return mysqli_affected_rows($connection);
}

// Hapus history pengembalian data BUKU
function deleteDataPengembalian($idPengembalian) {
  global $connection;
  
  $deleteDataPengembalianBuku = "DELETE FROM pengembalian WHERE id_pengembalian = $idPengembalian";
  mysqli_query($connection, $deleteDataPengembalianBuku);
  return mysqli_affected_rows($connection);
}


// === FUNCTION KHUSUS ADMIN END ===


// === FUNCTION KHUSUS MEMBER START ===
// Peminjaman BUKU
function pinjamBuku($dataBuku) {
  global $connection;
  
  $idBuku = $dataBuku["id_buku"];
  $nisn = $dataBuku["nisn"];
  $idAdmin = $dataBuku["id"];
  $tglPinjam = $dataBuku["tgl_peminjaman"];
  $tglKembali = date('Y-m-d', strtotime($tglPinjam. ' + 7 days'));

  // cek apakah user memiliki denda 
  $cekDenda = mysqli_query($connection, "SELECT denda FROM pengembalian WHERE nisn = $nisn && denda > 0");
  if(mysqli_num_rows($cekDenda) > 0) {
    $item = mysqli_fetch_assoc($cekDenda);
    $jumlahDenda = $item["denda"];
    if($jumlahDenda > 0) {
       echo "<script>
       alert('Anda belum melunasi denda, silahkan lakukan pembayaran terlebih dahulu !');
       </script>";
       return 0;
    }
  }
  // cek batas user meminjam buku berdasarkan nisn
  $cekJumlahPinjam = mysqli_query($connection, "SELECT COUNT(*) AS jumlah_pinjam FROM peminjaman WHERE nisn = $nisn");
  $jumlahPinjam = mysqli_fetch_assoc($cekJumlahPinjam)['jumlah_pinjam'];
  // batas bisa diubah
  if($jumlahPinjam >= 3) { 
    echo "<script>
    alert('Anda sudah mencapai batas maksimal peminjaman buku (3 buku)');
    </script>";
    return 0;
  }
  
  $queryPinjam = "INSERT INTO peminjaman VALUES(null, '$idBuku', $nisn, $idAdmin, '$tglPinjam', '$tglKembali')";
  mysqli_query($connection, $queryPinjam);
  return mysqli_affected_rows($connection);
}

function pengembalian($dataBuku) {
  global $connection;
  
  // Variabel pengembalian
  $idPeminjaman = $dataBuku["id_peminjaman"];
  $idBuku = $dataBuku["id_buku"];
  $nisn = $dataBuku["nisn"];
  $idAdmin = $dataBuku["id_admin"];
  $tenggatPengembalian = $dataBuku["tgl_pengembalian"];
  $bukuKembali = $dataBuku["buku_kembali"];
  
  $keterlambatan = (strtotime($bukuKembali) > strtotime($tenggatPengembalian)) ? 'Ya' : 'Tidak';
  $denda = (strtotime($bukuKembali) > strtotime($tenggatPengembalian)) ? 10000 : 0;

  // Menghapus data siswa yang sudah mengembalikan buku
  $hapusDataPeminjam = "DELETE FROM peminjaman WHERE id_peminjaman = $idPeminjaman";

  // Memasukkan data kedalam tabel pengembalian
  $queryPengembalian = "INSERT INTO pengembalian VALUES(null, $idPeminjaman, '$idBuku', $nisn, $idAdmin, '$bukuKembali', '$keterlambatan', $denda)";

  mysqli_query($connection, $hapusDataPeminjam);
  mysqli_query($connection, $queryPengembalian);
  return mysqli_affected_rows($connection);
}


function bayarDenda($data) {
  global $connection;
  $idPengembalian = $data["id_pengembalian"];
  $jmlDenda = $data["denda"];
  $jmlDibayar = $data["bayarDenda"];
  $calculate = $jmlDenda - $jmlDibayar;
  
  $bayarDenda = "UPDATE pengembalian SET denda = $calculate WHERE id_pengembalian = $idPengembalian";
  mysqli_query($connection, $bayarDenda);
  return mysqli_affected_rows($connection);
}

// Notifikasi
function getBooksCloseToDueDate($nisn) {
  global $connection;
  $query = "SELECT b.judul, p.tgl_pengembalian 
            FROM peminjaman p 
            JOIN buku b ON p.id_buku = b.id_buku 
            WHERE p.nisn = ? 
            AND p.tgl_pengembalian <= DATE_ADD(CURDATE(), INTERVAL 2 DAY)
            AND p.tgl_pengembalian >= CURDATE()";
  $stmt = $connection->prepare($query);
  $stmt->bind_param("s", $nisn);
  $stmt->execute();
  $result = $stmt->get_result();
  $books = [];
  while ($book = $result->fetch_assoc()) {
      $books[] = $book;
  }
  $stmt->close();
  return $books;
}

// Update buku popularitas
function updateBookPopularity($idBuku) {
  global $connection;
  $queryUpdatePopularity = "UPDATE buku SET popularity = popularity + 1 WHERE id_buku = '$idBuku'";
  mysqli_query($connection, $queryUpdatePopularity);
}

// Mendapatkan buku populer
function getPopularBooks() {
  global $connection;
  $queryGetPopularBooks = "SELECT * FROM buku WHERE popularity > 5 ORDER BY popularity DESC LIMIT 10";
  return queryReadData($queryGetPopularBooks);
}


// === FUNCTION KHUSUS MEMBER END ===
?>

