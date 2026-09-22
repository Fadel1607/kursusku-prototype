<?php
/**
 * helpers.php - Fungsi Pembantu Reusable
 */

// 1. Format Angka ke Rupiah
function rupiah($angka) {
    if (!is_numeric($angka)) {
        return "Rp 0";
    }
    return "Rp " . number_format($angka, 0, ',', '.');
}

// 2. Format Badge Status Kursus
function statusKursus($status) {
    $status = strtolower(trim($status));
    switch ($status) {
        case 'aktif':
        case 'buka':
            return '<span style="color: green; font-weight: bold;">[ Buka ]</span>';
        case 'penuh':
            return '<span style="color: red; font-weight: bold;">[ Penuh ]</span>';
        case 'segera':
            return '<span style="color: orange; font-weight: bold;">[ Segera ]</span>';
        default:
            return '<span style="color: gray;">[ ' . ucfirst($status) . ' ]</span>';
    }
}

// 3. Menghitung Sisa Kursi
function sisaKursi($kapasitas, $terisi) {
    $sisa = $kapasitas - $terisi;
    return $sisa > 0 ? $sisa : 0;
}

// 4. Format Tanggal ke Bahasa Indonesia
function formatTanggal($tanggalStr) {
    $timestamp = strtotime($tanggalStr);
    if (!$timestamp) {
        return $tanggalStr;
    }

    $bulanIndo = [
        1 => 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    $hari = date('d', $timestamp);
    $bulan = $bulanIndo[(int)date('m', $timestamp)];
    $tahun = date('Y', $timestamp);

    return "$hari $bulan $tahun";
}