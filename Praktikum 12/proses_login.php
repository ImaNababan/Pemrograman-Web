<?php
$username = $_POST['username'];
$password = $_POST['password'];

if ($username == "admin" && $password == "admin") {
    echo "<h2>Login berhasil!</h2>";
    echo "<p><span style='font-weight: bold; font-size: 1.2em;'>Selamat datang, <span style='color: blue; font-weight: bold; font-size: 1.5em;'>admin</span>.</p>";
} else {
    echo "<p><span style='color: red; font-weight: bold;'>Username: </span><span style='color: black; font-weight: bold;'>$username</span> <span style='color: red; font-weight: bold;'>Tidak Terdaftar!</span></p>";
}
echo "<a href='soal_2.html' style='color: purple;'>kembali ke halaman login</a>";
?>
