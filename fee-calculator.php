<?php
require_once 'helpers.php';

// Variabel default/input pengujian
$biayaPerPeserta = $_GET['biaya'] ?? 500000;
$jumlahPeserta  = $_GET['peserta'] ?? 3;
$diskonPersen   = $_GET['diskon'] ?? 10; // 10%
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
    <title>Kalkulator Biaya Kursus - KursusKu</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f8f9fa; margin: 30px; }
        .container { max-width: 600px; background: white; padding: 25px; border-radius: 8px; margin: auto; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        td, th { padding: 10px; border-bottom: 1px solid #ddd; }
        .total { font-weight: bold; font-size: 1.2em; color: #0d6efd; }
    </style>
</head>
<body>

<div class="container">
    <h2>Kalkulator Estimasi Biaya Kursus</h2>
    <p>Simulasi perhitungan untuk pendaftaran grup / individu.</p>

    <form method="GET" action="">
        <p>
            <label>Biaya per Peserta (Rp):</label><br>
            <input type="number" name="biaya" value="<?php echo $biayaPerPeserta; ?>" required>
        </p>
        <p>
            <label>Jumlah Peserta:</label><br>
            <input type="number" name="peserta" value="<?php echo $jumlahPeserta; ?>" required>
        </p>
        <p>
            <label>Diskon (%):</label><br>
            <input type="number" name="diskon" value="<?php echo $diskonPersen; ?>">
        </p>
        <p>
            <label>Biaya Admin (Rp):</label><br>
            <input type="number" name="admin" value="<?php echo $biayaAdmin; ?>">
        </p>
        <button type="submit" style="padding: 8px 15px; background: #0d6efd; color: white; border: none; border-radius: 4px;">Hitung Estimasi</button>
    </form>

    <hr>

    <h3>Rincian Pembayaran</h3>
    <table>
        <tr>
            <td>Biaya per Peserta</td>
            <td><?php echo rupiah($biayaPerPeserta); ?> &times; <?php echo $jumlahPeserta; ?> Orang</td>
        </tr>
        <tr>
            <td>Subtotal</td>
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
        <tr class="total">
            <td>Total Akhir Bayar</td>
            <td><?php echo rupiah($totalBayar); ?></td>
        </tr>
    </table>

    <p style="margin-top: 20px;"><a href="index.php">&larr; Kembali ke Beranda</a></p>
</div>

</body>
</html>