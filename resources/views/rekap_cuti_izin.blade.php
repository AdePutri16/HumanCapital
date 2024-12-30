<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Capital - Rekapitulasi Cuti</title>
    <link rel="stylesheet" href="rekap_cuti_izin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>

<div class="header">
    <div class="logo">
        <img src="{{ asset('images/logo_bulat.png') }}" alt="Logo">
        <div>
            <div class="logo-text">Human Capital</div>
            <div class="subtitle">Sistem Manajemen Kepegawaian</div>
        </div>
    </div>

    <!-- Profile Section with Admin text -->
    <div class="profile-section">
    <span class="profile-name">{{ auth()->user()->username }}</span>
    <a href="{{ route('profil_admin') }}">
        <img src="path/to/profile-icon.png" alt="Profile Icon" class="profile-icon">
    </a>
</div>
</div>

<!-- Navbar -->
<div class="navbar">
    <a href="#">Dashboard</a>
    <a href="#">Data Pegawai</a>

    <!-- Dropdown Menu Rekapitulasi -->
    <div class="dropdown">
        <a href="#">Rekapitulasi</a>
        <div class="dropdown-content">
            <a href="#">Kehadiran</a>
            <a href="#">Pengajuan Cuti </a>
        </div>
    </div>

    <a href="#">Report</a>
</div>

<!-- Pengajuan Cuti & Izin Section -->
<!-- Pengajuan Cuti & Izin Section -->
<div class="main-content">
    <h1><i class="fas fa-calendar-alt"></i> Pengajuan Cuti & Izin</h1>
</div>


    <div class="leave-request">
        <div class="profile-pic">
            <img src="path/to/profile-pic.png" alt="Profile Picture">
        </div>
        <div class="info">
            <div class="name">Ade Putri Bustan S.Kom., M.Kom.</div>
            <div class="status">Mengajukan Izin</div>
        </div>
        <div class="rejected">Ditolak</div>
    </div>
</div>

<!-- Footer -->
<div class="footer">
    <div class="footer-content">
        <div class="footer-section contact">
            <h3>Contact Us</h3>
            <p><i class="fas fa-phone"></i> +62 123 4567 890</p>
            <p><i class="fas fa-envelope"></i>ith@domain.com</p>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; 2024 Institut Teknologi Bachruddin Jusuf Habibie | All rights reserved.
    </div>
</div>
</body>
</html>
