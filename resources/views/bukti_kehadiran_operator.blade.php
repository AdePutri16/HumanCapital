<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Capital - Bukti Kehadiran </title>
    <link rel="stylesheet" href="bukti_kehadiran_operator.css">
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

/* Responsive Design */
@media (max-width: 1024px) {
    .header {
        flex-direction: column;
        text-align: center;
    }

    .profile-section {
        flex-direction: column;
        align-items: center;
    }

    .profile-icon {
        width: 50px;
        height: 50px;
    }

    .attendance-section {
        padding: 15px;
    }

    .navbar {
        flex-wrap: wrap;
        justify-content: center;
    }

    .navbar a {
        font-size: 0.9em;
        padding: 8px 10px;
    }

    .dropdown-content {
        left: auto;
        right: auto;
    }

    form {
        flex-direction: column;
        gap: 10px;
    }

    form button {
        width: 100%;
    }
}

@media (max-width: 768px) {
    .header {
        padding: 15px;
    }

    .header .logo img {
        width: 60px;
        height: 60px;
    }

    .attendance-section {
        font-size: 0.9em;
    }

    .footer-content {
        flex-direction: column;
        gap: 10px;
    }

    .footer-section h3 {
        font-size: 1em;
    }

    .footer-section p {
        font-size: 0.8em;
    }
}

@media (max-width: 480px) {
    .profile-name {
        font-size: 0.8em;
    }

    .attendance-section {
        padding: 10px;
    }

    .navbar a {
        font-size: 0.8em;
        padding: 5px 8px;
    }

    .footer-content {
        padding: 10px;
    }

    .footer-section h3 {
        font-size: 0.9em;
    }

    .footer-section p {
        font-size: 0.7em;
    }
}
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

 <!-- Navbar -->
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
    </div>

    <div class="attendance-section">
    <h2><i class="fas fa-calendar-check"></i> Kehadiran</h2>
    
    <!-- Form Pencarian -->
    <form method="GET" action="">
        <input type="text" name="search" class="search-box" placeholder="Search" value="{{ request('search') }}">
        <button type="submit">Search</button>
    </form>

    <table class="attendance-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Foto Masuk</th>
                <th>Lokasi Masuk</th>
                <th>Jam Pulang</th>
                <th>Foto Pulang</th>
                <th>Lokasi Pulang</th>
            </tr>
        </thead>
        <tbody>
            @foreach($absensiList as $index => $absensi)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $absensi->nama }}</td>
                    <td>{{ \Carbon\Carbon::parse($absensi->tanggal)->format('d/m/Y') }}</td>
                    <td>{{ $absensi->jam_masuk }}</td>
                    <td>
                        @if($absensi->foto_masuk)
                            <img src="{{ Storage::url($absensi->foto_masuk) }}" width="50" height="50">
                        @else
                            <p>Foto tidak tersedia</p>
                        @endif
                    </td>
                    <td>{{ $absensi->lokasi_masuk }}</td>
                    <td>{{ $absensi->jam_keluar ?? 'Belum pulang' }}</td>
                    <td>
                        @if($absensi->foto_keluar)
                            <img src="{{ Storage::url($absensi->foto_keluar) }}" width="50" height="50">
                        @else
                            <p>Foto tidak tersedia</p>
                        @endif
                    </td>
                    <td>{{ $absensi->lokasi_keluar ?? 'Belum pulang' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
