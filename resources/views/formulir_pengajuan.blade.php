<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Capital - Formulir Pengajuan</title>
    <link rel="stylesheet" href="formulir_pengajuan.css">
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

       /* Active Link Style */
       .dropdown-menu a.active {
    background-color: #3498db;
    color: #ffffff;
    font-weight: bold;
}

/* Style for Profile Section and Dropdown Menu */
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

        /* Tanda Link Aktif di Navbar */
        .navbar a.active,
        .navbar .dropdown > a.active {
            background-color: #5a6e83;
            color: var(--font);
            border-radius: 5px;
        }

        .navbar a:hover, .navbar .dropdown:hover > a {
            background-color: #bdc3c7;
            border-radius: 5px;
        }
/* form.css */
.form-container {
    max-width: 600px;
    margin: 30px auto;
    padding: 20px;
    background-color: #F4EEEE;
    border-radius: 8px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

.form-container h2 {
    text-align: center;
    color: #2c3e50;
}

.form-container label {
    display: block;
    margin-top: 10px;
    font-weight: bold;
    color: #2c3e50;
}

.form-container input[type="text"],
.form-container input[type="date"],
.form-container select,
.form-container textarea {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 1em;
}

.form-container textarea {
    resize: vertical;
}

.form-container button {
    width: 100%;
    padding: 10px;
    background-color: #f39c12;
    border: none;
    border-radius: 5px;
    color: #fff;
    font-size: 1em;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.form-container button:hover {
    background-color: #e67e22;
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

.dropdown-menu a.active {
background-color: #2c3e50;
color: #ffffff;
font-weight: bold;
}        </style>
        <script>
        function toggleDropdown() {
            const dropdownMenu = document.querySelector('.dropdown-menu');
            dropdownMenu.style.display = dropdownMenu.style.display === 'block' ? 'none' : 'block';
        }

        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            const profileSection = document.querySelector('.profile-section');
            const dropdownMenu = document.querySelector('.dropdown-menu');
            if (!profileSection.contains(event.target)) {
                dropdownMenu.style.display = 'none';
            }
        });
    </script>
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
</div>
<div class="navbar">
    <a href="{{ route('dashboard_user') }}" class="{{ Request::routeIs('dashboard_user') ? 'active' : '' }}">Dashboard</a>
    <a href="{{ route('absen_gps') }}" class="{{ Request::routeIs('absen_gps') ? 'active' : '' }}">Absen</a>
    <a href="{{ route('formulir_pengajuan') }}" class="{{ Request::routeIs('formulir_pengajuan') ? 'active' : '' }}">Pengajuan Cuti</a>
    <a href="{{ route('notifikasi') }}" class="{{ Request::routeIs('notifikasi') ? 'active' : '' }}">Notifikasi</a>
</div>
<!-- Form Pengajuan Cuti -->
 

<div class="form-container">
    <h2>Form Pengajuan Cuti</h2>
    <form action="{{ route('simpancuti') }}" method="POST">
    @csrf
    <label for="nama_lengkap">Nama Lengkap:</label>
    <input type="text" id="nama_lengkap" name="nama_lengkap" value="{{ auth()->user()->pegawai ? auth()->user()->pegawai->nama : '' }}" required>

    <label for="jabatan">Jabatan:</label>
    <input type="text" id="jabatan" name="jabatan" value="{{ auth()->user()->pegawai ? auth()->user()->pegawai->jabatan : '' }}" required>

    <label for="nip">NIP:</label>
    <input type="text" id="nip" name="nip" value="{{ auth()->user()->pegawai ? auth()->user()->pegawai->nip : '' }}" required>
        <label for="jenis_cuti">Jenis Pengajuan Cuti:</label>
        <select id="jenis_cuti" name="jenis_cuti" required>
            <option value="">Pilih Jenis Cuti</option>
            <option value="tahunan">Cuti Tahunan</option>
            <option value="besar">Cuti Besar</option>
            <option value="melahirkan">Cuti Melahirkan</option>
            <option value="alasan-penting">Cuti Alasan Penting</option>
            <option value="luar-tanggungan-negara">Cuti Luar Tanggungan Negara</option>
        </select>

        <label for="mulai_cuti">Mulai Cuti:</label>
        <input type="date" id="mulai_cuti" name="mulai_cuti" required>

        <label for="selesai_cuti">Selesai Cuti:</label>
        <input type="date" id="selesai_cuti" name="selesai_cuti" required>

        <label for="alamat">Alamat Selama Cuti:</label>
        <textarea id="alamat" name="alamat" rows="3" required></textarea>

        <button type="submit">Ajukan Cuti</button>
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
