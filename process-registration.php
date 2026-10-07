<?php
// process-registration.php - Pemrosesan & Penyimpanan Sesi Pendaftaran
session_start();
require_once 'data.php';
require_once 'helpers.php';

// Validasi method request
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: registration.php');
    exit;
}

// Menangkap data input dengan aman
$fullname         = trim($_POST['fullname'] ?? '');
$email            = trim($_POST['email'] ?? '');
$phone            = trim($_POST['phone'] ?? '');
$courseCode       = $_POST['course_code'] ?? '';
$participantType  = $_POST['participant_type'] ?? 'umum';
$learningMode     = $_POST['learning_mode'] ?? 'online';
$packages         = (int) ($_POST['packages'] ?? 1);
$interests        = $_POST['interests'] ?? [];
$note             = trim($_POST['note'] ?? '');

// Pastikan interests adalah array yang valid
if (!is_array($interests)) {
    $interests = [];
}

$errors = [];

// Validasi Dasar
if (empty($fullname)) {
    $errors[] = "Nama lengkap wajib diisi.";
}
if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Format email tidak valid.";
}
if (empty($phone)) {
    $errors[] = "Nomor HP / WhatsApp wajib diisi.";
}

// Cari data kursus
$selectedCourse = findCourse($courses, $courseCode);
if (!$selectedCourse) {
    $errors[] = "Kursus yang dipilih tidak valid.";
}

