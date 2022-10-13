<?php
include "../../assets/conf/koneksi-pindai.php";
if (isset($_POST['btnTambahUser'])) {
    $setNama = strtoupper($_POST['nama']);
    $nama = mysqli_escape_string($koneksi, sanitize($setNama));
    $username = mysqli_escape_string($koneksi, sanitize($_POST['username']));
    $status = mysqli_escape_string($koneksi, sanitize($_POST['status']));
    $level = mysqli_escape_string($koneksi, sanitize($_POST['level']));
    $pass = mysqli_escape_string($koneksi, sanitize($_POST['password']));
    $cPass = mysqli_escape_string($koneksi, sanitize($_POST['cPassword']));
    $cekDataUser = "SELECT * FROM tbl_users WHERE namaLengkap ='$nama' AND status ='$status' LIMIT 1";
    $queryDataUsers = mysqli_query($koneksi, $cekDataUser);
    $validasiDataUser = mysqli_num_rows($queryDataUsers);
    if ($validasiDataUser > 0) {
        $_SESSION['message'] = 'Data user sudah tersedia.';
        $_SESSION['msg_type'] = "danger";
        echo '
            <script>
                window.location.href="?p=users&action=gagalTambahUser";
            </script>       
            ';
    } elseif ($pass != $cPass) {
        $_SESSION['message'] = 'Password tidak sama';
        $_SESSION['msg_type'] = "danger";
        echo '
            <script>
                window.location.href="?p=users&action=passwordTidakSama;
            </script>       
            ';
    } else {
        $hashing = password_hash($pass, PASSWORD_DEFAULT);
        $sqlDataUser = "INSERT INTO tbl_users (username, password, namaLengkap, level, status) VALUES ('$username', '$hashing', '$nama', '$level', '$status') LIMIT 1";
        $queryData = mysqli_query($koneksi, $sqlDataUser);
        $_SESSION['message'] = 'Sukses, user baru berhasil disimpan';
        $_SESSION['msg_type'] = "success";
        echo '
            <script>
                window.location.href="?p=users&action=berhasil";
            </script>       
            ';
    }
}

if (isset($_POST['btnEditUser'])) {
    $nama = mysqli_escape_string($koneksi, sanitize($_POST['nama']));
    $username = mysqli_escape_string($koneksi, sanitize($_POST['username']));
    $status = mysqli_escape_string($koneksi, sanitize($_POST['status']));
    $level = mysqli_escape_string($koneksi, sanitize($_POST['level']));
    $cekDataUser = "SELECT * FROM tbl_users WHERE namaLengkap ='$nama' AND status ='$status' LIMIT 1";
    $queryDataUsers = mysqli_query($koneksi, $cekDataUser);
    $validasiDataUser = mysqli_num_rows($queryDataUsers);
    if ($validasiDataUser > 0) {
        $sqlDataUser = "INSERT INTO tbl_users (username, password, namaLengkap, level, status) VALUES ('$username', '$hashing', '$nama', '$level', '$status') LIMIT 1";
        $queryData = mysqli_query($koneksi, $sqlDataUser);
        $_SESSION['message'] = 'Sukses, user baru berhasil disimpan';
        $_SESSION['msg_type'] = "success";
        echo '
            <script>
                window.location.href="?p=users&action=berhasil";
            </script>       
            ';
    } else {
        $_SESSION['message'] = 'Data user sudah tersedia.';
        $_SESSION['msg_type'] = "danger";
        echo '
            <script>
                window.location.href="?p=users&action=gagalTambahUser";
            </script>       
            ';
    }
}