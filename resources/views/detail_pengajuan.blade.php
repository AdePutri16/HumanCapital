<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Capital - Detail Pengajuan</title>
    <link rel="stylesheet" href="detail_pengajuan.css">
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

/.profile-section {
    position: relative;
    display: inline-block;
    cursor: pointer;
}

.profile-icon {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    margin-left: 10px;
    vertical-align: middle;
}

/* Dropdown Menu Style */
.dropdown-menu {
    display: none;
    position: absolute;
    top: 100%;
    right: 0;
    background-color: #ffffff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border-radius: 5px;
    z-index: 1;
    overflow: hidden;
}

.profile-section:hover .dropdown-menu {
    display: block;
}

.dropdown-menu a {
    color: #2c3e50;
    padding: 10px 15px;
    text-decoration: none;
    display: block;
}

.dropdown-menu a:hover {
    background-color: #f1f1f1;
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
    top: 100%;
    left: 0;
}

.navbar .dropdown:hover .dropdown-content {
    display: block;
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
/* form-style.css */
.form-container {
    max-width: 600px;
    margin: 30px auto;
    padding: 20px;
    background-color: var(--box2);
    border: 1px solid #ccc;
    border-radius: 8px;
}

.form-container h2 {
    text-align: center;
    font-size: 1.5em;
    color: #333;
    margin-bottom: 20px;
}

.form-group {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
}

.form-group label {
    font-weight: bold;
    color: #333;
    flex-basis: 30%;
}

.form-value {
    flex-basis: 65%;
    color: #555;
}

.button-group {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 20px;
}

.button {
    padding: 10px 20px;
    font-size: 1em;
    font-weight: bold;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.button.approve {
    background-color: #28a745;
}

.button.approve:hover {
    background-color: #218838;
}

.button.reject {
    background-color: #dc3545;
}

.button.reject:hover {
    background-color: #c82333;
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
    <span class="profile-name">Operator</span>
    <a href="{{ route('profil_operator') }}">
        <img src="images/foto_ade.jpg" alt="Profile Icon" class="profile-icon">
    </a>
</div>
</div>
@php
    $cuti = $pengajuanCuti;  // Karena hanya satu data pengajuan cuti yang diteruskan
@endphp

<h2>Detail Pengajuan Cuti</h2>

<div class="form-container">
    <div class="form-group">
        <label>Nama Lengkap:</label>
        <span class="form-value">{{ $cuti->pegawai->nama }}

    </div>

    <div class="form-group">
        <label>Jabatan:</label>
        <span class="form-value">{{ $cuti->jabatan }}</span> <!-- Perbaikan -->
    </div>

    <div class="form-group">
        <label>NIP:</label>
        <span class="form-value">{{ $cuti->nip }}</span> <!-- Perbaikan -->
    </div>

    <div class="form-group">
        <label>Jenis Pengajuan Cuti:</label>
        <span class="form-value">{{ ucfirst($cuti->jenis_cuti) }}</span> <!-- Perbaikan -->
    </div>

    <div class="form-group">
        <label>Mulai Cuti:</label>
        <span class="form-value">{{ date('d M Y', strtotime($cuti->mulai_cuti)) }}</span> <!-- Perbaikan -->
    </div>

    <div class="form-group">
        <label>Selesai Cuti:</label>
        <span class="form-value">{{ date('d M Y', strtotime($cuti->selesai_cuti)) }}</span> <!-- Perbaikan -->
    </div>

    <div class="form-group">
        <label>Alamat Selama Cuti:</label>
        <span class="form-value">{{ $cuti->alamat }}</span> <!-- Perbaikan -->
    </div>

    <div class="button-group">
        <form action="{{ route('validasi_cuti_action', ['id' => $cuti->id, 'status' => 'disetujui']) }}" method="POST"> <!-- Perbaikan -->
            @csrf
            <button type="submit" class="button approve">Setuju</button>
        </form>

        <form action="{{ route('validasi_cuti_action', ['id' => $cuti->id, 'status' => 'ditolak']) }}" method="POST"> <!-- Perbaikan -->
            @csrf
            <button type="submit" class="button reject">Tolak</button>
        </form>
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
