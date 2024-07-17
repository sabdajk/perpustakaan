<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/de8de52639.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <title>Perpustakaan.com</title>
    <link rel="icon" href="assets/logoperpus.png" type="image/png">
    <style>
      .team-member {
        text-align: center;
        margin-bottom: 30px;
      }
      .team-member img {
        border-radius: 50%;
        width: 230px;
        height: 230px;
        object-fit: cover;
        object-position: center;
        transition: transform 0.3s ease-in-out;
      }
      .team-member img:hover {
        transform: scale(1.1);
      }
      .team-member .social-icons a {
        margin: 0 5px;
        color: #333;
      }
      .team-member .social-icons a:hover {
        color: #007bff;
      }
      .about-text {
        font-size: 1.1rem;
        line-height: 1.8;
      }
      .about-section {
        background: linear-gradient(to right, #ece9e6, #ffffff);
        border-radius: 10px;
        padding: 20px;
      }
      .floating-img {
        animation: floating 5s ease-in-out infinite;
      }
      @keyframes floating {
        0%, 100% {
          transform: translateX(0);
        }
        50% {
          transform: translateX(-10px);
        }
      }
    </style>
  </head>
  <body>
    <!--Navbar-->
    <nav class="navbar fixed-top navbar-expand-lg bg-body-tertiary shadow-sm justify-space-between">
      <div class="container-fluid">
        <img src="assets/tulisan perpus.png" alt="logo" width="120px">
        <a href="sign/link_login.html" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#homeSection">Halaman Utama</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#aboutSection">Tentang</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#footer">Kontak</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <section id="homeSection" class="p-5">
      <div class="d-flex flex-wrap justify-content-center">
        <div class="col mt-5">
          <h2 class="fw-bold text-success"><span class="text-primary">Perpustakaan</span></h2>
          <p class="mb-4">"Akses pengetahuan bisa melalui layar pandang Anda: <br> <span class="text-primary">Perpustakaan Online</span> Membawa Anda ke Dunia Buku Digital."</p>
          <a class="btn btn-primary" href="sign/link_login.html">Mulai</a>
        </div>
        <div class="col mt-3">
          <img src="assets/dasboardbaru.png" width="450px" class="floating-img">
        </div>
      </div>
    </section>
    
    <section class="bg-body-secondary p-5 about-section" id="aboutSection">
      <div class="container">
        <div class="text-center mb-5">
          <h2 class="text-primary">Tentang</h2>
          <p class="about-text">Kami percaya bahwa pengetahuan adalah kekuatan, dan setiap individu berhak mendapatkan akses ke sumber daya pendidikan yang berkualitas. 
            Inilah sebabnya kami menciptakan aplikasi perpustakaan online kami, yang dirancang untuk menjadi pintu gerbang ke ribuan buku, artikel, 
            dan sumber daya belajar lainnya, semuanya hanya dalam genggaman Anda. Kami berdedikasi untuk memajukan literasi dan pembelajaran seumur hidup, 
            dan kami ingin menjadi mitra Anda dalam perjalanan pembelajaran Anda. Aplikasi perpustakaan kami telah dirancang dengan antarmuka yang ramah 
            pengguna, fitur pencarian canggih, dan koleksi konten yang terus berkembang untuk menginspirasi dan memberdayakan semua anggota komunitas kami.
          </p>
        </div>
        
        <div class="text-center mb-5" data-aos="fade-up">
          <h3 class="text-secondary">Tim Kami</h3>
        </div>
        
        <div class="row">
          <div class="col-md-3 team-member" data-aos="fade-up">
            <img src="assets/profil/rayul-_M6gy9oHgII-unsplash.jpg" alt="Jenny Wilson">
            <h4 style="padding-top: 15px;">Jenny Wilson</h4>
            <p>Web Developer</p>
            <div class="social-icons">
              <a href="#"><i class="fa-brands fa-instagram"></i></a>
              <a href="#"><i class="fa-brands fa-facebook"></i></a>
              <a href="#"><i class="fa-brands fa-linkedin"></i></a>
            </div>
          </div>
          <div class="col-md-3 team-member" data-aos="fade-up">
            <img src="assets/profil/jim-flores-dE6c9RZoyL8-unsplash.jpg" alt="Theresa Bell">
            <h4 style="padding-top: 15px;">Theresa Bell</h4>
            <p>Web Developer</p>
            <div class="social-icons">
              <a href="#"><i class="fa-brands fa-instagram"></i></a>
              <a href="#"><i class="fa-brands fa-facebook"></i></a>
              <a href="#"><i class="fa-brands fa-linkedin"></i></a>
            </div>
          </div>
          <div class="col-md-3 team-member" data-aos="fade-up">
            <img src="assets/profil/ivana-cajina-_7LbC5J-jw4-unsplash.jpg" alt="Darrell Steward">
            <h4 style="padding-top: 15px;">Darrell Steward</h4>
            <p>Web Developer</p>
            <div class="social-icons">
              <a href="#"><i class="fa-brands fa-instagram"></i></a>
              <a href="#"><i class="fa-brands fa-facebook"></i></a>
              <a href="#"><i class="fa-brands fa-linkedin"></i></a>
            </div>
          </div>
          <div class="col-md-3 team-member" data-aos="fade-up">
            <img src="assets/profil/57b141e763fd65b44a1d2afe2f4bc9d8.jpg" alt="Fiony Alveria">
            <h4 style="padding-top: 15px;">Fiony Alveria</h4>
            <p>Web Developer</p>
            <div class="social-icons">
              <a href="#"><i class="fa-brands fa-instagram"></i></a>
              <a href="#"><i class="fa-brands fa-facebook"></i></a>
              <a href="#"><i class="fa-brands fa-linkedin"></i></a>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <footer id="footer" class="p-3 bg-dark">
      <div class="row">
        <div class="col">
          <img src="assets/perpus.png" lenght="100px">
        </div>
      </div>
      <div class="row p-3">
        <div class="col mt-3">
          <h3 class="text-light fs-5">Alamat</h3>
          <p class="text-secondary fs-6">Jln. Fatahilah, Watubelah, Kec. Sumber, Kab. Cirebon, Jawa Barat</p>
        </div>
        <hr class="text-light mt-3">
        <div class="d-flex justify-content-center gap-4">
          <a href="" class="fs-3"><i class="fa-brands fa-github"></i></a>
          <a href="" class="fs-3"><i class="fa-brands fa-telegram"></i></a>
          <a href="" class="fs-3"><i class="fa-brands fa-instagram"></i></a>
        </div>
        <div class="d-flex justify-content-center align-items-center mt-3">
          <p class="text-light">Made with ❤️ <a href="" class="text-decoration-none">Kelompok 1 Teknik Industri</a> © 2024</p>
        </div>
      </div>
    </footer>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