// Jika ada error, tampilkan
if (!empty($errors)) {
    ?>
    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <title>Terjadi Kesalahan - KursusKu</title>
        <style>
            body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f8fafc; color: #1e293b; display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; }
            .error-box { background: white; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); max-width: 450px; width: 100%; border-left: 5px solid #ef4444; }
            h3 { color: #ef4444; margin-top: 0; }
            ul { padding-left: 20px; color: #475569; }
            .btn { display: inline-block; margin-top: 15px; background: #2563eb; color: white; padding: 10px 20px; text-decoration: none; border-radius: 6px; font-weight: 600; }
        </style>
    </head>
    <body>
        <div class="error-box">
            <h3>⚡ Terjadi Kesalahan Validasi</h3>
            <ul>
                <?php foreach ($errors as $err): ?>
                    <li><?php echo e($err); ?></li>
                <?php endforeach; ?>
            </ul>
            <a href="registration.php" class="btn">&larr; Kembali ke Form</a>
        </div>
    </body>
    </html>
    <?php
    exit;
}

// Perhitungan Aritmatika Biaya & Diskon
$baseFee        = $selectedCourse['fee'];
$subtotal       = $baseFee * $packages;
$discountPct    = getDiscountPercent($participantType);
$discountAmount = ($subtotal * $discountPct) / 100;
$finalTotal     = $subtotal - $discountAmount;
$modeLabel      = getLearningModeLabel($learningMode);

// SIMPAN KE SESSION RIWAYAT (Termasuk Catatan & Minat)
if (!isset($_SESSION['registrations'])) {
    $_SESSION['registrations'] = [];
}

array_unshift($_SESSION['registrations'], [
    'fullname'         => $fullname,
    'email'            => $email,
    'phone'            => $phone,
    'course_name'      => $selectedCourse['name'],
    'participant_type' => ucfirst($participantType),
    'learning_mode'    => $modeLabel,
    'packages'         => $packages,
    'final_total'      => $finalTotal,
    'note'             => $note,
    'interests'        => $interests,
    'date'             => date('d-m-Y H:i')
]);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ringkasan Pendaftaran - KursusKu</title>
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --bg-body: #f8fafc;
            --text-main: #1e293b;
            --border-color: #e2e8f0;
            --success-color: #10b981;
        }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: var(--bg-body); color: var(--text-main); margin: 0; padding: 40px 20px; }
        .container { max-width: 650px; background: white; padding: 35px; border-radius: 12px; margin: auto; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); position: relative; overflow: hidden; }
        .container::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 5px;
            background: linear-gradient(90deg, #2563eb, #38bdf8, #f59e0b);
        }
        .header-title { display: flex; align-items: center; gap: 10px; margin-bottom: 5px; }
        h2 { color: var(--success-color); margin: 0; font-size: 1.5rem; }
        .lightning-icon { font-size: 1.5rem; animation: pulse-lightning 1.5s infinite; }
        @keyframes pulse-lightning {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.2); opacity: 0.7; color: #f59e0b; }
            100% { transform: scale(1); opacity: 1; }
        }
        p.desc { color: #64748b; margin-top: 0; margin-bottom: 25px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { padding: 12px 14px; border-bottom: 1px solid var(--border-color); text-align: left; font-size: 0.95rem; }
        th { width: 35%; color: #475569; font-weight: 600; }
        td { color: var(--text-main); }
        .total-row td { font-weight: bold; font-size: 1.15rem; color: var(--primary); background: #f1f5f9; border-bottom: none; }
        .action-group { margin-top: 25px; display: flex; gap: 10px; flex-wrap: wrap; }
        .btn { display: inline-block; padding: 10px 20px; background: var(--primary); color: white; text-decoration: none; border-radius: 6px; font-weight: 600; transition: background 0.2s; }
        .btn:hover { background: var(--primary-dark); }
        .btn-alt { background: #0f172a; }
        .btn-alt:hover { background: #1e293b; }
    </style>
</head>
<body>
<div class="container">
    <div class="header-title">
        <span class="lightning-icon">⚡</span>
        <h2>Registrasi Berhasil & Disimpan!</h2>
    </div>
    <p class="desc">Terima kasih, <strong><?php echo e($fullname); ?></strong>. Data dan pendaftaran Anda telah berhasil masuk ke sistem.</p>
    
    <table>
        <tr>
            <th>Email</th>
            <td><?php echo e($email); ?></td>
        </tr>
        <tr>
            <th>Nomor HP / WhatsApp</th>
            <td><?php echo e($phone); ?></td>
        </tr>
        <tr>
            <th>Kursus Dipilih</th>
            <td><strong><?php echo e($selectedCourse['name']); ?></strong></td>
        </tr>
        <tr>
            <th>Tipe Peserta</th>
            <td><?php echo ucfirst(e($participantType)); ?> <span style="color: #64748b; font-size: 0.85rem;">(Diskon <?php echo $discountPct; ?>%)</span></td>
        </tr>
        <tr>
            <th>Metode Belajar</th>
            <td><?php echo e($modeLabel); ?></td>
        </tr>
        <tr>
            <th>Jumlah Paket</th>
            <td><?php echo $packages; ?> Paket</td>
        </tr>
        <tr>
            <th>Catatan Peserta</th>
            <td><?php echo !empty($note) ? e($note) : '<span style="color: #94a3b8; font-style: italic;">Tidak ada catatan</span>'; ?></td>
        </tr>
        <tr>
            <th>Bidang Minat</th>
            <td>
                <?php if (empty($interests)): ?>
                    <span style="color: #94a3b8; font-style: italic;">Belum memilih minat</span>
                <?php else: ?>
                    <ul style="margin: 0; padding-left: 18px;">
                        <?php foreach ($interests as $interestKey): ?>
                            <?php 
                                $label = $interestOptions[$interestKey] ?? $interestKey; 
                            ?>
                            <li><?php echo e($label); ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <th>Subtotal Biaya</th>
            <td><?php echo rupiah($subtotal); ?></td>
        </tr>
        <tr>
            <th>Potongan Diskon</th>
            <td style="color: #ef4444;">- <?php echo rupiah($discountAmount); ?></td>
        </tr>
        <tr class="total-row">
            <td>Total Akhir</td>
            <td><?php echo rupiah($finalTotal); ?></td>
        </tr>
    </table>

    <div class="action-group">
        <a href="registration.php" class="btn">&larr; Daftar Lagi</a>
        <a href="history.php" class="btn btn-alt">Lihat Riwayat Pendaftaran &rarr;</a>
    </div>
</div>
</body>
</html>