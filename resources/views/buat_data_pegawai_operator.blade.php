<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Cpital - Form Data Pegawai</title>
    
    <link rel="stylesheet" href="buat_data_pegawai.css"> <!-- Link ke file CSS terpisah -->
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
    background-color: #f4f4f9;
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
    color: var(--font);
    font-size: 1.7em;
    font-weight: bold;
}

.header .subtitle {
    color: var(--primary);
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
    background-color: var(--hover);
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
.form-container {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f9f9f9;
}

.form-container h2 {
    text-align: center;
}

.form-container label {
    display: block;
    margin: 10px 0 5px;
}

.form-container input,
.form-container select {
    width: 290%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.form-container button {
    width: 295%;
    padding: 10px;
    background-color: #2c3e50;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.form-container button:hover {
    background-color: #34495e;
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

/* Form Container */
.form-container {
    display: flex;
    width: 80%;
    max-width: 2000px;
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    margin: 0 auto; /* Memusatkan secara horizontal */
    margin-top: 20px;
}


.image-section {
    flex: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    border: 1px solid #ddd;
    padding: 20px;
    margin-right: 20px;
    min-width: 100px;
    height: 150px;
    text-align: center;
}

.image-section img {
    max-width: 20%;
    max-height: 30%;
}

.form-fields {
    flex: 2;
}

.form-fields div {
    margin-bottom: 15px;
}

.form-fields label {
    display: block;
    font-weight: bold;
    margin-bottom: 5px;
}

.form-fields input[type="text"] {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.form-fields .two-fields {
    display: flex;
    gap: px;
}

.form-fields .two-fields input[type="text"] {
    width: 100%;
}
.simpan-button {
    background-color: var(--primary);
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    font-size: 1em;
    cursor: pointer;
    width: 100%; /* Sesuaikan lebarnya */
    margin-top: 15px; /* Jarak antara tombol dengan elemen di atasnya */
}

.simpan-button:hover {
    background-color: #e67e22; /* Warna saat hover */
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

    <div class="profile-section">
    <span class="profile-name">Operator</span>
    <a href="{{ route('profil_operator') }}">
        <img src="images/foto_ade.jpg" alt="Profile Icon" class="profile-icon">
    </a>
</div>
</div>

<div class="navbar">
    <a href="#">Dashboard</a>
    <a href="#">Data Pegawai</a>
    <a href="#">Absens</a>
    <a href="#">Validasi Cuti</a>
    <div class="dropdown">
        <a href="#">Rekapitulasi</a>
        <div class="dropdown-content">
            <a href="#">Kehadiran</a>
            <a href="#">Pengajuan Cuti dan Izin</a>
        </div>
    </div>
</div>

<!-- Form Data Pegawai -->
<div class="form-container">
<form action="{{ route('simpan_operator') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <label for="image_path">Foto Pegawai:</label>
        <input type="file" name="image_path" id="image_path" accept="image/*">
        
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>

        <label for="nip">NIP:</label>
        <input type="text" id="nip" name="nip" required>

        <label for="tmpt_lahir">Tempat Lahir:</label>
        <input type="text" id="tmpt_lahir" name="tmpt_lahir" required>

        <label for="tgl_lahir">Tanggal Lahir:</label>
        <input type="date" id="tgl_lahir" name="tgl_lahir" required>

        <label for="tmt">TMT:</label>
        <input type="date" id="tmt" name="tmt" required>

        <label for="pendidikan">Pendidikan Terakhir:</label>
        <input type="text" id="pendidikan" name="pendidikan" required>

        <label for="tahun">Tahun:</label>
        <input type="number" id="tahun" name="tahun" required>

        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <select id="jenis_kelamin" name="jenis_kelamin" required>
            <option value="Laki-laki">Laki-laki</option>
            <option value="Perempuan">Perempuan</option>
        </select>

        <label for="nik">NIK:</label>
        <input type="text" id="nik" name="nik" required>

        <label for="jabatan">Jabatan:</label>
        <input type="text" id="jabatan" name="jabatan" required>

        <label for="status_kawin">Status Kawin:</label>
        <select id="status_kawin" name="status_kawin" required>
            <option value="Menikah">Menikah</option>
            <option value="Belum Menikah">Belum Menikah</option>
        </select>

        <label for="no_tlp">No Telepon:</label>
        <input type="text" id="no_tlp" name="no_tlp">

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <button type="submit">Simpan Data Pegawai</button>
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
