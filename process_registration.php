<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $phone = htmlspecialchars($_POST['phone']);

    // Simpan data pendaftaran ke database (contoh menggunakan PDO)
    // $pdo = new PDO('mysql:host=localhost;dbname=database_name', 'username', 'password');
    // $stmt = $pdo->prepare("INSERT INTO participants (name, email, phone) VALUES (?, ?, ?)");
    // $stmt->execute([$name, $email, $phone]);

    // Buat virtual account (misalnya menggunakan API dari penyedia layanan pembayaran)
    // Contoh: $virtualAccountNumber = createVirtualAccount($name, $amount);

    // Redirect ke halaman pembayaran
    // header("Location: payment.php?va_number=$virtualAccountNumber");
    // exit();

    // Untuk contoh ini, kita hanya akan menampilkan informasi
    echo "Pendaftaran berhasil! Silakan lakukan pembayaran ke virtual account berikut:<br>";
    echo "Nama: $name<br>";
    echo "Email: $email<br>";
    echo "Nomor Telepon: $phone<br>";
    echo "Nomor Virtual Account: 1234567890 (contoh)<br>";
    echo "Silakan lakukan pembayaran untuk konfirmasi pendaftaran.";
}
?>
