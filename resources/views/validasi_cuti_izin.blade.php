<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Capital - Validasi Cuti</title>
    <link rel="stylesheet" href="validasi_cuti_izin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        :root {
    --background: #1E3E62;
    --primary: #f39c12;
    --nav: #72BF78;
    --font: #fff;
    --hover: #DDD8D8;
    --box1: #C4E1F6;
    --box2: #F4EEEE;
    --card: #C62E2E;
}

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Header */
.header {
    background-color: #2c3e50;
    padding: 20px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.header .logo {
    display: flex;
    align-items: center;
}

.header .logo img {
    width: 80px;
    height: 80px;
    margin-right: 15px;
}

.header .logo-text {
    color: white;
    font-size: 1.7em;
    font-weight: bold;
}

.header .subtitle {
    color: #f39c12;
    font-size: 0.9em;
}

/* Profile Section */
.profile-section {
    display: flex;
    align-items: center;
    gap: 10px; /* Adds space between text and icon */
}

.profile-name {
    color: white;
    font-size: 1em;
    font-weight: bold;
}

.profile-icon {
    width: 35px;      /* Ensure equal width and height for a perfect circle */
    height: 35px;
    border-radius: 50%;
    border: 1px solid #ffffff;
    object-fit: cover; /* Ensures the image scales without distortion */
}


/* Navbar */
.navbar {
    display: flex;
    justify-content: space-around;
    background-color: #DDD8D8;
    padding: 10px 0;
    position: relative;
}

.navbar a, .navbar .dropdown {
    color: #2c3e50;
    text-decoration: none;
    padding: 10px 15px;
    font-weight: bold;
    font-size: 1em;
    position: relative;
}

/* Tanda Link Aktif di Navbar */
.navbar a.active,
.navbar .dropdown > a.active {
    background-color: #5a6e83; /* Warna aktif sesuai dengan warna utama */
    color: var(--font);
    border-radius: 5px;
}

.navbar a:hover, .navbar .dropdown:hover > a {
    background-color: #bdc3c7;
    border-radius: 5px;
}

/* Dropdown */
.navbar .dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 1;
    border-radius: 5px;
    top: calc(100% + 5px); /* Tambahkan jarak sedikit */
    left: 0;
    opacity: 0;
    transition: opacity 0.3s ease, transform 0.3s ease;
    transform: translateY(10px); /* Posisi awal dropdown sedikit ke bawah */
}

.navbar .dropdown:hover .dropdown-content {
    display: block;
    opacity: 1;
    transform: translateY(0); /* Posisikan kembali ke tempat semula */
}

.navbar .dropdown-content a {
    color: #333;
    padding: 10px 15px;
    text-decoration: none;
    display: block;
    font-size: 0.9em;
}

.navbar .dropdown-content a:hover {
    background-color: #ddd;
    border-radius: 5px;
}
/* Dropdown container */
.dropdown-content {
    display: none; /* Default hidden */
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 1;
    transition: opacity 0.3s ease, visibility 0.3s ease;
}

/* Show the dropdown on hover */
.dropdown:hover .dropdown-content {
    display: block;  /* Make it visible */
    opacity: 1;      /* Fade in */
    visibility: visible;  /* Make sure it's visible */
}

/* Optional: add a slight delay or smooth transition for hover effect */
.dropdown-content a {
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #ddd;
}
/* Main Content */
.main-content {
    padding: 20px;
    background-color: #f4f6f8;
}

.section-header {
    font-size: 0.9em;
    color: #333;
    display: flex;
    align-items: center;
    padding: 10px;
    border-radius: 8px;
    margin-bottom: 20px;
}

.section-header i {
    margin-right: 8px;
    color: #333; /* Warna ikon biru */
}

/* Request Card */
.request-card {
    display: flex;
    align-items: center;
    background-color: #F4EEEE;
    padding: 15px;
    border-radius: 5px;
    border: 1px solid var(--card-border);
    margin-bottom: 10px;
    position: relative;
}

.request-profile-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-right: 15px;
}

.request-info {
    flex-grow: 1;
}

.request-name {
    font-weight: bold;
    color: #333;
}

.request-detail {
    font-size: 0.9em;
    color: #777;
}

/* CSS */
.eye-icon,
.view-icon {
    font-size: 24px;   /* Atur ukuran font agar sama */
    color: #333;       /* Atur warna ikon */
    vertical-align: middle;
    padding: 5px;      /* Padding opsional */
}

/* Jika ingin menambahkan efek hover */
.eye-icon:hover,
.view-icon:hover {
    color: #555;
    cursor: pointer;
}

/* Footer */
.footer {
    background-color: #2c3e50;
    color: #ffffff;
    padding: 20px 0;
    width: 100%;
    position: relative;
}

.footer-content {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
    text-align: center;
}

.footer-section {
    margin: 10px;
}

.footer-section h3 {
    font-size: 1.2em;
    margin-bottom: 10px;
}

.footer-section p {
    font-size: 0.9em;
    line-height: 1.5;
}

.footer-bottom {
    text-align: center;
    padding: 10px;
    font-size: 0.9em;
    background-color: #1a252f;
    color: #dcdcdc;
}

/* Responsive Design */
@media (max-width: 768px) {
    .footer-content {
        flex-direction: column;
        text-align: center;
    }
}


        </style>
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
    <a href="{{ route('dashboard') }}" class="{{ Request::routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
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

@foreach ($pengajuanCuti as $cuti)
    <div class="request-card">
        <!-- Menampilkan foto profil pegawai -->
        <img src="{{ asset('storage/images/pegawai/' . $cuti->pegawai->image_path) }}" alt="User Profile" class="request-profile-icon">
        
        <div class="request-info">
            <!-- Menampilkan nama lengkap pegawai -->
            <div class="request-name">{{ $cuti->pegawai->nama }}</div>

            <!-- Menampilkan jabatan dan jenis cuti yang diajukan -->
            <div class="request-detail">Mengajukan Izin {{ ucfirst($cuti->jenis_cuti) }}</div>
        </div>

        <!-- Link untuk melihat detail pengajuan cuti -->
        <a href="{{ route('detail_pengajuan', $cuti->id) }}">
            <i class="fas fa-eye eye-icon"></i>
        </a>
    </div>
@endforeach


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
