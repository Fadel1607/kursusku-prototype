<?php
// data.php - Sumber data array statis untuk kursus, minat, dan fasilitas

$courses = [
    [
        'code' => 'web-dasar',
        'name' => 'Web Development Dasar',
        'fee'  => 350000,
    ],
    [
        'code' => 'php-oop',
        'name' => 'PHP & OOP Lanjutan',
        'fee'  => 500000,
    ],
    [
        'code' => 'laravel-pro',
        'name' => 'Fullstack Laravel Framework',
        'fee'  => 750000,
    ],
];

$interestOptions = [
    'frontend'  => 'Frontend Development',
    'backend'   => 'Backend Development',
    'fullstack' => 'Fullstack Engineering',
    'database'  => 'Database Administrator',
];

$facilities = [
    'Modul Belajar PDF & Video Eksklusif',
    'Grup Diskusi & Mentorship via Discord',
    'Sertifikat Kelulusan Resmi',
    'Akses Rekaman Selamanya',
];