<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Capital</title>
    <link rel="stylesheet" href="navbar.css">
</head>
<body>

<!-- Header Section -->
<div class="header">
    <div class="logo">
        <img src="path/to/logo_bulat.png" alt="Logo">
        <div>
            <div class="logo-text">Human Capital</div>
            <div class="subtitle">Sistem Manajemen Kepegawaian</div>
        </div>
    </div>

    <!-- Profile Section -->
    <div class="profile-section">
        <span class="profile-name">Admin</span>
        <img src="path/to/profile-icon.png" alt="Profile Icon" class="profile-icon">
    </div>
</div>

<!-- Navbar Section -->
<div class="navbar">
    <a href="{{ route('dashboard_admin') }}" class="{{ Request::routeIs('dashboard_admin') ? 'active' : '' }}">Dashboard</a>
    <a href="{{ route('data_pegawai_admin') }}" class="{{ Request::routeIs('data_pegawai_admin') ? 'active' : '' }}">Data Pegawai</a>

    <!-- Dropdown Menu Rekapitulasi -->
    <div class="dropdown">
        <a href="#" class="{{ Request::routeIs('rekap_kehadiran', 'table_cuti_admin') ? 'active' : '' }}">Rekapitulasi</a>
        <div class="dropdown-content">
            <a href="{{ route('rekap_kehadiran') }}" class="{{ Request::routeIs('rekap_kehadiran') ? 'active' : '' }}">Kehadiran</a>
            <a href="{{ route('table_cuti_admin') }}" class="{{ Request::routeIs('table_cuti_admin') ? 'active' : '' }}">Pengajuan Cuti</a>
        </div>
    </div>
</div>

<!-- Footer Section -->
<div class="footer">
    <div class="footer-content">
        <div class="footer-section about">
            <h3>About Us</h3>
            <p>
                Sistem Manajemen Kepegawaian ini bertujuan untuk membantu pengelolaan data karyawan secara efektif dan efisien.
            </p>
        </div>

        <div class="footer-section links">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Data Pegawai</a></li>
                <li><a href="#">Absen</a></li>
                <li><a href="#">Rekapitulasi</a></li>
                <li><a href="#">Report</a></li>
            </ul>
        </div>

        <div class="footer-section contact">
            <h3>Contact Us</h3>
            <p><i class="fas fa-phone"></i> +62 123 4567 890</p>
            <p><i class="fas fa-envelope"></i> email@domain.com</p>
        </div>
    </div>

    <div class="footer-bottom">
        &copy; 2024 Sistem Manajemen Kepegawaian | All rights reserved.
    </div>
</div>

<script src="navbar.js"></script>
</body>
</html>
