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
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; color: #333; line-height: 1.6; }
        header { background: #0d6efd; color: white; padding: 20px 40px; display: flex; align-items: center; gap: 15px; }
        nav { background: #0b5ed7; padding: 10px 40px; display: flex; flex-wrap: wrap; gap: 5px; }
        nav a { color: white; margin-right: 20px; text-decoration: none; font-weight: bold; }
        main { padding: 40px; max-width: 1100px; margin: auto; }
        .hero { display: flex; gap: 20px; align-items: center; margin-bottom: 40px; background: #f8f9fa; padding: 20px; border-radius: 8px; }
        .hero img, .hero video { max-width: 100%; border-radius: 6px; }
        .media-box { flex: 1; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { padding: 12px; border: 1px solid #ddd; text-align: left; }
        th { background: #0d6efd; color: white; }
        tr:nth-child(even) { background: #f9f9f9; }
        footer { background: #212529; color: white; text-align: center; padding: 15px; margin-top: 40px; }
        .btn { display: inline-block; padding: 8px 16px; background: #198754; color: white; text-decoration: none; border-radius: 4px; }
    </style>
</head>
<body>

    <header>
        <!-- Logo Web -->
        <img src="assets/images/logo.png" alt="Logo KursusKu" style="height: 50px; width: auto;" onerror="this.style.display='none'">
        <div>
            <h1 style="margin: 0;"><?php echo $siteName; ?></h1>
            <p style="margin: 0; opacity: 0.9;"><?php echo $tagline; ?></p>
        </div>
    </header>

    <nav>
        <a href="index.php">Beranda</a>
        <a href="#katalog">Katalog Kursus</a>
        <a href="fee-calculator.php">Kalkulator Biaya</a>
        <a href="server-time.php">Uji Server Time</a>
        <a href="test-functions.php">Uji Fungsi (Unit Test)</a>
        <a href="registration.php">Daftar Kursus</a> <!-- TOMBOL PERTEMUAN 5 DITAMBAHKAN DI SINI -->
    </nav>

    <main>
        <!-- Section Hero (Pertemuan 2) -->
        <section class="hero">
            <div class="media-box">
                <h2>Selamat Datang di KursusKu</h2>
                <p>Tingkatkan keahlian digital Anda bersama instruktur berpengalaman. Pilihlah dari katalog kursus interaktif kami di bawah ini.</p>
                <a href="fee-calculator.php" class="btn">Hitung Biaya Pendaftaran Grup</a>
            </div>
            <div class="media-box">
                <!-- Gambar Hero -->
                <img src="assets/images/hero-kursus.jpg" alt="Hero KursusKu" onerror="this.src='https://via.placeholder.com/400x225?text=Gambar+Hero+KursusKu'">
            </div>
        </section>

        <!-- Section Video Intro (Pertemuan 2) -->
        <section style="margin-bottom: 40px;">
            <h3>Video Pengenalan</h3>
            <video controls width="100%" style="max-width: 600px;">
                <source src="assets/video/intro-kursus.mp4" type="video/mp4">
                Browser Anda tidak mendukung elemen video.
            </video>
        </section>

        <!-- Section Katalog Kursus Dinamis (Pertemuan 4) -->
        <section id="katalog">
            <h2>Katalog Kursus Tersedia</h2>
            <p>Data berikut dirender secara dinamis menggunakan sintaks PHP dan modul <code>helpers.php</code>.</p>

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
        </section>
    </main>

    <footer>
        <p>&copy; <?php echo $year; ?> <?php echo $siteName; ?>. Hak Cipta Dilindungi Undang-Undang.</p>
        <p>Hubungi Kami: <a href="mailto:fadel160705@gmail.com" style="color: #ffc107; text-decoration: none;">fadel160705@gmail.com</a></p>
    </footer>

</body>
</html>