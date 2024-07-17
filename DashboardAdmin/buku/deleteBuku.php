<?php 
require "../../config/config.php";
$bukuId = $_GET["id"];
//var_dump($bukuId); die;


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Hapus Buku</title>
  </head>
  <body>
    <?php
    if(delete($bukuId) > 0) {
      echo "
      <script>
      Swal.fire({
            title: 'Sukses!',
            text: 'Data buku berhasil dihapus!',
            icon: 'success',
            showConfirmButton: false,
        }).then(function() {
            document.location.href = 'daftarBuku.php';
        });
      </script>";
    }else {
      echo "
      <script>
      Swal.fire({
            title: 'Oops!',
            text: 'Data buku gagal dihapus!',
            icon: 'error',
            showConfirmButton: false,
        }).then(function() {
            document.location.href = 'daftarBuku.php';
        });
      </script>";
    }
    ?>
  </body>
</html>
