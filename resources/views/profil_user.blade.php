<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Capital</title>
    <link rel="stylesheet" href="profil_user.css">
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
    <div class="profile-section" onclick="toggleDropdown()">
    <span class="profile-name"> {{ auth()->user()->pegawai ? auth()->user()->pegawai->nama : 'Nama Tidak Tersedia' }}</span>
    <img src="{{ auth()->user()->pegawai && auth()->user()->pegawai->image_path ? asset('storage/' . auth()->user()->pegawai->image_path) : 'images/foto_default.jpg' }}" alt="Profile Icon" class="profile-icon">
    <div class="dropdown-menu">
        <a href="{{ route('data_diri_user') }}" class="{{ Request::routeIs('data_diri_user') ? 'active' : '' }}">Data Diri</a>
        <a href="{{ route('profil_user') }}" class="{{ Request::routeIs('profil_user') ? 'active' : '' }}">Ubah Kata Sandi</a>
        <a href="{{route('logout')}}">Logout</a>
    </div>
    </div>
</div>

<!-- Navbar -->
<div class="navbar">
    <a href="{{ route('dashboard_user') }}" class="{{ Request::routeIs('dashboard_user') ? 'active' : '' }}">Dashboard</a>
    <a href="#">Absen</a>
    <a href="{{ route('formulir_pengajuan') }}" class="{{ Request::routeIs('formulir_pengajuan') ? 'active' : '' }}">Pengajuan Cuti</a>
    <a href="{{ route('notifikasi') }}" class="{{ Request::routeIs('notifikasi') ? 'active' : '' }}">Notifikasi</a>
</div>

<!-- Main Content -->
<div class="main-content">
    <h2>Ganti Password</h2>
    <form action="update_password.php" method="post" class="password-form">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="221011039" readonly>
        </div>
        <div class="form-group">
            <label for="old-password">Password Lama</label>
            <input type="password" id="old-password" name="old-password" required>
        </div>
        <div class="form-group">
            <label for="new-password">Password Baru</label>
            <input type="password" id="new-password" name="new-password" required>
        </div>
        <div class="form-group">
            <label for="confirm-password">Ulangi Password</label>
            <input type="password" id="confirm-password" name="confirm-password" required>
        </div>
        <button type="submit" class="save-button">Simpan</button>
    </form>
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
