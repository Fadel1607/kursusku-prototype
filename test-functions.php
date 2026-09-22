<?php
require_once 'helpers.php';

echo "<h2>Unit Test Fungsi Helpers (Pertemuan 4)</h2>";
echo "<pre>";

function runTest($testName, $actual, $expected) {
    if ($actual === $expected) {
        echo "[ PASS ] $testName\n";
    } else {
        echo "[ FAIL ] $testName | Hasil: '$actual' | Ekspektasi: '$expected'\n";
    }
}

// Test 1: Fungsi rupiah()
runTest("Pengujian rupiah() - Angka Positif", rupiah(150000), "Rp 150.000");
runTest("Pengujian rupiah() - Angka Nol", rupiah(0), "Rp 0");

// Test 2: Fungsi sisaKursi()
runTest("Pengujian sisaKursi() - Kursi Tersedia", sisaKursi(20, 15), 5);
runTest("Pengujian sisaKursi() - Kursi Penuh", sisaKursi(20, 20), 0);
runTest("Pengujian sisaKursi() - Overbooked", sisaKursi(20, 25), 0);

// Test 3: Fungsi statusKursus()
runTest("Pengujian statusKursus() - Buka", statusKursus('aktif'), '<span style="color: green; font-weight: bold;">[ Buka ]</span>');
runTest("Pengujian statusKursus() - Penuh", statusKursus('penuh'), '<span style="color: red; font-weight: bold;">[ Penuh ]</span>');

// Test 4: Fungsi formatTanggal()
runTest("Pengujian formatTanggal() - Format Standar", formatTanggal('2026-10-25'), "25 Oktober 2026");

echo "</pre>";
echo '<p><a href="index.php">&larr; Kembali ke Beranda</a></p>';