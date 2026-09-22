<?php
// Set timezone ke Waktu Indonesia Barat
date_default_timezone_set('Asia/Jakarta');
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengujian Server Time - KursusKu</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; background: #f4f6f9; }
        .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 5px rgba(0,0,0,0.1); }
    </style>
</head>
<body>
    <div class="card">
        <h2>Uji Eksekusi Server-Side PHP</h2>
        <p><strong>Waktu Server Saat Ini:</strong> <?php echo date('Y-m-d H:i:s T'); ?></p>
        <p><strong>Versi PHP:</strong> <?php echo phpversion(); ?></p>
        <p><strong>Nama Server:</strong> <?php echo $_SERVER['SERVER_NAME'] ?? 'localhost'; ?></p>
        <p><a href="index.php">&larr; Kembali ke Landing Page</a></p>
    </div>
</body>
</html>