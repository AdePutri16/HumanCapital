<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Capital -Report</title>
    <link rel="stylesheet" href="report.css">
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
    width: 35px;      /* Equal width and height for a perfect circle */
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
    font-size: 1.2em;
    color: #333;
    padding: 10px 0;
    border-bottom: 1px solid var(--card-border);
    margin-bottom: 15px;
}

/* Styling for the Schedule Setting Page */
.content {
    max-width: 600px;
    margin: 30px auto;
    padding: 20px;
    background-color: var(--box2);
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.content h2 {
    text-align: center;
    color: #000;
    margin-bottom: 20px;
}

.schedule-form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.form-group {
    display: flex;
    flex-direction: column;
}

.form-group label {
    font-weight: bold;
    color: #000;
    margin-bottom: 5px;
}

.form-group input[type="time"],
.form-group input[type="number"] {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1em;
}

.form-group input[type="number"] {
    width: 100%;
    max-width: 100px;
}

.btn-submit {
    margin-top: 15px;
    padding: 10px;
    background-color: var(--primary);
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 1em;
    cursor: pointer;
    transition: background-color 0.3s;
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

<!-- Header and Navbar are included as in your previous code -->
<div class="header">
    <div class="logo">
        <img src="{{ asset('images/logo_bulat.png') }}" alt="Logo">
        <div>
            <div class="logo-text">Human Capital</div>
            <div class="subtitle">Sistem Manajemen Kepegawaian</div>
        </div>
    </div>
    <div class="profile-section">
    <span class="profile-name">{{ auth()->user()->username }}</span>
    <a href="{{ route('profil_admin') }}">
        <img src="images/foto_ade.jpg" alt="Profile Icon" class="profile-icon">
    </a>
</div>
</div>



    <!-- Navbar -->
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

<div class="content">
    <h2>Tabel Preferensi</h2>
    <form method="POST" action="{{ route('update_report') }}">
        @csrf

        <!-- Office Hours -->
        <div class="form-group">
            <label for="start-time">Waktu Masuk:</label>
            <input type="time" id="start-time" name="start_time" value="{{ $preference->start_time }}" required>
        </div>

        <div class="form-group">
            <label for="end-time">Waktu Pulang:</label>
            <input type="time" id="end-time" name="end_time" value="{{ $preference->end_time }}" required>
        </div>

        <!-- Annual Leave Policy -->
        <div class="form-group">
            <label for="annual-leave">Jumlah Cuti Pertahun:</label>
            <input type="number" id="annual-leave" name="annual_leave" value="{{ $preference->annual_leave }}" min="0" required>
        </div>

        <button type="submit" class="btn-submit">Simpan Pengaturan</button>
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