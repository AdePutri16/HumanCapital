<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Capital - Tabel Rekapitulasi Kehadiran</title>
    <link rel="stylesheet" href="table_rekap_kehadiran.css">
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
/* Attendance Table */
.attendance-table {
    width: 125%;
    display: flex;
    margin-top: 10px;
    margin-bottom: 20px;
}

.attendance-table table {
    width: 80%;
    border-collapse: collapse;
    background-color: var(--box2);
    text-align: center;
}

.attendance-table thead th {
    padding: 10px;
    background-color: var(--box1);
    color: #333;
    font-weight: bold;
    border: 1px solid #ddd;
}

.attendance-table thead th[colspan="8"] {
    background-color: #add8e6; /* Light blue color */
    font-size: 1.2em;
}

.attendance-table th, .attendance-table td {
    padding: 8px;
    border: 1px solid #ddd;
}

.attendance-table tbody td {
    background-color: #f4eeee;
    color: #333;
    font-size: 0.9em;
}

.attendance-table tbody tr:hover {
    background-color: #f0eaea;
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


<!-- Attendance Table Section -->
<div class="attendance-table">
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Tanggal</th>
                <th>Status Kehadiran</th>
            </tr>
        </thead>
        <tbody>
            @foreach($absensi as $absen)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $absen->pegawai->nama }}</td>
                    <td>{{ \Carbon\Carbon::parse($absen->tanggal)->format('d-m-Y') }}</td>

                    <td>
                    @if($absen->status == 'Hadir')
                            <span class="badge badge-success">Hadir</span>
                        @elseif($absen->status == 'Alpa')
                            <span class="badge badge-danger">Alpa</span>
                        @elseif($absen->status == 'Cuti')
                            <span class="badge badge-primary">Cuti</span>
                        @endif
                    </td>
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
