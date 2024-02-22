<?php 

//koneksi ke database
include 'connect.php';
//DAFTAR/REGISTRASI
if(isset($_POST['register'])){
    //jika tombol register di klik
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];

    //fungsi enkripsi
    $epassword = password_hash($password, PASSWORD_DEFAULT);

    //insert to db
    $insert = mysqli_query($koneksi, "INSERT INTO user(username,password) values('$username','$epassword')");

    if($insert){
        //jika berhasil
        session_start();
        header('location:mapuser.php');
        $_SESSION['username'] = $username;
    }else {
        //jika gagal
        echo'
        <script>
            alert("Registrasi gagal");
            window.location.href="register.php";
        </script>
        ';
    }
}

//LOGIN
if(isset($_POST['login'])){
    //jika tombol login di klik
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    
    //insert to db
    $cekdb = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");
    $hitung = mysqli_num_rows($cekdb); //cek apakah data ada atau tidak, klo ada berupa angka, kalo tidak 0
    $data = mysqli_fetch_array($cekdb);
    $passwordsekarang = $data['password'];
    $_SESSION['username'] = $username;
    $_SESSION['id_user'] = $data['id_user'];
    
    if($hitung>0){ //jika ada maka angka pasti diatas angka 0
        //jika ada
        //verifikasi password
        if(password_verify($password, $passwordsekarang)){
            //jika password nya benar
            $_SESSION['level'] = $data['level'];
            $level = $_SESSION['level'];
            echo'
            <script>
                alert("anda berhasil login");
            </script>
            ';
            if ($level == 'admin'){
                header('location:admin.php');
            } else {
                header('location: mapuser.php');
            }
            // header('location:mapuser.php'); //redirect ke halaman home/halaman utama    
        }else{
            //jika password salah
        echo'
        <script>
            alert("Password anda salah");
            window.location.href="login.php";
        </script>
        ';
        }
        
    }else {
        //jika gagal
        echo'
        <script>
            alert("Login gagal");
            window.location.href="login.php";
        </script>
        ';
    }
}


?>