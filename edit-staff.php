<?php
include_once ("./connect.php");

$id =$_GET["id"];

$query_get_data = mysqli_query($db, "SELECT * FROM staff WHERE id=$id");
$staff =mysqli_fetch_assoc($query_get_data);

if (isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $telp = $_POST["telp"];
    $email = $_POST["email"];

    $query = mysqli_query($db, "UPDATE staff SET nama='$nama', telp='$telp', email='$email' WHERE id=$id");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Staff</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-primary text-white text-center py-3">
                        <h1 class="display-6">Edit Data Staff</h1>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input value="<?php echo htmlspecialchars($staff['nama'], ENT_QUOTES, 'UTF-8'); ?>" type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="telp" class="form-label">Telepon</label>
                                <input value="<?php echo htmlspecialchars($staff['telp'], ENT_QUOTES, 'UTF-8'); ?>" type="text" class="form-control" id="telp" name="telp" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input value="<?php echo htmlspecialchars($staff['email'], ENT_QUOTES, 'UTF-8'); ?>" type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-primary btn-lg">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer bg-light text-center">
                        <a href="./staff.php" class="btn btn-secondary btn-lg">Kembali ke halaman Staff</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>