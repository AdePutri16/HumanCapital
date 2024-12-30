<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Capital - Info Data Pegawai</title>
    <link rel="stylesheet" href="info_data_pegawai.css">
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
/* Employee Info */
.employee-info {
    display: flex;
    align-items: flex-start;
    padding: 20px;
    border: 1px solid #ddd;
    margin: 20px;
    background-color: #f9f9f9;
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}

.employee-photo .photo {
    width: 180px;
    height: 200px;
    object-fit: cover;
    border-radius: 5px;
    margin-right: 20px;
}

.employee-details {
    font-family: Arial, sans-serif;
}

.employee-details ul {
    list-style: none;
    padding: 8px;
}

.employee-details li {
    margin: 10px 0;
}

/* Edit Button */
.edit-button {
    background-color: #f39c12; /* Primary color */
    color: white;
    border: none;
    padding: 10px 15px;
    font-size: 1em;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.edit-button:hover {
    background-color: #e67e22; /* Darker shade for hover */
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
</div>


<div class="employee-info">
<div class="employee-photo">
            <img src="{{ asset('storage/' . $pegawai->image_path) }}" alt="Foto Pegawai" class="photo">
        </div>
    <div class="employee-details">
        <h2>Data Pegawai</h2>
        <ul>
                <li><strong>Nama Lengkap:</strong> {{ $pegawai->nama }}</li>
                <li><strong>NIP:</strong> {{ $pegawai->nip }}</li>
                <li><strong>Tempat Lahir:</strong> {{ $pegawai->tmpt_lahir }}</li>
                <li><strong>Tanggal Lahir:</strong> {{ date('d/m/Y', strtotime($pegawai->tgl_lahir)) }}</li>
                <li><strong>TMT:</strong> {{ date('d/m/Y', strtotime($pegawai->tmt)) }}</li>
                <li><strong>Tahun:</strong> {{ $pegawai->tahun}}</li>
                <li><strong>Jenis Kelamin:</strong> {{ $pegawai->jenis_kelamin }}</li>
                <li><strong>NIK:</strong> {{ $pegawai->nik }}</li>
                <li><strong>Jabatan:</strong> {{ $pegawai->jabatan }}</li>
                <li><strong>Status Kawin:</strong> {{ $pegawai->status_kawin }}</li>
                <li><strong>Nomor Telepon:</strong> {{ $pegawai->no_tlp }}</li>
                <li><strong>Email:</strong> {{ $pegawai->email }}</li>
            </ul>
        <a href="{{url('edit_data_pegawai_operator/'.$pegawai->id)}}" class="edit-button">Edit</a>
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
