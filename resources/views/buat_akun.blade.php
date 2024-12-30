<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Capital</title>
    <link rel="stylesheet" href="buat_akun.css">
</head>
<body>

<!-- Header Section -->
<div class="header">
    <div class="logo">
        <img src="{{ asset('images/logo_bulat.png') }}" alt="Logo">
        <div>
            <div class="logo-text">Human Capital</div>
            <div class="subtitle">Sistem Manajemen Kepegawaian</div>
        </div>
    </div>
    <div class="profile-section">
    <span class="profile-name">Admin</span>
    <a href="{{ route('profil_admin') }}">
        <img src="images/foto_ade.jpg" alt="Profile Icon" class="profile-icon">
    </a>
</div>
</div>

<!-- Navbar Section -->
<div class="navbar">
    <a href="{{ route('dashboard') }}" class="{{ Request::routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
    <a href="{{ route('data_pegawai_admin') }}" class="{{ Request::routeIs('data_pegawai_admin') ? 'active' : '' }}">Data Pegawai</a>

    <!-- Dropdown Menu Rekapitulasi -->
    <div class="dropdown">
        <a href="#" class="{{ Request::routeIs('rekap_kehadiran', 'table_cuti_admin') ? 'active' : '' }}">Rekapitulasi</a>
        <div class="dropdown-content">
            <a href="{{ route('rekap_kehadiran') }}" class="{{ Request::routeIs('rekap_kehadiran') ? 'active' : '' }}">Kehadiran</a>
            <a href="{{ route('table_cuti_admin') }}" class="{{ Request::routeIs('table_cuti_admin') ? 'active' : '' }}">Pengajuan Cuti</a>
        </div>
    </div>
    <a href="{{ route('report') }}" class="{{ Request::routeIs('report') ? 'active' : '' }}">Report</a>
</div>
<!-- Buat Akun Section -->
<!-- Buat Akun Section -->
<div class="create-account">
    <h2>Buat Akun</h2>
    <form method="POST" action="{{ route('simpanregistrasi') }}">
    @csrf
        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Masukkan username" required>
        </div>
        <div class="form-group">
            <label for="password">Kata Sandi</label>
            <input type="password" id="password" name="password" placeholder="Masukkan kata sandi" required>
        </div>
        <div class="form-group">
            <label for="role">Pilih Role</label>
            <select id="role" name="role" required>
                <option value="operator">Operator</option>
                <option value="pegawai">Pegawai</option>
            </select>
        </div>
        <button type="submit" class="btn-submit">Buat Akun</button>
    </form>
</div>

<!-- Footer Section -->
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

<script src="navbar.js"></script>
</body>
</html>
