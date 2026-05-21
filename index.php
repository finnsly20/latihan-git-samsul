<?php
/**
 * FUNGSI LOGIKA (NATIVE PHP)
 * Menentukan Huruf dan Indeks berdasarkan Nilai Angka
 */
function getGrade($nilai) {
    if ($nilai >= 85) return ["huruf" => "A", "indeks" => 4];
    if ($nilai >= 70) return ["huruf" => "B", "indeks" => 3];
    if ($nilai >= 59) return ["huruf" => "C", "indeks" => 2];
    if ($nilai >= 50) return ["huruf" => "D", "indeks" => 1];
    return ["huruf" => "E", "indeks" => 0];
}

// 1. DATA MASTER (Simulasi Database)
$courses = [
    ["Matematika Diskrit", "SI244103", 3, 70],
    ["Sistem Informasi Perusahaan", "SI244107", 2, 90],
    ["Bahasa Indonesia", "SI244108", 2, 89],
    ["Wawasan Teknologi Informasi", "SI244101", 2, 74],
    ["Manajemen Bisnis", "SI244105", 3, 90],
    ["Algoritma & Struktur Data", "SI244106", 4, 94],
    ["Pendidikan Agama Islam 1", "SI244102", 2, 81],
    ["Pancasila", "SI244104", 2, 76]
];

// 2. LOGIKA PERHITUNGAN
$total_sks = 0;
$total_bobot = 0;
$daftar_hasil = [];

foreach ($courses as $c) {
    $res = getGrade($c[3]);
    $total_sks += $c[2];
    $total_bobot += ($c[2] * $res['indeks']);
    $daftar_hasil[] = [
        "nama" => $c[0],
        "kode" => $c[1],
        "sks" => $c[2],
        "angka" => $c[3],
        "indeks" => $res['indeks'],
        "huruf" => $res['huruf']
    ];
}

$ipk = ($total_sks > 0) ? ($total_bobot / $total_sks) : 0;
$foto_profil = "kcy.jpg"; // Pastikan file ini ada di folder yang sama
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resume Studi - Universitas Alghifari</title>
    
    <!-- Framework & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        :root {
            --blue-header: #337ab7;
            --blue-sidebar: #004282;
            --blue-summary: #004c8c;
            --bg-gray: #f1f3f4;
        }

        body { 
            background-color: var(--bg-gray); 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            font-size: 13px; 
            margin: 0; 
        }

        /* --- SIDEBAR RESPONSIVE --- */
        .sidebar { 
            width: 100%; 
            background-color: var(--blue-sidebar); 
            color: white; 
            position: relative; 
            z-index: 1000;
        }

        .main-wrapper { margin-left: 0; transition: 0.3s; }

        /* Media Query untuk Desktop (Layar > 768px) */
        @media (min-width: 768px) {
            .sidebar { width: 240px; height: 100vh; position: fixed; left: 0; top: 0; }
            .main-wrapper { margin-left: 240px; }
            .sidebar-brand { padding: 20px 15px; font-size: 18px; }
        }

        /* --- NAVBAR & UI ELEMENTS --- */
        .top-navbar { 
            background: white; 
            padding: 10px 15px; 
            border-bottom: 1px solid #dee2e6;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .breadcrumb-area { 
            padding: 15px; 
            background: #fff; 
            border-bottom: 1px solid #eee;
        }

        .profile-img {
            width: 38px; height: 38px;
            object-fit: cover;
            border-radius: 50%;
            border: 2px solid #ddd;
        }

        /* --- TABLE STYLING --- */
        .table-portal thead th { 
            background-color: var(--blue-header) !important; 
            color: white !important; 
            text-align: center; 
            vertical-align: middle;
            border: 1px solid #2e6da4 !important; 
            text-transform: uppercase; 
            font-size: 11px; 
        }

        .summary-row { 
            background-color: var(--blue-summary) !important; 
            color: white !important; 
            font-weight: bold; 
        }

        .course-code { 
            color: #fff; 
            background-color: #337ab7; 
            padding: 1px 5px; 
            border-radius: 3px; 
            font-size: 10px; 
            text-decoration: none; 
            display: inline-block;
            margin-top: 2px;
        }

        .card-custom {
            border: none;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            margin: 15px;
        }
    </style>
