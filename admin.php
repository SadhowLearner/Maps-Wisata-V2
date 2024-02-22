<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
include "connect.php";
$username = $_SESSION['username'];
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lateef&family=Lato&display=swap" rel="stylesheet">
    <style>
        .lato {
            font-family: 'Lato', sans-serif;
        }

        .lateef {

            font-family: 'Lateef', serif;
        }

        .roboto-s {
            font-family: 'Roboto Slab', serif;
        }

        .lingkaran {
            clip-path: circle(32% at 50% 50%);
            background: whitesmoke solid;
        }

        .icon {
            height: 40px;
        }

        .icon-m {
            height: 30px;
        }
    </style>
</head>

<body>

    <div class="container-fluid">
        <div class="row h-100">
            <div class="col-3 h-100 " style="background-color: #2FA4FF;">
                <div class="container no-gutters">
                    <div class="row">
                        <img src="img/logo-l.svg" class="col-6 mt-3" alt="">
                        <div class="lateef display-4 mt-3 col-6">Maps <br>Wisata</div>
                    </div>
                    <div class="row ms-0 mt-5">
                        <img src="img/pinmap.svg" class="icon col-3" alt="">
                        <div class="roboto-s fs-4 col-9 mt-1">Wisata</div>
                    </div>
                    <div class="row ms-0 mt-4">
                        <img src="img/maps.svg" class="icon-m col-3" alt="">
                        <div class="roboto-s fs-4 col-9 mt-0">Rekomendasi</div>
                    </div>
                    <div class="row ms-0 mt-4">
                        <img src="img/pencil1.svg" class="icon-m col-3" alt="">
                        <div class="roboto-s fs-4 col-9 mt-0">Deskripsi</div>
                    </div>
                    <div class="row ms-0 mt-4">
                        <img src="img/star1.svg" class="icon-m col-3" alt="">
                        <div class="roboto-s fs-4 col-9 mt-0">Rating</div>
                    </div>
                </div>
                <div class="position-absolute bottom-0 start-0 m-4 row">
                    <img src="img/icon_akun.png" height="50px" class="col-4" alt="">
                    <div class="lato fs-3 col-8">@
                        <?= $username ?>
                    </div>
                </div>
            </div>
            <div class='col-9'>
                <?php

                // Cek apakah pengguna sudah login dan memiliki level admin
                if (!isset($_SESSION['level'])) {
                    echo '<script>alert("Maaf anda tidak terdaftar")</script>';
                    header('location: login.php');
                    exit;
                } elseif ($_SESSION['level'] != 'admin') {
                    echo '<script>alert("Maaf anda tidak dapat mengakses konten ini")</script>';
                    header('location: mapuser.php');
                    exit;
                }
                    @$aksi = $_GET['aksi'];
                    switch ($aksi) {
                        case 'tambah':
                            include "page/tambah.php";
                            break;
                        case 'lihat':
                            include "page/lihat.php";
                            break;
                        case 'update':
                            include "page/update.php";
                            break;
                        case 'delete':
                            include "page/delete.php";
                            break;
                        default:
                            $id = $_SESSION['id_user'];
                            $query = "SELECT * FROM user";
                            $hasil = mysqli_query($koneksi, $query);
                            ?>
                            <table class='content w-75 mx-auto mt-5' border="1">
                                <tr>
                                    <th colspan='7'><a href="?aksi=tambah"</a></th>
                                </tr>
                                <tr>
                                    <th>No</th>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th colspan="3">action</th>
                                </tr>
                                <?php
                                $no = 1;
                                while ($data = mysqli_fetch_array($hasil)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $no++; ?>
                                        </td>
                                        <td>
                                            <?php echo $data['id_user']; ?>
                                        </td>
                                        <td>
                                            <?php echo $data['username']; ?>
                                        </td>
                                        <td><a href="?aksi=lihat&id=<?php echo $data['id_user']; ?>">View</a></td>
                                        <td><a href="?aksi=update&id=<?php echo $data['id_user']; ?>">Update</a></td>
                                        <td><a href="?aksi=delete&id=<?php echo $data['id_user']; ?>"
                                                onclick="return confirm('Apakah Anda yakin menghapus data?')">Delete</a></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                            <?php
                            break; }
                            ?>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>
</body>

</html>