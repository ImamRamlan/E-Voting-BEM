<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Calon PDF</title>
    <!-- You can include additional CSS styles here if needed -->
</head>
<body>
    <h1>Data Calon</h1>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>#</th>
                <th>Visi</th>
                <th>Misi</th>
                <th>Suara</th>
                <!-- Add more columns as needed -->
            </tr>
        </thead>
        <tbody>
            <?php foreach ($calon as $index => $c): ?>
                <tr>
                    <td><?= $index + 1; ?></td>
                    <td><?= $c['visi']; ?></td>
                    <td><?= $c['misi']; ?></td>
                    <td><?= $c['suara']; ?></td>
                    <!-- Add more cells as needed -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- You can include additional HTML content here if needed -->

</body>
</html>