</head>
<body>

<!-- Sidebar Menu -->
<div class="sidebar">
    <div class="sidebar-brand ps-3 p-3 fw-bold">
        <i class="fas fa-graduation-cap me-2"></i> STUDENT PORTAL
    </div>
    <nav class="nav flex-column flex-md-column flex-row">
        <a href="#" class="nav-link text-white p-3"><i class="fas fa-th-large me-2"></i> <span class="d-none d-md-inline">Dashboard</span></a>
        <a href="#" class="nav-link text-white p-3 bg-white bg-opacity-10 border-start border-4 border-warning">
            <i class="fas fa-university me-2"></i> <span class="d-none d-md-inline">Akademik</span>
        </a>
        <a href="#" class="nav-link text-white p-3"><i class="fas fa-laptop me-2"></i> <span class="d-none d-md-inline">LMS</span></a>
    </nav>
</div>

<div class="main-wrapper">
    <!-- Top Header -->
    <header class="top-navbar">
        <div class="header-title">
            <span class="fw-bold text-muted small d-none d-sm-inline">SISTEM INFORMASI MANAJEMEN</span>
            <div class="fw-bold text-dark d-sm-none" style="font-size: 11px;">SIM UNIGHI</div>
            <div class="fw-bold text-dark d-none d-sm-block">UNIVERSITAS ALGHIFARI</div>
        </div>
        <div class="d-flex align-items-center">
            <div class="text-end me-2 d-none d-sm-block">
                <small class="text-muted d-block" style="font-size: 10px;">Selamat datang,</small>
                <span class="fw-bold">Samsul Arifin</span>
            </div>
            <img src="<?= $foto_profil ?>" onerror="this.src='https://via.placeholder.com/150'" class="profile-img">
        </div>
    </header>

    <!-- Breadcrumb -->
    <section class="breadcrumb-area d-flex justify-content-between align-items-center">
        <h5 class="m-0 fw-bold">Resume Studi</h5>
        <div class="text-muted small d-none d-md-block"><i class="fas fa-home"></i> / Akademik / Resume Studi</div>
    </section>

    <!-- Main Content -->
    <main class="content-body">
        <div class="card card-custom p-3 p-md-4">
            
            <!-- Ringkasan IPK -->
            <div class="table-responsive mb-4">
                <table class="table table-bordered table-portal text-center">
                    <thead>
                        <tr>
                            <th rowspan="2">Tahun Akademik</th>
                            <th rowspan="2">Smt</th>
                            <th colspan="2">Nilai</th>
                            <th colspan="2">Sks</th>
                        </tr>
                        <tr>
                            <th>Ip</th>
                            <th>Ipk</th>
                            <th>Smt</th>
                            <th>Tempuh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="summary-row">
                            <td class="small">2025/2026 - GANJIL</td>
                            <td>1</td>
                            <td><?= number_format($ipk, 2, ',', '.') ?></td>
                            <td><?= number_format($ipk, 2, ',', '.') ?></td>
                            <td><?= $total_sks ?></td>
                            <td><?= $total_sks ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <!-- Daftar Mata Kuliah -->
            <div class="table-responsive">
                <table class="table table-bordered table-portal align-middle">
                    <thead>
                        <tr>
                            <th style="width: 50%;">Mata Kuliah</th>
                            <th>Sks</th>
                            <th>Nilai</th>
                            <th>Indeks</th>
                            <th>Huruf</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($daftar_hasil as $index => $row): ?>
                        <tr>
                            <td class="ps-3">
                                <div class="text-dark fw-bold"><?= ($index + 1) . ". " . $row['nama'] ?></div>
                                <span class="course-code"><?= $row['kode'] ?></span>
                            </td>
                            <td class="text-center"><?= $row['sks'] ?></td>
                            <td class="text-center"><?= $row['angka'] ?></td>
                            <td class="text-center"><?= $row['indeks'] ?></td>
                            <td class="text-center">
                                <span class="badge <?= ($row['huruf'] == 'D' || $row['huruf'] == 'E') ? 'bg-danger' : 'bg-success' ?>">
                                    <?= $row['huruf'] ?>
                                </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>

        </div>
    </main>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>