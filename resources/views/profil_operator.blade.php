<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Capital- Profil Operator</title>
    <link rel="stylesheet" href="profil_admin.css">
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
    <a href="{{ route('profil_operator') }}">
        <img src="images/foto_ade.jpg" alt="Profile Icon" class="profile-icon">
    </a>
</div>
</div>

<div class="navbar">
<a href="{{ route('dashboard_operator') }}" class="{{ Request::routeIs('dashboard_operator') ? 'active' : '' }}">Dashboard</a>
    <a href="{{ route('data_pegawai_operator') }}" class="{{ Request::routeIs('data_pegawai_operator') ? 'active' : '' }}">Data Pegawai</a>
    <a href="{{ route('bukti_kehadiran_operator') }}" class="{{ Request::routeIs('bukti_kehadiran_operator') ? 'active' : '' }}">Absen</a>
    <a href="{{ route('validasi_cuti_izin') }}" class="{{ Request::routeIs('validasi_cuti_izin') ? 'active' : '' }}">Validasi</a>
    <!-- Dropdown Menu Rekapitulasi -->
    <div class="dropdown">
        <a href="#" class="{{ Request::routeIs('rekap_kehadiran', 'table_cuti_admin') ? 'active' : '' }}">Rekapitulasi</a>
        <div class="dropdown-content">
            <a href="{{ route('rekap_kehadiran_operator') }}" class="{{ Request::routeIs('rekap_kehadiran_operator') ? 'active' : '' }}">Kehadiran</a>
            <a href="{{ route('table_cuti_operator') }}" class="{{ Request::routeIs('table_cuti_operator') ? 'active' : '' }}">Pengajuan Cuti</a>
        </div>
    </div>
</div>
<!-- Profile Admin Section -->
<div class="profile-container">
    <div class="profile-card">
        <div class="profile-header">
            <img src="path/to/profile-icon.png" alt="Profile Icon" class="profile-icon">
            <h3>Operator</h3>
            <a href="{{route('logout')}}" class="logout">
                Logout
                <span class="logout-icon">&#x21AA;</span> <!-- Arrow icon for Logout -->
            </a>
        </div>
        <div class="profile-info">
            <p>Username: Operator123</p>
            <p>Email: deputribustan@gmail.com</p>
            <p>No Telp: 089786657456</p>
        </div>
        <a href="{{ route('edit_profil_operator') }}" class="edit-btn">Edit Profil</a>
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
