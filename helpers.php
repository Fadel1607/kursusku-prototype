<?php
// helpers.php - Kumpulan fungsi bantu (helpers) lengkap (Pertemuan 4 - 6)

// --- FUNGSI DARI PERTEMUAN SEBELUMNYA ---

// Function 1: Format Rupiah
function rupiah(int $amount): string
{
    return 'Rp ' . number_format($amount, 0, ',', '.');
}

// Function 2: Status Kursus
function statusKursus(string $status): string
{
    if ($status === 'aktif') {
        return '<span style="color: green; font-weight: bold;">[ Buka ]</span>';
    } elseif ($status === 'penuh') {
        return '<span style="color: red; font-weight: bold;">[ Penuh ]</span>';
    }
    return '<span style="color: orange; font-weight: bold;">[ Segera ]</span>';
}

// Function 3: Sisa Kursi
function sisaKursi(int $quota, int $registered): int
{
    return max(0, $quota - $registered);
}

// Function 4: Format Tanggal
function formatTanggal(string $date): string
{
    $value = new DateTimeImmutable($date);
    return $value->format('d-m-Y');
}


// --- FUNGSI TAMBAHAN UNTUK PERTEMUAN 6 ---

/**
 * Mengamankan output teks dari serangan XSS
 */
function e(string $value): string
{
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
}

/**
 * Mencari data kursus berdasarkan kodenya
 */
function findCourse(array $courses, string $code): ?array
{
    foreach ($courses as $course) {
        if ($course['code'] === $code) {
            return $course;
        }
    }
    return null;
}

/**
 * Menentukan persentase diskon berdasarkan tipe peserta (Percabangan if/elseif)
 */
function getDiscountPercent(string $participantType): int
{
    if ($participantType === 'mahasiswa') {
        return 20;
    } elseif ($participantType === 'guru') {
        return 15;
    }
    return 0; // Untuk umum
}

/**
 * Mendapatkan label teks dari kode metode belajar (Percabangan switch)
 */
function getLearningModeLabel(string $mode): string
{
    switch ($mode) {
        case 'offline':
            return 'Tatap Muka (Offline)';
        case 'online':
            return 'Online (Daring)';
        case 'hybrid':
            return 'Hybrid (Gabungan)';
        default:
            return 'Tidak Diketahui';
    }
}