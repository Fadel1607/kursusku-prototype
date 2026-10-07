<?php
// history.php - Halaman Riwayat Pendaftaran
session_start();
require_once 'helpers.php';

$siteName = "KursusKu";
$registrations = $_SESSION['registrations'] ?? [];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pendaftaran - <?php echo $siteName; ?></title>
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --bg-body: #f8fafc;
            --bg-card: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
            --border-color: #e2e8f0;
        }
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: var(--bg-body); color: var(--text-main); margin: 0; padding: 40px 20px; }
        .container { max-width: 950px; background: var(--bg-card); padding: 40px; border-radius: 16px; margin: auto; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); position: relative; overflow: hidden; border: 1px solid var(--border-color); }
        
        .container::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 6px;
            background: linear-gradient(90deg, #2563eb, #38bdf8, #f59e0b);
        }

        .header-title { display: flex; align-items: center; gap: 15px; margin-bottom: 8px; }
        h2 { color: var(--text-main); margin: 0; font-size: 1.8rem; font-weight: 800; }
        .lightning-icon { font-size: 2rem; animation: bounce-lightning 1.2s infinite alternate; }

        @keyframes bounce-lightning {
            0% { transform: translateY(0) scale(1); filter: drop-shadow(0 0 2px rgba(245,158,11,0.5)); }
            100% { transform: translateY(-4px) scale(1.15); filter: drop-shadow(0 0 8px rgba(245,158,11,0.8)); }
        }

        p.desc { color: var(--text-muted); margin-top: 0; margin-bottom: 30px; font-size: 1.05rem; }

        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { padding: 14px 16px; border-bottom: 1px solid var(--border-color); text-align: left; font-size: 0.95rem; }
        th { background: #f1f5f9; color: var(--text-main); font-weight: 600; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.05em; }
        tr:hover { background: #f8fafc; }

        .empty-state { text-align: center; padding: 40px; color: var(--text-muted); font-style: italic; }
        
        .action-group { margin-top: 30px; display: flex; gap: 15px; }
        .btn { display: inline-block; padding: 10px 20px; background: var(--primary); color: white; text-decoration: none; border-radius: 6px; font-weight: 600; transition: background 0.2s; }
        .btn:hover { background: var(--primary-dark); }
        .btn-alt { background: #ef4444; }
        .btn-alt:hover { background: #dc2626; }
    </style>
</head>
<body>

<div class="container">
    <div class="header-title">
        <span class="lightning-icon">⚡</span>
        <h2>Riwayat Pendaftaran KursusKu</h2>
    </div>
    <p class="desc">Berikut adalah daftar peserta yang telah mendaftar melalui form secara langsung:</p>

    <?php if (empty($registrations)): ?>
        <div class="empty-state">
            Belum ada data pendaftaran yang tersimpan. Silakan isi form di halaman pendaftaran terlebih dahulu! 🚀
        </div>
    <?php else: ?>
        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th>Waktu</th>
                        <th>Nama Lengkap</th>
                        <th>Kontak (HP/Email)</th>
                        <th>Kursus & Paket</th>
                        <th>Tipe / Mode</th>
                        <th>Total Biaya</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($registrations as $reg): ?>
                    <tr>
                        <td style="font-size: 0.85rem; color: var(--text-muted);"><?php echo e($reg['date']); ?></td>
                        <td><strong><?php echo e($reg['fullname']); ?></strong></td>
                        <td>
                            <?php echo e($reg['phone']); ?><br>
                            <small style="color: var(--text-muted);"><?php echo e($reg['email']); ?></small>
                        </td>
                        <td>
                            <?php echo e($reg['course_name']); ?><br>
                            <span style="font-size: 0.85rem; color: var(--primary); font-weight: 600;"><?php echo $reg['packages']; ?> Paket Sesi</span>
                        </td>
                        <td>
                            <?php echo e($reg['participant_type']); ?><br>
                            <small style="color: var(--text-muted);"><?php echo e($reg['learning_mode']); ?></small>
                        </td>
                        <td><strong><?php echo rupiah($reg['final_total']); ?></strong></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php endif; ?>

    <div class="action-group">
        <a href="registration.php" class="btn">&larr; Tambah Pendaftaran Baru</a>
        <a href="index.php" class="btn" style="background: #0f172a;">Kembali ke Beranda</a>
        
        <?php if (!empty($registrations)): ?>
            <!-- Tombol Opsional untuk Mereset Riwayat Session -->
            <a href="history.php?reset=true" class="btn btn-alt" onclick="return confirm('Yakin ingin menghapus semua riwayat?')">Reset Riwayat</a>
        <?php endif; ?>
    </div>
</div>

<?php
// Fitur reset session jika tombol reset diklik
if (isset($_GET['reset']) && $_GET['reset'] === 'true') {
    unset($_SESSION['registrations']);
    header('Location: history.php');
    exit;
}
?>
</body>
</html>