<?php
// loop-lab.php - Laboratorium Perulangan (Pertemuan 6)
require_once 'helpers.php';

$siteName = "KursusKu";

// Data sampel untuk simulasi perulangan
$kategoriKursus = ['🚀 Programming', '🎨 UI/UX Design', '📊 Data Science', '💼 Digital Marketing', '🔒 Cybersecurity'];
$pesertaPelatihan = [
    ['nama' => 'Andi Pratama', 'kursus' => 'Web Development', 'status' => 'Semangat 100% 🔥'],
    ['nama' => 'Siti Aminah', 'kursus' => 'UI/UX Design', 'status' => 'Fokus Juara 🌟'],
    ['nama' => 'Budi Santoso', 'kursus' => 'Data Science Dasar', 'status' => 'Konsisten 💪'],
    ['nama' => 'Dewi Lestari', 'kursus' => 'Mastering Laravel', 'status' => 'Produktif 🚀']
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laboratorium Perulangan Semangat Belajar - <?php echo $siteName; ?></title>
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
        .container { max-width: 850px; background: var(--bg-card); padding: 40px; border-radius: 16px; margin: auto; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1), 0 2px 4px -2px rgba(0,0,0,0.1); position: relative; overflow: hidden; border: 1px solid var(--border-color); }
        
        /* Aksen Kilat dan Semangat di Atas Kartu */
        .container::before {
            content: "";
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 6px;
            background: linear-gradient(90deg, #2563eb, #38bdf8, #f59e0b, #ec4899);
        }

        .header-title { display: flex; align-items: center; gap: 15px; margin-bottom: 8px; }
        h2 { color: var(--text-main); margin: 0; font-size: 1.8rem; font-weight: 800; letter-spacing: -0.025em; }
        .lightning-icon { font-size: 2rem; animation: bounce-lightning 1.2s infinite alternate; }

        @keyframes bounce-lightning {
            0% { transform: translateY(0) scale(1); filter: drop-shadow(0 0 2px rgba(245,158,11,0.5)); }
            100% { transform: translateY(-4px) scale(1.15); filter: drop-shadow(0 0 8px rgba(245,158,11,0.8)); }
        }

        p.desc { color: var(--text-muted); margin-top: 0; margin-bottom: 30px; font-size: 1.05rem; }

        .lab-section { background: #f8fafc; border: 1px solid var(--border-color); border-radius: 12px; padding: 25px; margin-bottom: 25px; transition: transform 0.2s, border-color 0.2s; }
        .lab-section:hover { border-color: var(--primary); transform: translateY(-2px); }
        .lab-section h3 { margin-top: 0; color: var(--primary); font-size: 1.2rem; display: flex; align-items: center; gap: 8px; }

        ul { margin: 0; padding-left: 20px; color: var(--text-muted); }
        li { margin-bottom: 8px; font-size: 1rem; }
        li strong { color: var(--text-main); }

        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { padding: 14px 16px; border-bottom: 1px solid var(--border-color); text-align: left; font-size: 0.95rem; }
        th { background: #f1f5f9; color: var(--text-main); font-weight: 600; text-transform: uppercase; font-size: 0.8rem; letter-spacing: 0.05em; }
        tr:hover { background: #f1f5f9; }

        .badge-session { display: inline-block; background: linear-gradient(135deg, #2563eb, #1d4ed8); color: white; padding: 5px 12px; border-radius: 20px; font-size: 0.85rem; font-weight: 600; margin-bottom: 6px; box-shadow: 0 2px 4px rgba(37,99,235,0.2); }
        .badge-coupon { display: inline-block; background: #fef3c7; color: #d97706; border: 1px solid #fde68a; padding: 6px 14px; border-radius: 8px; margin-right: 8px; margin-bottom: 8px; font-size: 0.9rem; font-weight: 700; }
        .badge-category { background: #e0f2fe; color: #0284c7; border: 1px solid #bae6fd; padding: 8px 16px; border-radius: 8px; font-size: 0.95rem; font-weight: 600; display: inline-block; }

        .motivation-box { background: linear-gradient(135deg, #eff6ff, #f0fdf4); border: 1px solid #bfdbfe; border-radius: 10px; padding: 15px 20px; margin-top: 15px; text-align: center; font-weight: 600; color: #1e40af; font-size: 1.05rem; }

        .back-link { display: inline-flex; align-items: center; gap: 8px; margin-top: 10px; color: var(--primary); text-decoration: none; font-weight: 600; font-size: 1rem; transition: color 0.2s; }
        .back-link:hover { color: var(--primary-dark); text-decoration: underline; }
    </style>
</head>
<body>

<div class="container">
    <div class="header-title">
        <span class="lightning-icon">⚡</span>
        <h2>Laboratorium Perulangan Semangat Belajar!</h2>
    </div>
    <p class="desc">Akselerasi kemampuan PHP-mu melalui simulasi perulangan dinamis. Konsisten hari ini, sukses karier masa depan! 🚀</p>

    <!-- 1. Perulangan FOR -->
    <div class="lab-section">
        <h3>🔥 1. Perulangan <code>for</code> &mdash; Perjalanan Level Belajar</h3>
        <p style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 15px;">Setiap langkah kecil membawamu lebih dekat menjadi *Expert Developer*:</p>
        <div style="display: flex; gap: 10px; flex-wrap: wrap;">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <div style="background: white; border: 1px solid var(--border-color); padding: 12px 18px; border-radius: 8px; text-align: center; flex: 1; min-width: 120px; box-shadow: 0 1px 2px rgba(0,0,0,0.05);">
                    <span class="badge-session">Level <?php echo $i; ?></span>
                    <div style="font-size: 0.85rem; color: var(--text-muted); margin-top: 4px;">Modul #<?php echo $i; ?> Selesai</div>
                </div>
            <?php endfor; ?>
        </div>
    </div>

    <!-- 2. Perulangan WHILE -->
    <div class="lab-section">
        <h3>⚡ 2. Perulangan <code>while</code> &mdash; Kuota Beasiswa Kilat</h3>
        <p style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 12px;">Simulasi pengklaiman kupon potongan eksklusif secara otomatis:</p>
        <div>
            <?php 
            $sisaKupon = 4;
            while ($sisaKupon > 0) {
                echo "<span class='badge-coupon'>🎟️ Kupon Beasiswa #$sisaKupon (Aktif)</span>";
                $sisaKupon--;
            }
            ?>
        </div>
        <div class="motivation-box">
            🎯 "Diskon dan kesempatan belajar ada untuk yang bergerak cepat!"
        </div>
    </div>

    <!-- 3. Perulangan FOREACH (Array 1 Dimensi) -->
    <div class="lab-section">
        <h3>💡 3. Perulangan <code>foreach</code> &mdash; Pilihan Jalur Karier Impian</h3>
        <p style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 15px;">Pilih jalur keahlian yang paling membakar semangat belajarmu:</p>
        <div style="display: flex; gap: 12px; flex-wrap: wrap;">
            <?php foreach ($kategoriKursus as $kategori): ?>
                <span class="badge-category"><?php echo e($kategori); ?></span>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- 4. Perulangan FOREACH (Array Multidimensi / Tabel) -->
    <div class="lab-section">
        <h3>🏆 4. Perulangan Tabel Dinamis &mdash; Pejuang Kelas KursusKu</h3>
        <p style="color: var(--text-muted); font-size: 0.95rem; margin-bottom: 10px;">Daftar peserta yang sedang berjuang menaikkan skill bersama:</p>
        <div style="overflow-x: auto;">
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pejuang Kode</th>
                        <th>Program Kursus</th>
                        <th>Status Semangat</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; foreach ($pesertaPelatihan as $peserta): ?>
                    <tr>
                        <td><strong>#<?php echo $no++; ?></strong></td>
                        <td><span style="color: var(--text-main); font-weight: 600;"><?php echo e($peserta['nama']); ?></span></td>
                        <td><?php echo e($peserta['kursus']); ?></td>
                        <td><span style="color: #059669; font-weight: 700; background: #ecfdf5; padding: 4px 10px; border-radius: 6px; border: 1px solid #a7f3d0;"><?php echo e($peserta['status']); ?></span></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <a href="index.php" class="back-link">&larr; Kembali ke Beranda Utama</a>
</div>

</body>
</html>