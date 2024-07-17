<?php
session_start();

if(!isset($_SESSION["signIn"]) ) {
  header("Location: ../../sign/admin/sign_in.php");
  exit;
}
require "../../config/config.php";

$member = queryReadData("SELECT * FROM member");

if(isset($_POST["search"]) ) {
  $member = searchMember($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
     <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <title>Member terdaftar</title>
     <style>
      .search-bar {
      max-width: 600px;
      margin: 20px auto;
    }
     </style>
  </head>
  <body>
    <nav class="navbar fixed-top bg-body-tertiary shadow-sm">
      <div class="container-fluid p-3">
        <a class="navbar-brand" href="#">
          <img src="../../assets/logoNav.png" alt="logo" width="120px">
        </a>
        
        <a class="btn btn-tertiary" href="../dashboardAdmin.php">Dashboard</a>
      </div>
    </nav>
    
    <div class="p-4 mt-5">
      <!--search engine --->
      <form action="" method="post" class="mt-5 search-bar">
      <div class="input-group">
        <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Cari data member...">
        <button class="btn btn-primary" type="submit" name="search"><i class="fa-solid fa-magnifying-glass"></i></button>
      </div>
    </form>
      
      <caption>List of Member</caption>
      <div class="table-responsive mt-3">
        <table class="table table-striped table-hover">
        <thead class="text-center">
          <tr>
            <th class="bg-primary text-light">Nisn</th>
            <th class="bg-primary text-light">Kode</th>
            <th class="bg-primary text-light">Nama</th>
            <th class="bg-primary text-light">Jenis Kelamin</th>
            <th class="bg-primary text-light">Kelas</th>
            <th class="bg-primary text-light">Jurusan</th>
            <th class="bg-primary text-light">No Telepon</th>
            <th class="bg-primary text-light">Pendaftaran</th>
            <th class="bg-primary text-light">Delete</th>
          </tr>
        </thead>
      <?php foreach($member as $item) : ?>
      <tr>
        <td><?=$item["nisn"];?></td>
        <td><?=$item["kode_member"];?></td>
        <td><?=$item["nama"];?></td>
        <td><?=$item["jenis_kelamin"];?></td>
        <td><?=$item["kelas"];?></td>
        <td><?=$item["jurusan"];?></td>
        <td><?=$item["no_tlp"];?></td>
        <td><?=$item["tgl_pendaftaran"];?></td>
        <td>
           <div class="action">
            <a href="deleteMember.php?id=<?= $item["nisn"]; ?>" class="btn btn-danger delete-member" data-id="<?= $item["nisn"]; ?>">
              <i class="fa-solid fa-trash"></i>
            </a>
          </div>
        </td>

       </tr>
      <?php endforeach;?>
    </table>
    </div>
  </div>
  
    <footer class="fixed-bottom shadow-lg bg-subtle p-3">
      <div class="container-fluid d-flex justify-content-between">
      <p class="mt-2">Created by <span class="text-primary"> Kelompok 1 Teknik Industri</span> © 2024</p>
      <p class="mt-2">versi 1.0</p>
      </div>
    </footer>
    
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const deleteButtons = document.querySelectorAll(".delete-member");
      deleteButtons.forEach(button => {
        button.addEventListener("click", function (e) {
          e.preventDefault();
          const memberId = this.getAttribute("data-id");
          Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak akan dapat mengembalikan data member ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
          }).then((result) => {
            if (result.isConfirmed) {
              // Redirect or submit form to delete script
              window.location.href = `deleteMember.php?id=${memberId}`;
            }
          });
        });
      });
    });
  </script>
  </body>
</html>