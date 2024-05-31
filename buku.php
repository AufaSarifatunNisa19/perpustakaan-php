<?php
    include_once("./connect.php");

    $query = mysqli_query($db, "SELECT * FROM buku");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Daftar Buku</h1>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-success">
                    <tr>
                        <th>Nama</th>
                        <th>ISBN</th>
                        <th>Unit</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($query as $buku) { ?>
                        <tr>
                            <td><?php echo $buku["nama"] ?></td>
                            <td><?php echo $buku["isbn"] ?></td>
                            <td><?php echo $buku["unit"] ?></td>
                            <td>
                                <a href="<?php echo "edit-buku.php?id=" . $buku["id"] ?>" class="btn btn-info btn-sm">EDIT</a>
                                <a href="<?php echo "delete-buku.php?id=" . $buku["id"] ?>" class="btn btn-secondary btn-sm">HAPUS</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between mt-4">
        <a href="./index.php" class="btn btn-dark">Kembali ke halaman utama</a>
            <a href="./tambah-buku.php" class="btn btn-danger">Tambah data buku</a>
        </div>
    </div>

</body>
</html>