<?php 
session_start();

if(!isset($_SESSION["signIn"])) {
  header("Location: ../../sign/member/sign_in.php");
  exit;
}

require "../../config/config.php";

// Tangkap id buku dari URL (GET)
$idBuku = $_GET["id"];
$query = queryReadData("SELECT * FROM buku WHERE id_buku = '$idBuku'");
// Menampilkan data siswa yg sedang login
$nisnSiswa = $_SESSION["member"]["nisn"];
$dataSiswa = queryReadData("SELECT * FROM member WHERE nisn = $nisnSiswa");
$admin = queryReadData("SELECT * FROM admin");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Form pinjam Buku || Member</title>
  </head>
  <style>
    .layout-card-custom {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 1.5rem;
    }
  </style>
  <body>
    <?php
      // Peminjaman 
if(isset($_POST["pinjam"])) {
  if(pinjamBuku($_POST) > 0) {
    echo "<script>
            Swal.fire({
              icon: 'success',
              title: 'Sukses!',
              text: 'Buku berhasil dipinjam',
              showConfirmButton: false,
              timer: 6000
            });
          </script>";
  } else {
    echo "<script>
            Swal.fire({
              icon: 'error',
              title: 'Oops!',
              text: 'Buku gagal dipinjam!',
              showConfirmButton: false,
              timer: 6000
            });
          </script>";
  }
}
    ?>
    <nav class="navbar fixed-top bg-body-tertiary shadow-sm">
      <div class="container-fluid p-3">
        <a class="navbar-brand" href="#">
          <img src="../../assets/logoNav.png" alt="logo" width="120px">
        </a>
        <a class="btn btn-tertiary" href="../dashboardMember.php">Dashboard</a>
      </div>
    </nav>

    <div class="p-4 mt-5">
      <h2 class="mt-5">Form peminjaman Buku</h2>
      <div class="card">
        <h5 class="card-header">Data Lengkap buku</h5>
        <div class="card-body d-flex flex-wrap gap-5 justify-content-center">
          <?php foreach ($query as $item) : ?>
          <p class="card-text">
            <img src="../../imgDB/<?= $item["cover"]; ?>" width="180px" height="185px" style="border-radius: 5px;">
          </p>
          <form action="" method="post">
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Id Buku</span>
              <input type="text" class="form-control" value="<?= $item["id_buku"]; ?>" readonly>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Kategori</span>
              <input type="text" class="form-control" value="<?= $item["kategori"]; ?>" readonly>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Judul</span>
              <input type="text" class="form-control" value="<?= $item["judul"]; ?>" readonly>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Pengarang</span>
              <input type="text" class="form-control" value="<?= $item["pengarang"]; ?>" readonly>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Penerbit</span>
              <input type="text" class="form-control" value="<?= $item["penerbit"]; ?>" readonly>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Tahun Terbit</span>
              <input type="date" class="form-control" value="<?= $item["tahun_terbit"]; ?>" readonly>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Jumlah Halaman</span>
              <input type="number" class="form-control" value="<?= $item["jumlah_halaman"]; ?>" readonly>
            </div>
            <div class="form-floating">
              <textarea class="form-control" style="height: 100px" readonly><?= $item["buku_deskripsi"]; ?></textarea>
              <label for="floatingTextarea2">Deskripsi Buku</label>
            </div>
          <?php endforeach; ?>
          </form>
        </div>
      </div>

      <div class="card mt-4">
        <h5 class="card-header">Data lengkap Siswa</h5>
        <div class="card-body d-flex flex-wrap gap-4 justify-content-center">
          <p><img src="../../assets/memberLogo.png" width="150px"></p>
          <form action="" method="post">
            <?php foreach ($dataSiswa as $item) : ?>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Nisn</span>
              <input type="number" class="form-control" value="<?= $item["nisn"]; ?>" readonly>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Kode Member</span>
              <input type="text" class="form-control" value="<?= $item["kode_member"]; ?>" readonly>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Nama</span>
              <input type="text" class="form-control" value="<?= $item["nama"]; ?>" readonly>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Jenis Kelamin</span>
              <input type="text" class="form-control" value="<?= $item["jenis_kelamin"]; ?>" readonly>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Kelas</span>
              <input type="text" class="form-control" value="<?= $item["kelas"]; ?>" readonly>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Jurusan</span>
              <input type="text" class="form-control" value="<?= $item["jurusan"]; ?>" readonly>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">No Tlp</span>
              <input type="text" class="form-control" value="<?= $item["no_tlp"]; ?>" readonly>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Tanggal Daftar</span>
              <input type="date" class="form-control" value="<?= $item["tgl_pendaftaran"]; ?>" readonly>
            </div>
            <?php endforeach; ?>
          </form>
        </div>
      </div>

      <div class="alert alert-danger mt-4" role="alert">Silahkan periksa kembali data diatas, pastikan sudah benar sebelum meminjam buku!. Jika ada kesalahan data harap hubungi admin</div>

      <div class="card mt-4">
        <h5 class="card-header">Form Pinjam Buku</h5>
        <div class="card-body">
          <form id="pinjamForm" action="" method="post">
            <?php foreach ($query as $item) : ?>
            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Id Buku</span>
              <input type="text" name="id_buku" class="form-control" value="<?= $item["id_buku"]; ?>" readonly>
            </div>
            <?php endforeach; ?>

            <div class="input-group mb-3">
              <span class="input-group-text" id="basic-addon1">Nisn</span>
              <input type="number" name="nisn" class="form-control" value="<?php echo htmlentities($_SESSION["member"]["nisn"]); ?>" readonly>
            </div>

            <select name="id" class="form-select" id="adminSelect" aria-label="Default select example" required>
              <option value="">Pilih id admin</option>
              <?php foreach ($admin as $item) : ?>
              <option value="<?= $item["id"]; ?>"><?= $item["id"]; ?></option>
              <?php endforeach; ?>
            </select>

            <div class="input-group mb-3 mt-3">
              <span class="input-group-text" id="basic-addon1">Tanggal pinjam</span>
              <input type="date" name="tgl_peminjaman" id="tgl_peminjaman" class="form-control" onchange="setReturnDate()" required>
            </div>

            <div class="input-group mb-3 mt-3">
              <span class="input-group-text" id="basic-addon1">Tenggat Pengembalian</span>
              <input type="date" name="tgl_pengembalian" id="tgl_pengembalian" class="form-control" readonly>
            </div>

            <a class="btn btn-danger" href="../buku/daftarBuku.php">Batal</a>
            <button type="submit" class="btn btn-success" name="pinjam" onclick="return validateForm()">Pinjam</button>
          </form>
        </div>
      </div>

      <div class="alert alert-danger mt-4" role="alert"><span class="fw-bold">Catatan:</span> Setiap keterlambatan pada pengembalian buku akan dikenakan sanksi berupa denda.</div>
    </div>

    <footer class="shadow-lg bg-subtle p-3">
      <div class="container-fluid d-flex justify-content-between">
        <p class="mt-2">Created by <span class="text-primary">Kelompok 1 Teknik Industri</span> © 2024</p>
        <p class="mt-2">versi 1.0</p>
      </div>
    </footer>

    <!--JAVASCRIPT -->
    <script>
      function setReturnDate() {
        const tglPeminjaman = document.getElementById("tgl_peminjaman").value;
        const tglPengembalian = document.getElementById("tgl_pengembalian");
        if (tglPeminjaman) {
          const date = new Date(tglPeminjaman);
          date.setDate(date.getDate() + 7);
          const returnDate = date.toISOString().split("T")[0];
          tglPengembalian.value = returnDate;
        }
      }

      function validateForm() {
      const adminSelect = document.getElementById("adminSelect");
      const tglPeminjaman = document.getElementById("tgl_peminjaman").value;
      if (adminSelect.value === "") {
        alert("Harap pilih admin");
        return false;
      }
      if (tglPeminjaman === "") {
        alert("Mohon pilih tanggal terlebih dahulu");
        return false;
      }
      return true;
    }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
