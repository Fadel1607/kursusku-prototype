<?php
// registration.php - Form Pendaftaran Kursus
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
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --bg-body: #f8fafc;
            --text-main: #1e293b;
            --border-color: #e2e8f0;
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
        h2 { color: var(--text-main); margin: 0; font-size: 1.5rem; }
        .lightning-icon { font-size: 1.5rem; animation: pulse-lightning 1.5s infinite; }

        @keyframes pulse-lightning {
            0% { transform: scale(1); opacity: 1; }
            50% { transform: scale(1.2); opacity: 0.7; color: #f59e0b; }
            100% { transform: scale(1); opacity: 1; }
        }

        p.desc { color: #64748b; margin-top: 0; margin-bottom: 25px; }

        .form-group { margin-bottom: 20px; }
        label { display: block; font-weight: 600; margin-bottom: 8px; font-size: 0.9rem; }
        input[type="text"], input[type="email"], select, textarea { width: 100%; padding: 10px 14px; border: 1px solid var(--border-color); border-radius: 6px; font-size: 1rem; box-sizing: border-box; transition: border-color 0.2s; font-family: inherit; }
        input:focus, select:focus, textarea:focus { outline: none; border-color: var(--primary); box-shadow: 0 0 0 3px rgba(37,99,235,0.1); }

        .radio-group, .checkbox-group { display: flex; flex-direction: column; gap: 8px; margin-top: 5px; }
        .radio-item, .checkbox-item { display: flex; align-items: center; gap: 8px; font-weight: normal; font-size: 0.95rem; cursor: pointer; }

        .btn-submit { width: 100%; padding: 12px; background: var(--primary); color: white; border: none; border-radius: 6px; font-size: 1rem; font-weight: 600; cursor: pointer; transition: background 0.2s; margin-top: 10px; }
        .btn-submit:hover { background: var(--primary-dark); }

        .back-link { display: inline-block; margin-top: 20px; color: var(--primary); text-decoration: none; font-weight: 600; font-size: 0.95rem; }
        .back-link:hover { text-decoration: underline; }
    </style>
</head>
<body>

<div class="container">
    <div class="header-title">
        <span class="lightning-icon">⚡</span>
        <h2>Formulir Pendaftaran Kursus</h2>
    </div>
    <p class="desc">Silakan isi data diri Anda dengan lengkap untuk mendaftar ke program KursusKu.</p>

    <form action="process-registration.php" method="POST">
            <form action="process-registration.php" method="POST">
        <input type="hidden" name="source" value="kursusku">
        <div class="form-group">
            <label>Nama Lengkap:</label>
            <input type="text" name="fullname" placeholder="Masukkan nama lengkap..." required>
        </div>

        <div class="form-group">
            <label>Alamat Email:</label>
            <input type="email" name="email" placeholder="nama@email.com" required>
        </div>

        <div class="form-group">
            <label>Nomor HP / WhatsApp:</label>
            <input type="text" name="phone" placeholder="Contoh: 081234567890" required>
        </div>

        <div class="form-group">
            <label>Pilih Kursus:</label>
            <select name="course_code" required>
                <option value="">-- Pilih Kursus Tersedia --</option>
                <?php foreach ($courses as $c): ?>
                    <option value="<?php echo e($c['code']); ?>"><?php echo e($c['name']); ?> (<?php echo rupiah($c['fee']); ?>)</option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label>Tipe Peserta:</label>
            <div class="radio-group">
                <label class="radio-item"><input type="radio" name="participant_type" value="mahasiswa" required> Mahasiswa (Diskon 20%)</label>
                <label class="radio-item"><input type="radio" name="participant_type" value="guru"> Guru/Dosen (Diskon 15%)</label>
                <label class="radio-item"><input type="radio" name="participant_type" value="umum" checked> Umum (Tanpa Diskon)</label>
            </div>
        </div>

        <div class="form-group">
            <label>Metode Belajar:</label>
            <select name="learning_mode" required>
                <option value="">-- Pilih Metode --</option>
                <option value="online">Online (E-Learning)</option>
                <option value="offline">Tatap Muka (Talaqqi / Kelas Fisik)</option>
                <option value="hybrid">Hybrid (Gabungan Online & Offline)</option>
            </select>
        </div>

        <div class="form-group">
            <label>Jumlah Paket Sesi:</label>
            <select name="packages">
                <option value="1">1 Paket (Kelipatan Harga Dasar)</option>
                <option value="2">2 Paket Sesi</option>
                <option value="3">3 Paket Sesi</option>
            </select>
        </div>

        <div class="form-group">
            <label>Bidang Minat (Bisa pilih lebih dari satu):</label>
            <div class="checkbox-group">
                <?php foreach ($interestOptions as $key => $label): ?>
                    <label class="checkbox-item"><input type="checkbox" name="interests[]" value="<?php echo e($key); ?>"> <?php echo e($label); ?></label>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- KOLOM CATATAN YANG DITAMBAHKAN -->
        <div class="form-group">
            <label>Catatan:</label>
            <textarea name="note" rows="4" placeholder="Tuliskan kebutuhan belajar Anda (opsional)"></textarea>
            <small style="color: #64748b;">Maksimal 300 karakter.</small>
        </div>

        <button type="submit" class="btn-submit">Kirim Pendaftaran ⚡</button>
    </form>

    <a href="index.php" class="back-link">&larr; Kembali ke Beranda</a>
</div>

</body>
</html>