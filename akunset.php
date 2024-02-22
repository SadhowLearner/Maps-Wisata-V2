<?php
session_start();
include "function.php";
$username = $_SESSION['username'];
$sql = "SELECT * FROM user WHERE username='$username'";
$query = mysqli_query($koneksi, $sql);
$row = mysqli_fetch_array($query);
@$email = $row['email'];
@$instagram = $row['instagram'];
@$phone_number = $row['phone_number'];

?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    '<?= $username ?>' Account Setting
  </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:100,200,300,regular,500,600,700,800,900"
    rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,200,300,regular,500,600,700,800,900"
    rel="stylesheet" />

  <link rel="stylesheet" href="css/account_page.css">

</head>

<body>

  <section class="container-fluid  gap-0">
    <div class="row">
      <nav class="col-3 d-flex flex-column border-1 ps-4 pt-4">
        <a class="nav-link" href=""> <img class="my-3" src=" img/icon_akun.png" height="30px" width="30px" alt="">
          <span class="roboto-s-r fs-5 pt-2 ms-3">Profile</span></a>
        <a href="" class="nav-link"><img class="my-3" src="img/pencil1.svg" height="30px" width="27px" alt="">
          <span class="roboto-s-r fs-5 pt-2 ms-3">Deskripsi</span></a>
        <a href="" class="nav-link"><img class="my-3" src="img/star1.svg" height="30px" width="30px" alt="">
          <span class="roboto-s-r fs-5 pt-2 ms-3">Rekomendasi</span></a>
        <a href="" class="nav-link"><img class="my-3 ms-1" src="img/icon_silang.png" height="22px" width="20px" alt="">
          <span class="roboto-s-r fs-5 pt-2 ms-4 text-danger">Hapus Akun</span></a>
        <a href="logout.php" class="nav-link"><img class="my-3" src="img/Logout.svg" height="30px" width="30px" alt="">
          <span class="roboto-s-r fs-5 pt-2 ms-3 ps-1">Logout</span></a>
      </nav>
      <div class="col-4 offset-1">
        <h1 class="roboto-b mt-5">Profile</h1>
        <div class="d-flex flex-row">
          <img src="img/icon_akun.png" height="100px" class="mt-3" alt="">
          <span class="ms-5 pt-3">
            <h1 class="fs-1 mb-0  fw-normal">
              <?= $username ?>
            </h1>
            <p class="fs-3">
              <?= $phone_number ?>xxxx-xxxx-xxxx
            </p>
          </span>
        </div>
        <form action="">
          <div class="mt-4">
            <div>
              <h3>E-Mail</h3>
                <input class="text-box fs-5" type="email" name="email" id="email" value='<?=$email?>' readonly>
            </div>
            <div>
              <h3>Password</h3>
              <input class="text-box fs-5" type="password" name="password" id="password" value='<?=$password?>' readonly>
            </div>
            <div>
              <h3>Instagram</h3>
                <input class="text-box fs-5" type="text" name="instagram" id="instagram" value='<?=$instagram?>' readonly>
            </div>
          </div>
        </form>
      </div>
      <div class="col-3 offset-1 position-relative">
        <a href="" class="link-primary text-decoration-none fs-4 position-absolute top-0 end-0 me-5 mt-4">Jadi Admin</a>
      </div>
    </div>
  </section>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
    integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
    crossorigin="anonymous"></script>
</body>

</html>