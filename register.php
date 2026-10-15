<?php
// register.php - Halaman Pendaftaran Kursus dengan Loop For
require_once 'data.php';
require_once 'helpers.php';

$siteName = "KursusKu";
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran - <?php echo $siteName; ?></title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f8fafc; color: #1e293b; margin: 0; padding: 40px 20px; }
        .container { max-width: 650px; background: white; padding: 35px; border-radius: 12px; margin: auto; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); }
        h2 { color: #1e293b; margin-top: 0; font-size: 1.5rem; }
        .form-group { margin-bottom: 20px; }
        label { display: block; font-weight: 600; margin-bottom: 8px; font-size: 0.9rem; }
        input[type="text"], input[type="email"], select { width: 100%; padding: 10px 14px; border: 1px solid #e2e8f0; border-radius: 6px; font-size: 1rem; box-sizing: border-box; }
        .btn-submit { width: 100%; padding: 12px; background: #2563eb; color: white; border: none; border-radius: 6px; font-size: 1rem; font-weight: 600; cursor: pointer; margin-top: 10px; }
        .btn-submit:hover { background: #1d4ed8; }
    </style>
</head>
<body>

<div class="container">
    <h2>Formulir Pendaftaran Kursus</h2>
    <p style="color: #64748b; margin-bottom: 25px;">Silakan isi data diri Anda dengan lengkap untuk mendaftar ke program KursusKu.</p>

    <form action="process-registration.php" method="POST">
        
        <div class="form-group">
            <label>Nama Lengkap:</label>
            <input type="text" name="fullname" placeholder="Masukkan nama lengkap..." required>
        </div>

        <div class="form-group">
            <label>Alamat Email:</label>
            <input type="email" name="email" placeholder="nama@email.com" required>
        </div>

        <div class="form-group">
            <label>Jumlah Paket Sesi:</label>
            <select name="packages" required>
                <option value="">-- Pilih Jumlah Paket --</option>
                <?php for ($i = 1; $i <= 3; $i++): ?>
                    <option value="<?php echo $i; ?>"><?php echo $i; ?> Paket Sesi</option>
                <?php endfor; ?>
            </select>
        </div>

        <button type="submit" class="btn-submit">Kirim Pendaftaran ⚡</button>
    </form>
</div>

</body>
</html>