<?php
session_start();
include "db_conn.php";

if (isset($_POST['Nama_Lengkap']) && isset($_POST['Kata_Sandi'])) {

    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $Nama_Lengkap = validate($_POST['Nama_Lengkap']);
    $Kata_Sandi = validate($_POST['Kata_Sandi']);

    if (empty($Nama_Lengkap)) {
        header("Location: index.html?error=User Name is required");
        exit();
    } else if (empty($Kata_Sandi)) {
        header("Location: index.html?error=Password is required");
        exit();
    } else {
        // Hashing password before comparing with database
        $hashed_pass = md5($Kata_Sandi); // Example: Using md5 hashing for simplicity

        $sql = "SELECT * FROM users WHERE user_name='$Nama_Lengkap' AND password='$hashed_pass'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['Kata_Sandi'] = $row['Kata_Sandi'];
            $_SESSION['Nama_Lengkap'] = $row['Nama_Lengkap'];
            header("Location: /UTAMA/index.html");
            exit();
        } else {
            header("Location: index.html?error=Incorrect User name or password");
            exit();
        }
    }
} else {
    header("Location: /UTAMA/index.html");
    exit();
}
