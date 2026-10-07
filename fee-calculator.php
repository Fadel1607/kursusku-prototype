<?php
require_once 'helpers.php';

// Variabel default/input pengujian
$biayaPerPeserta = $_GET['biaya'] ?? 500000;
$jumlahPeserta  = $_GET['peserta'] ?? 3;
$diskonPersen   = $_GET['diskon'] ?? 10;
$biayaAdmin     = $_GET['admin'] ?? 15000;

// Logika Perhitungan Bisnis
$subtotal      = $biayaPerPeserta * $jumlahPeserta;
$nominalDiskon = intdiv($subtotal * $diskonPersen, 100);
$totalBayar    = ($subtotal - $nominalDiskon) + $biayaAdmin;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator Biaya Kursus - KursusKu</title>
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --bg-body: #f8fafc;
            --text-main: #1e293b;
            --border-color: #e2e8f0;
        }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: var(--bg-body); color: var(--text-main); margin: 0; padding: 40px 20px; }
        .container { max-width: 650px; background: white; padding: 35px; border-radius: 12px; margin: auto; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); }
        
        h2 { color: var(--text-main); margin-top: 0; }
        p.desc { color: #64748b; margin-bottom: 25px; }

        .form-group { margin-bottom: 20px; }
        label { display: block; font-weight: 600; margin-bottom: 8px; font-size: 0.9rem; }
        input[type="number"] { width: 100%; padding: 10px 14px; border: 1px solid var(--border-color); border-radius: 6px; font-size: 1rem; box-sizing: border-box; transition: border-color 0.2s; }
        input[type="number"]:focus { outline: none; border-color: var(--primary); box-shadow: 0 0 0 3px rgba(37,99,235,0.1); }

        .btn-hitung { width: 100%; padding: 12px; background: var(--primary); color: white; border: none; border-radius: 6px; font-size: 1rem; font-weight: 600; cursor: pointer; transition: background 0.2s; }
        .btn-hitung:hover { background: var(--primary-dark); }

        hr { border: 0; border-top: 1px solid var(--border-color); margin: 30px 0; }

        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        td, th { padding: 12px 14px; border-bottom: 1px solid var(--border-color); text-align: left; }
        td:nth-child(2) { text-align: right; }
        
        .total-row td { font-weight: bold; font-size: 1.15rem; color: var(--primary); background: #f1f5f9; border-bottom: none; }
        
        .back-link { display: inline-block; margin-top: 25px; color: var(--primary); text-decoration: none; font-weight: 600; }
        .back-link:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="container">
    <h2>Kalkulator Estimasi Biaya Kursus</h2>
    <p class="desc">Simulasi perhitungan otomatis untuk pendaftaran grup atau individu di KursusKu.</p>

    <form method="GET" action="">
        <div class="form-group">
            <label>Biaya per Peserta (Rp):</label>
            <input type="number" name="biaya" value="<?php echo $biayaPerPeserta; ?>" required>
        </div>
        <div class="form-group">
            <label>Jumlah Peserta:</label>
            <input type="number" name="peserta" value="<?php echo $jumlahPeserta; ?>" required>
        </div>
        <div class="form-group">
            <label>Diskon (%):</label>
            <input type="number" name="diskon" value="<?php echo $diskonPersen; ?>">
        </div>
        <div class="form-group">
            <label>Biaya Admin (Rp):</label>
            <input type="number" name="admin" value="<?php echo $biayaAdmin; ?>">
        </div>
        <button type="submit" class="btn-hitung">Hitung Estimasi</button>
    </form>

    <hr>

    <h3>Rincian Pembayaran</h3>
    <table>
        <tr>
            <td>Biaya per Peserta (<?php echo rupiah($biayaPerPeserta); ?> &times; <?php echo $jumlahPeserta; ?> Orang)</td>
            <td><?php echo rupiah($subtotal); ?></td>
        </tr>
        <tr>
            <td>Diskon (<?php echo $diskonPersen; ?>%)</td>
            <td>- <?php echo rupiah($nominalDiskon); ?></td>
        </tr>
        <tr>
            <td>Biaya Admin</td>
            <td>+ <?php echo rupiah($biayaAdmin); ?></td>
        </tr>
        <tr class="total-row">
            <td>Total Akhir Bayar</td>
            <td><?php echo rupiah($totalBayar); ?></td>
        </tr>
    </table>

    <a href="index.php" class="back-link">&larr; Kembali ke Beranda</a>
</div>

</body>
</html>