<?php 
require "../../config/config.php";
$idPengembalian = $_GET["id"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Hapus Pengembalian</title>
</head>
<body>
  <?php
  if(deleteDataPengembalian($idPengembalian) > 0) {
    echo "
    <script>
    Swal.fire({
          title: 'Sukses!',
          text: 'Data berhasil dihapus!',
          icon: 'success',
          showConfirmButton: false,
      }).then(function() {
          document.location.href = 'pengembalianBuku.php';
      });
    </script>";
  }else {
    echo "
    <script>
    Swal.fire({
          title: 'Oops!',
          text: 'Data gagal dihapus!',
          icon: 'error',
          showConfirmButton: false,
      }).then(function() {
          document.location.href = 'pengembalianBuku.php';
      });
    </script>";
  }
  ?>
    
</body>
</html>
