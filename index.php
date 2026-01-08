<?php
include "backend/config/database.php";

if (isset($_POST['kirim'])) {
  $nama  = mysqli_real_escape_string($conn, $_POST['nama']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $pesan = mysqli_real_escape_string($conn, $_POST['pesan']);

  mysqli_query($conn, "INSERT INTO contact (nama, email, pesan)
                       VALUES ('$nama', '$email', '$pesan')");

  $sukses = true;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portfolio - Muhammad Iqbal Junialdi</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

  <style>
    :root {
      --primary-color: #0a69fe;
      --primary-hover: #0056e0;
      --accent-dark: #ffc107;
      --bg-light-1: #ffffff;
      --bg-light-2: #f8f9fa;

      --bg-dark-1: #181818;
      --bg-dark-2: #212529;
      --card-dark: #2c2f33;

      --text-light: #f8f9fa;
      --text-dark: #212529;

    }

    html {
      scroll-behavior: smooth;
      scroll-padding-top: 70px;
    }

    body {
      background-color: var(--bg-light-1);
      color: var(--text-dark);
      transition: background-color 0.3s, color 0.3s;
    }

    .hero-section,
    #about,
    #contact {
      background-color: var(--bg-light-1);
    }

    #projects {
      background-color: var(--bg-light-2);
    }

    .navbar {
      background-color: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(5px);
    }


    .text-primary {
      color: var(--primary-color) !important;
    }

    .btn-primary {
      background-color: var(--primary-color);
      border-color: var(--primary-color);
    }

    .btn-primary:hover {
      background-color: var(--primary-hover);
      border-color: var(--primary-hover);
    }

    .btn-outline-secondary {
      border-color: #6c757d;
      color: #6c757d;
    }

    .btn-outline-secondary:hover {
      background-color: #6c757d;
      color: #fff;
    }

    .section-heading {
      font-weight: 700;
      margin-bottom: 4rem;
      position: relative;
    }

    .section-heading::after {
      content: '';
      display: block;
      width: 60px;
      height: 4px;
      background-color: var(--primary-color);
      margin: 15px auto 0;
    }

    .card {
      border: none;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }


    #btn-dark {
      color: var(--text-dark);
      font-size: 1.2rem;
    }

    #btn-light {
      color: #adb5bd;
      font-size: 1.2rem;
    }

    .footer-section {
      background-color: #343a40;
      color: var(--text-light);
    }




    body.dark-mode {
      background-color: var(--bg-dark-1);
      color: var(--text-light);
    }

    body.dark-mode .hero-section,
    body.dark-mode #about,
    body.dark-mode #contact {
      background-color: var(--bg-dark-1);
    }

    body.dark-mode #projects {
      background-color: var(--bg-dark-2);
    }


    body.dark-mode .navbar {
      background-color: rgba(24, 24, 24, 0.85) !important;
      border-bottom: 1px solid #3a3a3a;
      backdrop-filter: blur(5px);
    }

    body.dark-mode .navbar-brand,
    body.dark-mode .nav-link {
      color: var(--text-light) !important;
    }

    body.dark-mode .text-primary {
      color: var(--accent-dark) !important;
    }

    body.dark-mode .btn-primary {
      background-color: var(--accent-dark);
      border-color: var(--accent-dark);
      color: var(--text-dark);
    }

    body.dark-mode .btn-primary:hover {
      background-color: #ffca2c;
      border-color: #ffca2c;
      color: var(--text-dark);
    }

    body.dark-mode .btn-outline-secondary {
      border-color: #888;
      color: #888;
    }

    body.dark-mode .btn-outline-secondary:hover {
      background-color: #888;
      color: var(--text-light);
    }

    body.dark-mode .section-heading::after {
      background-color: var(--accent-dark);
    }

    body.dark-mode .card {
      background-color: var(--card-dark);
      color: var(--text-light);
      border: 1px solid #404040;
      box-shadow: none;
    }

    body.dark-mode .card-title {
      color: #ffffff;
    }

    body.dark-mode .text-muted {
      color: #aaa !important;
    }

    body.dark-mode #btn-dark {
      color: #adb5bd;
    }

    body.dark-mode #btn-light {
      color: var(--accent-dark);
    }

    body.dark-mode .footer-section {
      background-color: var(--bg-dark-2);
    }

    .footer-section a {
      color: var(--text-light);
      transition: color 0.2s;
    }

    .footer-section a:hover {
      color: var(--accent-dark);
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg shadow-sm sticky-top">
    <div class="container">
      <a class="navbar-brand fw-bold" href="#home">Muhammad Iqbal Junialdi</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#projects">Projects</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#contact">Contact</a>
          </li>
          <li class="nav-item ms-lg-3">
            <a class="nav-link" href="#" id="btn-dark"><i class="fas fa-moon"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" id="btn-light"><i class="fas fa-sun"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <section id="home" class="hero-section py-5">
    <div class="container">
      <div class="row align-items-center" style="min-height: 80vh;">
        <div class="col-md-7 order-2 order-md-1">
          <h1 class="display-3 fw-bold">Hi, Saya Iqbal Junialdi</h1>
          <p class="lead fs-2">Seorang <span class="fw-bold text-primary">Web Developer</span></p>
          <p class="fs-5 text-muted">Saya berspesialisasi dalam membangun website yang modern, responsif, dan fungsional
            menggunakan HTML, CSS, JavaScript, dan Bootstrap.</p>
          <a href="#projects" class="btn btn-primary btn-lg shadow-sm mt-3">Lihat Karya Saya</a>
          <a href="#contact" class="btn btn-outline-secondary btn-lg mt-3 ms-2">Hubungi Saya</a>
        </div>
        <div class="col-md-5 text-center order-1 order-md-2 mb-4 mb-md-0">
          <img src="img/foto.jpg" class="img-fluid rounded-circle shadow-lg w-75" alt="Foto Profil">
        </div>
      </div>
    </div>
  </section>

  <section id="projects" class="article-section py-5">
    <div class="container py-4">
      <h2 class="text-center fw-bold mb-5 section-heading">Karya & Proyek Saya</h2>

      <div class="row">
        <?php
        $q = mysqli_query($conn, "SELECT * FROM project");
        while ($p = mysqli_fetch_assoc($q)) {
          ?>
          <div class="col-md-4 mb-4">
            <div class="card h-100">
              <img src="img/<?= $p['gambar']; ?>" class="card-img-top" alt="<?= $p['judul']; ?>">
              <div class="card-body d-flex flex-column">
                <h5 class="card-title fw-bold"><?= $p['judul']; ?></h5>
                <p class="card-text"><?= $p['deskripsi']; ?></p>
                <div class="mt-auto pt-3">
                  <a href="<?= $p['link']; ?>" class="btn btn-primary" target="_blank">Link</a>
                  <a href="<?= $p['github']; ?>" class="btn btn-outline-secondary ms-2" target="_blank">GitHub</a>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>

    </div>
  </section>

  <section id="about" class="gallery-section py-5">
    <div class="container py-4">
      <h2 class="text-center fw-bold mb-5 section-heading">Tentang Saya</h2>
      <div class="row align-items-center">
        <div class="col-md-5 text-center order-1 order-md-2 mb-4 mb-md-0">
          <img src="img/foto.jpg" class="img-fluid rounded-circle shadow-lg w-75" alt="Foto Profil">
        </div>
        <div class="col-md-7">
          <h3 class="fw-bold">Halo, Saya Iqbal.</h3>
          <p class="lead text-muted">Saya adalah seorang mahasiswa (atau web developer) dengan semangat tinggi untuk
            belajar dan menciptakan teknologi web yang bermanfaat.</p>
          <p>Sejak memulai perjalanan saya di dunia koding, saya telah mendalami berbagai teknologi front-end. Saya
            menikmati proses mengubah ide-ide kompleks menjadi desain yang bersih, elegan, dan interaktif.</p>

          <h5 class="fw-bold mt-4">Keahlian Saya:</h5>
          <p>
            <?php
            $qSkill = mysqli_query($conn, "SELECT * FROM skill");
            while ($s = mysqli_fetch_assoc($qSkill)) {
              ?>
              <span class="badge fs-6 me-1 mb-1" style="background-color: <?= $s['warna']; ?>; color: <?= $textColor; ?>;">
              <!-- <span class="badge fs-6 me-1 mb-1" style="background-color: <?= $s['warna']; ?>; color: #fff;"> -->
                <?= $s['nama_skill']; ?>
              </span>
            <?php } ?>
          </p>

        </div>
      </div>
    </div>
  </section>

  <section id="contact" class="py-5">
  <div class="container py-4">
    <div class="row">
      <div class="col-md-8 mx-auto text-center">

        <h2 class="text-center fw-bold mb-4 section-heading">Hubungi Saya</h2>
        <p class="lead text-muted mb-4">
          Tertarik untuk bekerja sama atau memiliki pertanyaan? Silakan isi form di bawah ini.
        </p>

        <?php if (isset($sukses)) : ?>
          <div class="alert alert-success">
            Pesan berhasil dikirim 🙌 Terima kasih telah menghubungi saya.
          </div>
        <?php endif; ?>

        <form method="POST">
          <div class="mb-3">
            <input type="text" name="nama" class="form-control form-control-lg"
                   placeholder="Nama Anda" required>
          </div>

          <div class="mb-3">
            <input type="email" name="email" class="form-control form-control-lg"
                   placeholder="Email Anda" required>
          </div>

          <div class="mb-3">
            <textarea name="pesan" class="form-control form-control-lg"
                      rows="5" placeholder="Pesan Anda" required></textarea>
          </div>

          <button type="submit" name="kirim"
                  class="btn btn-primary btn-lg w-100">
            Kirim Pesan
          </button>
        </form>

      </div>
    </div>
  </div>
</section>


  <footer class="footer-section text-center py-4">
    <div class="container">
      <div class="mb-3">
        <a href="#" class="text-white text-decoration-none me-3">
          <i class="fab fa-instagram fa-2x"></i>
        </a>
        <a href="#" class="text-white text-decoration-none me-3">
          <i class="fab fa-twitter fa-2x"></i>
        </a>
        <a href="#" class="text-white text-decoration-none me-3">
          <i class="fab fa-linkedin fa-2x"></i>
        </a>
        <a href="#" class="text-white text-decoration-none">
          <i class="fab fa-github fa-2x"></i>
        </a>
      </div>
      <p class="mb-0">Muhammad Iqbal Junialdi / A11.2024.15636</p>
    </div>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    document.addEventListener("DOMContentLoaded", () => {

      const darkButton = document.getElementById("btn-dark");
      const lightButton = document.getElementById("btn-light");
      const body = document.body;

      function enableDarkMode() {
        body.classList.add("dark-mode");
        localStorage.setItem("theme", "dark");
      }

      function enableLightMode() {
        body.classList.remove("dark-mode");
        localStorage.setItem("theme", "light");
      }

      darkButton.addEventListener("click", (e) => {
        e.preventDefault();
        enableDarkMode();
      });

      lightButton.addEventListener("click", (e) => {
        e.preventDefault();
        enableLightMode();
      });

      const savedTheme = localStorage.getItem("theme");
      if (savedTheme === "dark") {
        enableDarkMode();
      } else {
        enableLightMode();
      }

    });
  </script>

</body>

</html>