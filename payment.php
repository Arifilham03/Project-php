<?php
if (isset($_GET['va_number'])) {
    $va_number = htmlspecialchars($_GET['va_number']);
    echo "<h1>Halaman Pembayaran</h1>";
    echo "Silakan lakukan pembayaran ke nomor virtual account: <strong>$va_number</strong>";
    // Tambahkan instruksi pembayaran di sini
} else {
    echo "Nomor virtual account tidak ditemukan.";
}
?>
