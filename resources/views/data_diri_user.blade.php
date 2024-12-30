<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Capital</title>
    <link rel="stylesheet" href="data_diri_user.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
    :root {
    --background: #1E3E62;
    --primary: #f39c12;
    --nav: #72BF78;
    --font: #333; 
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
    background-color: #f9f9f9;
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
}

.navbar a, .navbar .dropdown {
    color: #2c3e50;
    text-decoration: none;
    padding: 10px 15px;
    font-weight: bold;
    font-size: 1em;
    position: relative;
}

/* Active Link Style */
.navbar a.active, .navbar .dropdown > a.active {
    background-color: #5a6e83;
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
    top: calc(100% + 5px);
    left: 0;
    opacity: 0;
    transition: opacity 0.3s ease, transform 0.3s ease;
    transform: translateY(10px);
}

.navbar .dropdown:hover .dropdown-content {
    display: block;
    opacity: 1;
    transform: translateY(0);
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

.employee-info {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
    margin: 20px auto;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    width: 60%;
    font-family: Arial, sans-serif;
    color: #333;
}

.employee-photo {
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-bottom: 20px;
}

.employee-photo img {
    width: 150px;
    height: 150px;
    object-fit: cover;
    border-radius: 50%;
    border: 3px solid var(--primary);
    margin-bottom: 10px;
}

.employee-photo .no-image {
    font-size: 0.9em;
    color: #777;
}

.employee-photo .employee-name h3 {
    font-size: 1.5em;
    color: #333;
    margin-bottom: 5px;
}

.upload-btn {
    display: flex;
    align-items: center;
    background-color: var(--primary);
    color: #fff;
    padding: 10px 15px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 0.9em;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.upload-btn i {
    margin-right: 5px;
}

.upload-btn:hover {
    background-color:var(--primary);
}

.employee-details {
    width: 100%;
    padding: 20px;
    border-top: 1px solid #ddd;
}

.employee-details h2 {
    text-align: center;
    font-size: 1.5em;
    margin-bottom: 15px;
    color: var(--primary);
}

.employee-details ul {
    list-style: none;
    padding: 0;
}

.employee-details li {
    font-size: 1em;
    line-height: 1.8;
    color: #555;
}

.employee-details li strong {
    color: #333;
    font-weight: bold;
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

<div class="employee-info">
    <!-- Foto Profil -->
    <div class="employee-photo">
        @if($pegawai->image_path)
            <img src="{{ auth()->user()->pegawai && auth()->user()->pegawai->image_path ? asset('storage/' . auth()->user()->pegawai->image_path) : 'images/foto_default.jpg' }}" alt="Profile Icon" class="profile-icon">
        @else
            <span class="no-image">No Image</span>
        @endif
        <div class="employee-name">
            <h3>{{ $pegawai->nama }}</h3>
        </div>
        <a href="edit_data_user" class="upload-btn">
            <i class="fas fa-edit"></i> Edit Profile
        </a>
    </div>

    <!-- Detail Pegawai -->
    <div class="employee-details">
        <h2>Data Pegawai</h2>
        <ul>
            <li><strong>ID:</strong> {{ $pegawai->id }}</li>
            <li><strong>Nama Lengkap:</strong> {{ $pegawai->nama }}</li>
            <li><strong>NIP:</strong> {{ $pegawai->nip }}</li>
            <li><strong>Tempat Lahir:</strong> {{ $pegawai->tmpt_lahir }}</li>
            <li><strong>Tanggal Lahir:</strong> {{ $pegawai->tgl_lahir }}</li>
            <li><strong>TMT:</strong> {{ $pegawai->tmt }}</li>
            <li><strong>Pendidikan Terakhir:</strong> {{ $pegawai->pendidikan }}</li>
            <li><strong>Tahun:</strong> {{ $pegawai->tahun }}</li>
            <li><strong>Jenis Kelamin:</strong> {{ $pegawai->jenis_kelamin }}</li>
            <li><strong>NIK:</strong> {{ $pegawai->nik }}</li>
            <li><strong>Jabatan:</strong> {{ $pegawai->jabatan }}</li>
            <li><strong>Status Kawin:</strong> {{ $pegawai->status_kawin }}</li>
            <li><strong>No. Telepon:</strong> {{ $pegawai->no_tlp }}</li>
            <li><strong>Email:</strong> {{ $pegawai->email }}</li>
        </ul>
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