<?php
// test-matrix.php - Matriks Pengujian Otomatis KursusKu
require_once __DIR__ . '/data.php';
require_once __DIR__ . '/helpers.php';

$siteName = 'KursusKu';
$year = date('Y');

// Daftar skenario pengujian (Test Cases)
$testCases = [
    [
        'no' => 1,
        'skenario' => 'Mahasiswa, Web Dasar, 1 paket',
        'type' => 'mahasiswa',
        'code' => 'web',
        'packages' => 1,
        'expected' => 240000
    ],
    [
        'no' => 2,
        'skenario' => 'Guru, PHP Dasar, 1 paket',
        'type' => 'guru',
        'code' => 'php',
        'packages' => 1,
        'expected' => 340000
    ],
    [
        'no' => 3,
        'skenario' => 'Umum, Laravel Dasar, 1 paket',
        'type' => 'umum',
        'code' => 'laravel',
        'packages' => 1,
        'expected' => 500000
    ],
    [
        'no' => 4,
        'skenario' => 'Mahasiswa, Web Dasar, 2 paket',
        'type' => 'mahasiswa',
        'code' => 'web',
        'packages' => 2,
        'expected' => 480000
    ],
    [
        'no' => 5,
        'skenario' => 'Guru, PHP Dasar, 2 paket',
        'type' => 'guru',
        'code' => 'php',
        'packages' => 2,
        'expected' => 680000
    ],
];
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Test Matrix - <?= htmlspecialchars($siteName) ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f8fafc; color: #1e293b; margin: 0; padding: 30px; }
        .container { max-width: 800px; background: white; padding: 35px; border-radius: 12px; margin: auto; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); }
        h1 { color: #2563eb; font-size: 1.5rem; margin-top: 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px 14px; border-bottom: 1px solid #e2e8f0; text-align: left; font-size: 0.95rem; }
        th { background: #f1f5f9; color: #475569; font-weight: 600; }
        .badge-pass { background: #dcfce7; color: #166534; padding: 4px 10px; border-radius: 20px; font-weight: 600; font-size: 0.85rem; }
        .badge-fail { background: #fee2e2; color: #991b1b; padding: 4px 10px; border-radius: 20px; font-weight: 600; font-size: 0.85rem; }
        .btn { display: inline-block; margin-top: 20px; background: #2563eb; color: white; padding: 10px 20px; text-decoration: none; border-radius: 6px; font-weight: 600; }
        .btn:hover { background: #1d4ed8; }
    </style>
</head>
<body>

<div class="container">
    <h1>📊 Matriks Pengujian Sistem (Test Matrix)</h1>
    <p>Pengujian otomatis fungsi perhitungan biaya dan diskon pada platform <?= htmlspecialchars($siteName) ?>.</p>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Skenario</th>
                <th>Actual Total</th>
                <th>Expected Total</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($testCases as $test): ?>
                <?php
                    $course = findCourse($courses, $test['code']);
                    $fee = $course ? $course['fee'] : 0;
                    $subtotal = $fee * $test['packages'];
                    $discountPercent = getDiscountPercent($test['type']);
                    $discountAmount = ($subtotal * $discountPercent) / 100;
                    $actualTotal = $subtotal - $discountAmount;

                    $isPassed = ($actualTotal == $test['expected']);
                ?>
                <tr>
                    <td><?= $test['no'] ?></td>
                    <td><?= htmlspecialchars($test['skenario']) ?></td>
                    <td><?= rupiah($actualTotal) ?></td>
                    <td><?= rupiah($test['expected']) ?></td>
                    <td>
                        <span class="<?= $isPassed ? 'badge-pass' : 'badge-fail' ?>">
                            <?= $isPassed ? 'PASS' : 'FAIL' ?>
                        </span>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <a href="index.php" class="btn">&larr; Kembali ke Beranda</a>
</div>

</body>
</html>