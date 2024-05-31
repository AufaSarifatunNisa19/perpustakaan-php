<?php
include_once ("./connect.php");

$id =$_GET["id"];

$query_get_data = mysqli_query($db, "SELECT * FROM buku WHERE id=$id");
$buku =mysqli_fetch_assoc($query_get_data);

if (isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $isbn = $_POST["isbn"];
    $unit = $_POST["unit"];

    $query = mysqli_query($db, "UPDATE buku SET nama='$nama', isbn='$isbn', unit=$unit WHERE id=$id");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-lg">
                    <div class="card-header bg-info text-white text-center py-3">
                        <h1 class="display-6">Edit Data Buku</h1>
                    </div>
                    <div class="card-body">
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input value="<?php echo htmlspecialchars($buku['nama']); ?>" type="text" class="form-control" id="nama" name="nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="isbn" class="form-label">ISBN</label>
                                <input value="<?php echo htmlspecialchars($buku['isbn']); ?>" type="text" class="form-control" id="isbn" name="isbn" required>
                            </div>
                            <div class="mb-3">
                                <label for="unit" class="form-label">Unit</label>
                                <input value="<?php echo $buku['unit']; ?>" type="number" class="form-control" id="unit" name="unit" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-info btn-lg">SUBMIT</button>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer bg-light text-center">
                        <a href="./buku.php" class="btn btn-secondary btn-lg">Kembali ke halaman Buku</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>