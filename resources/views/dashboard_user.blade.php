<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Capital</title>
    <link rel="stylesheet" href="dashboard_user.css">
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
        /* Active Link Style */
        .dropdown-menu a.active {
background-color: #2c3e50;
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

/* General Styling for Dashboard Attendance Summary */
.dashboard-attendance-summary {
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    font-family: 'Arial', sans-serif;
}

.dashboard-attendance-summary h2 {
    text-align: center;
    font-size: 24px;
    font-weight: bold;
    color: #333;
    margin-bottom: 20px;
}

.summary-cards {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: center;
}

.summary-cards .card {
    border: none;
    border-radius: 10px;
    background-color: #4479A6;
    color: #ffffff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 20px;
    max-width: 250px;
    width: 100%;
    transition: transform 0.2s, box-shadow 0.2s;
}

.summary-cards .card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
}

.summary-cards .card h5 {
    font-size: 18px;
    color: #ffffff;
    margin-bottom: 10px;
}

.summary-cards .card p {
    font-size: 20px;
    font-weight: bold;
    color: #f0f8ff;
    margin: 0;
}

.text-center {
    text-align: center;
}

.mt-4 {
    margin-top: 1.5rem;
}

.text-center h5 {
    font-size: 18px;
    color: #666;
}

.text-center p {
    font-size: 24px;
    font-weight: bold;
    color: #28a745;
    margin: 0;
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

<!-- Navbar -->
<div class="navbar">
    <a href="{{ route('dashboard_user') }}" class="{{ Request::routeIs('dashboard_user') ? 'active' : '' }}">Dashboard</a>
    <a href="{{ route('absen_gps') }}" class="{{ Request::routeIs('absen_gps') ? 'active' : '' }}">Absen</a>
    <a href="{{ route('formulir_pengajuan') }}" class="{{ Request::routeIs('formulir_pengajuan') ? 'active' : '' }}">Pengajuan Cuti</a>
    <a href="{{ route('notifikasi') }}" class="{{ Request::routeIs('notifikasi') ? 'active' : '' }}">Notifikasi</a>
</div>

<div class="dashboard-attendance-summary">
    <h2>Rekap Absensi Bulan {{ date('F Y', mktime(0, 0, 0, $bulan, 1, $tahun)) }}</h2>
    <div class="summary-cards row">
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Hari Kerja</h5>
                    <p>{{ $jumlahHari }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Kehadiran</h5>
                    <p>{{ $dataAbsensi->count() }} hari</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Cuti</h5>
                    <p>{{ $jumlahCuti }} hari</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <h5>Terlambat</h5>
                    <p>{{ $jumlahTerlambat }} hari</p>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-4">
        <h5>Persentase Kehadiran</h5>
        <p><strong>{{ number_format($persentaseHadir, 2) }}%</strong></p>
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
