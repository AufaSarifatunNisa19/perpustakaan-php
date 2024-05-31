<?php
    // session_start() artinya memulai interaksi dengan session
    session_start();

    include_once("./connect.php");

    // isset: apakah ada?
    // apakah ada email dan password yang dikirim dari form?
    if(isset($_POST['email']) && isset($_POST['password'])) {
        // simpan email ke variabel email
        $email = $_POST['email']; // malvin@gmail.com

        // simpen password ke variable password
        $password = $_POST['password'];

        // cek ke database
        // ambil semua data user yang emailnya sesuai dengan input di form
        $sql = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($db, $sql);

        // jika, email ditemukan
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            // kita cek kecocokan password dengan hash password di database
            // password_verify()
            if(password_verify($password, $row['password'])) {
                // kalau password bener, kasih sebuah SESSION["email"]
                $_SESSION['email'] = $email;

                // pindahin halaman ke index.php
                header("Location: index.php");
                exit;
            } else {
                // kalau password salah.
                echo "Password salah.";
            }
        } else {
            // jika email tidak ditemukan
            echo "Email tidak ditemukan.";
        }
    }