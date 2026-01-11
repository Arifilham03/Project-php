<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Peserta LPK</title>
</head>
<body>
    <h1>Pendaftaran Peserta LPK</h1>
    <form action="process_registration.php" method="POST">
        <label for="name">Nama Lengkap:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">Nomor Telepon:</label>
        <input type="text" id="phone" name="phone" required><br><br>

        <input type="submit" value="Daftar">
    </form>
</body>
</html>
