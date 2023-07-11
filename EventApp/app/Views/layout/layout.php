<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Bandar Lampung</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <script src="/assets/js/unpkg.com_sweetalert@2.1.2_dist_sweetalert.min.js"></script>
</head>

<body>

<nav class="navbar navbar-dark bg-dark">
  <div class="container-fluid">
  <img src="/assets/image/logo.png" width="40" height="40" style="margin-right: 10px;">
    <a class="navbar-brand" href="/">Event Bandar Lampung</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" 
    aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Event</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active text-dark" aria-current="page" href="/event/home">Home</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark" href="" id="offcanvasNavbarDropdown" 
            role="button" data-bs-toggle="dropdown" aria-expanded="false">Event</a>
            <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
              <li><a class="dropdown-item text-dark" href="/event/index">All Event</a></li>
              <li><a class="dropdown-item text-dark" href="/kategori">Categorys</a></li>
              <li><a class="dropdown-item text-dark" href="/lokasi">Location</a></li>
            </ul>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-dark" href="" id="offcanvasNavbarDropdown" 
            role="button" data-bs-toggle="dropdown" aria-expanded="false">More</a>
            <ul class="dropdown-menu" aria-labelledby="offcanvasNavbarDropdown">
              <li><a class="dropdown-item text-dark" href="<?= base_url('login/logout'); ?>">Logout</a></li>
              <li><a class="dropdown-item text-dark" href="/about">About</a></li>
            </ul>
            </li>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

    <div class="container">
    <?= $this->renderSection('content') ?>
        <footer class="row row-cols-5 py-5 my-5 border-top">
            <div class="container text-center">Copyright &copy<?=Date('Y')?> MI 4C 2021
            </div>
        </footer>
    </div>

<script src="/assets/js/bootstrap.min.js" ></script>
<?php if (session()->getFlashdata('success')) : ?>
        <script>
            swal({
                title: "Informasi",
                text: "<?= session()->getFlashdata('success') ?>",
                icon: "success",
                button: "OK",
            });
        </script>

    <?php endif; ?>
</body>

</html>