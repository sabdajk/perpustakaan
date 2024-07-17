<?php
require "../../config/config.php";
$buku = queryReadData("SELECT * FROM buku");

// mengaktifkan tombol search engine
if(isset($_POST["search"]) ) {
  //buat variabel dan ambil apa saja yg diketikkan user di dalam input dan kirimkan ke function search.
  $buku = search($_POST["keyword"]);
  
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
    <title>Kelola buku || Admin</title>
  </head>
  <style>
    .layout-card-custom {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 1.5rem;
    }
    .search-bar {
      max-width: 600px;
      margin: 20px auto;
    }
  </style>
  <body>
  <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="../../assets/logoNav.png" alt="logo" width="120px">
        </a>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../dashboardAdmin.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-success" href="tambahBuku.php">Tambah Buku</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
    
<div class="p-4 mt-4">
      <!--search engine --->
      <form action="" method="post" class="mt-5 search-bar">
      <div class="input-group">
        <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Cari judul atau kategori buku...">
        <button class="btn btn-primary" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
      </div>
    </form>
       
       <!--Card buku-->
       <div class="layout-card-custom">
       <?php foreach ($buku as $item) : ?>
       <div class="card" style="width: 15rem;">
         <img src="../../imgDB/<?= $item["cover"]; ?>" class="card-img-top" alt="coverBuku" height="250px">
         <div class="card-body">
           <h5 class="card-title"><?= $item["judul"]; ?></h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Kategori : <?= $item["kategori"]; ?></li>
            <li class="list-group-item">Id Buku : <?= $item["id_buku"]; ?></li>
          </ul>
        <div class="card-body">
          <a class="btn btn-success" href="updateBuku.php?idReview=<?= $item["id_buku"]; ?>" id="review">Edit</a>
          
          <button class="btn btn-danger delete-btn" data-id="<?= $item["id_buku"]; ?>">Delete</button>
          </div>
        </div>
       <?php endforeach; ?>
       </div>
      </div>
      
      <footer class="shadow-lg bg-subtle p-3">
      <div class="container-fluid d-flex justify-content-between">
      <p class="mt-2">Created by <span class="text-primary"> Kelompok 1 Teknik Industri</span> © 2024</p>
      <p class="mt-2">versi 1.0</p>
      </div>
      </footer>
    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script>
  // Script untuk Sweet Alert
  document.querySelectorAll('.delete-btn').forEach(button => {
    button.addEventListener('click', function (e) {
      e.preventDefault();
      const idBuku = this.getAttribute('data-id');
      Swal.fire({
        title: 'Yakin ingin menghapus data buku?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
      }).then((result) => {
        if (result.isConfirmed) {
          // Redirect atau hapus data sesuai kebutuhan Anda
          window.location.href = `deleteBuku.php?id=${idBuku}`;
        }
      });
    });
  });
</script>  
</body>
</html>