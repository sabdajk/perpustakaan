<?php
session_start();

if(!isset($_SESSION["signIn"])) {
    header("Location: ../sign/member/sign_in.php");
    exit;
}

require_once '../config/config.php'; // Pastikan path ke config.php benar

$booksCloseToDueDate = getBooksCloseToDueDate($_SESSION['member']['nisn']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
    <title>Tampilan Member</title>
</head>
<style>
  @media screen and (max-width: 600px) {
    .d-flex flex-wrap gap-2 cardImg a img {
      width: 200px;
    }
  }
</style>
<body>
<nav class="navbar fixed-top bg-body-tertiary shadow-sm">
    <div class="container-fluid p-3">
        <a class="navbar-brand" href="#">
            <img src="../assets/perpus.png" alt="logo" width="125px">
        </a>

        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../assets/memberlogo.png" alt="memberLogo" width="50px">
            </button>
            <ul style="margin-left: -7rem;" class="dropdown-menu position-absolute mt-2 p-2">
                <li>
                    <a class="dropdown-item text-center" href="#">
                        <img src="../assets/memberlogo.png" alt="adminLogo" width="70px">
                    </a>
                </li>
                <li>
                    <a class="dropdown-item text-center text-secondary" href="#"><span class="text-capitalize"><?php echo $_SESSION['member']['nama']; ?></span></a>
                    <a class="dropdown-item text-center mb-2" href="#">Siswa</a>
                </li>
                <li>
                    <a class="dropdown-item text-center p-2 bg-danger text-light rounded" href="signOut.php">Keluar<i class="fa-solid fa-right-to-bracket"></i></a>
                </li>
            </ul>
        </div>

        <?php if (count($booksCloseToDueDate) > 0): ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Pengingat!</strong> Anda memiliki buku yang mendekati tenggat waktu pengembalian:
            <ul>
                <?php foreach ($booksCloseToDueDate as $book): ?>
                <li><?php echo $book['judul'] . ' - Tanggal Pengembalian: ' . $book['tgl_pengembalian']; ?></li>
                <?php endforeach; ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php endif; ?>
    </div>
</nav>

<div class="mt-5 p-4">
    <?php
    // Mendapatkan tanggal dan waktu saat ini
    $date = date('Y-m-d H:i:s'); // Format tanggal dan waktu default (tahun-bulan-tanggal jam:menit:detik)
    // Mendapatkan hari dalam format teks (e.g., Senin, Selasa, ...)
    $day = date('l');
    // Mendapatkan tanggal dalam format 1 hingga 31
    $dayOfMonth = date('d');
    // Mendapatkan bulan dalam format teks (e.g., Januari, Februari, ...)
    $month = date('F');
    // Mendapatkan tahun dalam format 4 digit (e.g., 2023)
    $year = date('Y');
    ?>

    <h1 class="mt-5 fw-bold">Layar Utama - <span class="fs-4 text-secondary"><?php echo $day . " " . $dayOfMonth . " " . " " . $month . " " . $year; ?></span></h1>
    <div class="alert alert-success" role="alert">Selamat datang - <span class="text-capitalize fw-bold"><?php echo $_SESSION['member']['nama']; ?></span> di layar utama perpustakaan</div>

    <div class="mt-3 p-3">
        <div class="mt-2 mb-4">
            <h3 class="mb-3">Layanan Perpustakaan yang tersedia</h3>
        </div>
        <div class="d-flex flex-wrap justify-content-center gap-2">
            <div class="cardImg">
                <a href="buku/daftarBuku.php">
                    <img src="../assets/dashboardCardMember/daftarBuku.png" alt="daftar buku" style="max-width: 100%;" width="600px">
                </a>
            </div>
            <div class="cardImg">
                <a href="formPeminjaman/TransaksiPeminjaman.php">
                    <img src="../assets/dashboardCardMember/peminjaman.png" alt="daftar buku" style="max-width: 100%;" width="600px">
                </a>
            </div>

            <div class="cardImg">
                <a href="formPeminjaman/TransaksiPengembalian.php">
                    <img src="../assets/dashboardCardMember/pengembalian.png" alt="daftar buku" style="max-width: 100%;" width="600px">
                </a>
            </div>
            <div class="cardImg">
                <a href="formPeminjaman/TransaksiDenda.php">
                    <img src="../assets/dashboardCardMember/denda.png" alt="daftar buku" style="max-width: 100%;" width="600px">
                </a>
            </div>
        </div>

    </div>
</div>

<footer class="shadow-lg bg-subtle p-3">
    <div class="container-fluid d-flex justify-content-between">
        <p class="mt-2">dibuat oleh <span class="text-primary">Kelompok 1</span> Juli 2024</p>
        <p class="mt-2">22A</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
  if ('serviceWorker' in navigator && 'PushManager' in window) {
    navigator.serviceWorker.register('../service-worker.js')
      .then(function(swReg) {
        console.log('Service Worker is registered', swReg);

        swReg.pushManager.getSubscription().then(function(subscription) {
          if (subscription === null) {
            subscribeUser(swReg);
          } else {
            saveSubscription(subscription);
          }
        });

        // Check for notifications
        checkForNotifications(swReg);
      })
      .catch(function(error) {
        console.error('Service Worker Error', error);
      });
  }

  function subscribeUser(swReg) {
    const applicationServerKey = urlBase64ToUint8Array('BCQBTd3KQxUfFvhBuTdOtPuhIu4FDdBw2dtm4aFNr23PlnGvpa9EWyTuQNybmiM31bgCsc5pSs9kO9x03DH71fA');
    swReg.pushManager.subscribe({
      userVisibleOnly: true,
      applicationServerKey: applicationServerKey
    })
    .then(function(subscription) {
      console.log('User is subscribed:', subscription);
      saveSubscription(subscription);
    })
    .catch(function(err) {
      console.log('Failed to subscribe the user: ', err);
    });
  }

  function urlBase64ToUint8Array(base64String) {
    const padding = '='.repeat((4 - base64String.length % 4) % 4);
    const base64 = (base64String + padding).replace(/-/g, '+').replace(/_/g, '/');
    const rawData = window.atob(base64);
    const outputArray = new Uint8Array(rawData.length);

    for (let i = 0; i < rawData.length; ++i) {
      outputArray[i] = rawData.charCodeAt(i);
    }
    return outputArray;
  }

  function saveSubscription(subscription) {
    fetch('../save-subscription.php', {
      method: 'POST',
      body: JSON.stringify(subscription),
      headers: {
        'Content-Type': 'application/json'
      }
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        console.log('Subscription saved successfully');
      } else {
        console.log('Subscription saving failed:', data.message);
      }
    });
  }

  function checkForNotifications(swReg) {
    fetch('check_notifications.php')
      .then(response => response.json())
      .then(data => {
        if (data.length > 0) {
          data.forEach(notification => {
            swReg.showNotification('Pengingat Buku', {
              body: `Buku "${notification.judul}" mendekati tenggat waktu pengembalian.`,
              icon: '../assets/memberlogo.png'
            });
          });
        }
      })
      .catch(error => {
        console.error('Error checking notifications:', error);
      });
  }
</script>


</body>
</html>