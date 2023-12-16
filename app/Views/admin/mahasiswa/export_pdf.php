<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
</head>
<body>
    <h1>Data Mahasiswa</h1>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>#</th>
                <th>Jurusan</th>
                <th>Fakultas</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Jenis Kelamin</th>
                <th>Nomor Telepon</th>
                <th>Tahun Masuk</th>
                <th>Username</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; foreach($mahasiswa as $m) :?>
                <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $m['jurusan']; ?></td>
                    <td><?= $m['fakultas']; ?></td>
                    <td><?= $m['nim']; ?></td>
                    <td><?= $m['namamhs']; ?></td>
                    <td><?= $m['jk']; ?></td>
                    <td><?= $m['notelp']; ?></td>
                    <td><?= $m['tahunmasuk']; ?></td>
                    <td><?= $m['username']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
