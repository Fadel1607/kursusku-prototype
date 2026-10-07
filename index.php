<?php
require_once 'helpers.php';

// Variabel Konfigurasi
$siteName = "KursusKu";
$tagline  = "Platform Pelatihan & Sertifikasi Digital Terpercaya";
$year     = date('Y');

// Array Data Katalog Kursus (Dinamis - Pertemuan 4)
$courses = [
    [
        'id' => 101,
        'judul' => 'Web Development Fundamentals',
        'kategori' => 'Programming',
        'harga' => 450000,
        'kapasitas' => 30,
        'terisi' => 22,
        'status' => 'aktif',
        'tanggal' => '2026-10-01'
    ],
    [
        'id' => 102,
        'judul' => 'Mastering Laravel Framework',
        'kategori' => 'Programming',
        'harga' => 750000,
        'kapasitas' => 25,
        'terisi' => 25,
        'status' => 'penuh',
        'tanggal' => '2026-10-05'
    ],
    [
        'id' => 103,
        'judul' => 'UI/UX Design for Beginner',
        'kategori' => 'Design',
        'harga' => 350000,
        'kapasitas' => 20,
        'terisi' => 12,
        'status' => 'aktif',
        'tanggal' => '2026-10-10'
    ],
    [
        'id' => 104,
        'judul' => 'Data Science Dasar dengan Python',
        'kategori' => 'Data',
        'harga' => 600000,
        'kapasitas' => 20,
        'terisi' => 5,
        'status' => 'aktif',
        'tanggal' => '2026-10-15'
    ],
    [
        'id' => 105,
        'judul' => 'Digital Marketing Essentials',
        'kategori' => 'Business',
        'harga' => 300000,
        'kapasitas' => 40,
        'terisi' => 0,
        'status' => 'segera',
        'tanggal' => '2026-11-01'
    ],
    [
        'id' => 106,
        'judul' => 'Cybersecurity Awareness',
        'kategori' => 'IT & Security',
        'harga' => 500000,
        'kapasitas' => 15,
        'terisi' => 15,
        'status' => 'penuh',
        'tanggal' => '2026-10-20'
    ]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $siteName; ?> - <?php echo $tagline; ?></title>
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --bg-body: #f8fafc;
            --text-main: #1e293b;
            --border-color: #e2e8f0;
        }
        html { scroll-behavior: smooth; } /* Efek gulir halus saat klik menu */
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; padding: 0; background-color: var(--bg-body); color: var(--text-main); line-height: 1.6; }
        header { background: linear-gradient(135deg, var(--primary), var(--primary-dark)); color: white; padding: 25px 40px; display: flex; align-items: center; gap: 20px; box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); }
        nav { background: #1e293b; padding: 12px 40px; display: flex; flex-wrap: wrap; gap: 15px; position: sticky; top: 0; z-index: 1000; }
        nav a { color: #cbd5e1; text-decoration: none; font-weight: 600; font-size: 0.95rem; transition: color 0.2s; }
        nav a:hover { color: white; }
        main { padding: 40px 20px; max-width: 1100px; margin: auto; }
        
        .hero { display: flex; gap: 30px; align-items: center; margin-bottom: 40px; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
        .hero img, .hero video { max-width: 100%; border-radius: 8px; }
        .media-box { flex: 1; }
        
        .table-container { background: white; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); overflow: hidden; padding: 20px; margin-bottom: 40px; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { padding: 14px 16px; border-bottom: 1px solid var(--border-color); text-align: left; font-size: 0.95rem; }
        th { background: #f1f5f9; color: var(--text-main); font-weight: 600; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 0.05em; }
        tr:hover { background: #f8fafc; }
        
        footer { background: #0f172a; color: #94a3b8; text-align: center; padding: 30px; margin-top: 60px; font-size: 0.9rem; }
        .btn { display: inline-block; padding: 10px 20px; background: var(--primary); color: white; text-decoration: none; border-radius: 6px; font-weight: 600; transition: background 0.2s; }
        .btn:hover { background: var(--primary-dark); }
        
        h2 { color: var(--text-main); margin-top: 0; }
    </style>
</head>
<body>

    <header style="display: flex; align-items: center; gap: 20px;">
        <div style="flex-shrink: 0;">
            <img src="assets/images.PNG/hero-kursusku.Png" alt="Logo KursusKu" style="height: 55px; width: 55px; border-radius: 50%; object-fit: cover; border: 2px solid rgba(255,255,255,0.8);">
        </div>
        <div>
            <h1 style="margin: 0; font-size: 1.8rem;"><?php echo $siteName; ?></h1>
            <p style="margin: 0; opacity: 0.9; font-size: 0.95rem;"><?php echo $tagline; ?></p>
        </div>
    </header>

    <!-- Navigasi Diperbarui dengan Keunggulan & Kontak -->
    <nav>
        <a href="index.php">Beranda</a>
        <a href="#keunggulan">Keunggulan</a>
        <a href="#katalog">Katalog Kursus</a>
        <a href="fee-calculator.php">Kalkulator Biaya</a>
        <a href="#kontak">Kontak</a>
        <a href="registration.php">Daftar Kursus</a>
        <a href="loop-lab.php">Lab Perulangan</a>
        <a href="test-matrix.php" style="color: #2563eb;">Test Matrix</a>
        
    </nav>

    <main>
        <!-- Section Hero -->
        <section class="hero">
            <div class="media-box">
                <h2>Selamat Datang di KursusKu</h2>
                <p>Tingkatkan keahlian digital Anda bersama instruktur berpengalaman. Pilihlah dari katalog kursus interaktif kami di bawah ini.</p>
                <a href="fee-calculator.php" class="btn">Hitung Biaya Pendaftaran Grup</a>
            </div>
            <div class="media-box">
                <img src="assets/images/hero-kursus.jpg" alt="Hero KursusKu" onerror="this.src='https://via.placeholder.com/400x225?text=Gambar+Hero+KursusKu'">
            </div>
        </section>

        <!-- Section Keunggulan (Baru Ditambahkan) -->
        <section id="keunggulan" style="margin-bottom: 40px;">
            <h2>Mengapa Memilih KursusKu?</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 20px; margin-top: 20px;">
                <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                    <h3 style="color: var(--primary); margin-top: 0;">🚀 Kurikulum Industri</h3>
                    <p style="color: #64748b; font-size: 0.95rem; margin-bottom: 0;">Materi dirancang dan diperbarui secara berkala sesuai kebutuhan tren teknologi serta standar industri saat ini.</p>
                </div>
                <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                    <h3 style="color: var(--primary); margin-top: 0;">👨‍🏫 Instruktur Berpengalaman</h3>
                    <p style="color: #64748b; font-size: 0.95rem; margin-bottom: 0;">Belajar langsung dari praktisi profesional yang ahli dan berpengalaman di bidangnya masing-masing.</p>
                </div>
                <div style="background: white; padding: 25px; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
                    <h3 style="color: var(--primary); margin-top: 0;">📜 Sertifikat Resmi</h3>
                    <p style="color: #64748b; font-size: 0.95rem; margin-bottom: 0;">Dapatkan sertifikat kelulusan resmi setelah menyelesaikan kursus untuk menunjang portofolio karier Anda.</p>
                </div>
            </div>
        </section>

        <!-- Section Video Intro -->
        <section style="margin-bottom: 40px; background: white; padding: 30px; border-radius: 12px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);">
            <h3 style="margin-top: 0;">Video Pengenalan</h3>
            <video controls width="100%" style="max-width: 100%; border-radius: 8px;">
                <source src="assets/video/intro-kursus.mp4" type="video/mp4">
                Browser Anda tidak mendukung elemen video.
            </video>
        </section>

        <!-- Section Katalog Kursus -->
        <section id="katalog" class="table-container">
            <h2>Katalog Kursus Tersedia</h2>
            <p style="color: #64748b; margin-bottom: 20px;">Data berikut dirender secara dinamis menggunakan sintaks PHP dan modul <code>helpers.php</code>.</p>

            <div style="overflow-x: auto;">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Judul Kursus</th>
                            <th>Kategori</th>
                            <th>Mulai Kelas</th>
                            <th>Biaya</th>
                            <th>Kapasitas</th>
                            <th>Sisa Kursi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($courses as $c): ?>
                        <?php $sisa = sisaKursi($c['kapasitas'], $c['terisi']); ?>
                        <tr>
                            <td><?php echo $c['id']; ?></td>
                            <td><strong><?php echo $c['judul']; ?></strong></td>
                            <td><?php echo $c['kategori']; ?></td>
                            <td><?php echo formatTanggal($c['tanggal']); ?></td>
                            <td><?php echo rupiah($c['harga']); ?></td>
                            <td><?php echo $c['kapasitas']; ?> Orang</td>
                            <td><?php echo $sisa; ?> Kursi</td>
                            <td><?php echo statusKursus($c['status']); ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <!-- Footer dengan ID Kontak agar navigasi berfungsi -->
    <footer id="kontak">
        <p style="margin: 0 0 10px 0; font-size: 1.05rem; font-weight: 600; color: white;"><?php echo $siteName; ?> &mdash; <?php echo $tagline; ?></p>
        <p>&copy; <?php echo $year; ?> <?php echo $siteName; ?>. Hak Cipta Dilindungi Undang-Undang.</p>
        <p style="margin-top: 10px;">Hubungi Kami: <a href="mailto:fadel160705@gmail.com" style="color: #38bdf8; text-decoration: none;">fadel160705@gmail.com</a></p>
    </footer>

</body>
</html>