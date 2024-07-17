<?php 
require "../../config/config.php"; 

$nisnMember = $_GET["id"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Hapus Member</title>
</head>
<body>
  <?php
  if(deleteMember($nisnMember) > 0) {
    echo "<script>
    Swal.fire({
        title: 'Sukses!',
        text: 'Member berhasil dihapus!',
        icon: 'success',
        showConfirmButton: false,
    }).then(function() {
        document.location.href = 'member.php';
    });
    </script>";
  } else {
    echo "<script>
    Swal.fire({
        title: 'Oops!',
        text: 'Member gagal dihapus!',
        icon: 'error',
        showConfirmButton: false,
    }).then(function() {
        document.location.href = 'member.php';
    });
    </script>";
  }
  ?>
    
</body>
</html>
