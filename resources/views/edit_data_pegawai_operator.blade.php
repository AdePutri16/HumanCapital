<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Capital - Edit Data Pegawai</title>
    <link rel="stylesheet" href="edit_data_pegawai.css">
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

/* Edit Data Pegawai Section */
.container {
    width: 80%;
    margin: auto;
    overflow: hidden;
    padding: 20px;
    background: white;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
}

label {
    display: block;
    margin: 10px 0 5px;
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="date"],
select {
    width: 100%;
    padding: 10px;
    margin: 5px 0 20px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

input[type="submit"] {
    background-color: var(--primary);
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    width: 100%;
    font-size: 16px;
}

input[type="submit"]:hover {
    background-color: darkorange;
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
    <span class="profile-name">{{ auth()->user()->username }}</span>
    <a href="{{ route('profil_operator') }}">
        <img src="images/foto_ade.jpg" alt="Profile Icon" class="profile-icon">
    </a>
</div>
</div>


<!-- Edit Data Pegawai Section -->
<div class="container">
    <h2>Edit Data Pegawai</h2>
    <form action="/update_data_operator/{{ $peg->id}}" method="POST">
        @csrf
        @method('PUT')
        <label for="image">Image Pegawai:</label>
        <input type="file" id="image" name="image" accept="image/*" required>

        <label for="fullName">Nama Lengkap:</label>
        <input type="text" id="fullName" name="nama" value="{{$peg->nama}}" required>

        <label for="nip">NIP:</label>
        <input type="text" id="nip" name="nip" value="{{$peg->nip}}" required>

        <label for="birthPlace">Tempat Lahir:</label>
        <input type="text" id="birthPlace" name="tmpt_lahir" value="{{$peg->tmpt_lahir}}" required>

        <label for="birthDate">Tanggal Lahir:</label>
        <input type="date" id="birthDate" name="tgl_lahir" value="{{$peg->tgl_lahir}}" required>

        <label for="tmt">TMT:</label>
        <input type="date" id="tmt" name="tmt" value="{{$peg->tmt}}" required>

        <label for="education">Pendidikan Terakhir:</label>
        <input type="text" id="education" name="pendidikan" value="{{$peg->pendidikan}}" required>

        <label for="year">Tahun:</label>
        <input type="text" id="year" name="tahun" value="{{$peg->tahun}}" required>

        <label for="gender">Jenis Kelamin:</label>
        <select id="gender" name="jenis_kelamin" required>
            <option value="Perempuan" {{ $peg->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            <option value="Laki-laki" {{ $peg->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
        </select>

        <label for="nik">NIK:</label>
        <input type="text" id="nik" name="nik" value="{{$peg->nik}}" required>

        <label for="position">Jabatan:</label>
        <input type="text" id="position" name="jabatan" value="{{$peg->jabatan}}" required>

        <label for="maritalStatus">Status Kawin:</label>
        <select id="maritalStatus" name="status_kawin" required>
            <option value="Belum Menikah" {{ $peg->status_kawin == 'Belum Menikah' ? 'selected' : '' }}>Belum Menikah</option>
            <option value="Menikah" {{ $peg->status_kawin == 'Menikah' ? 'selected' : '' }}>Menikah</option>
        </select>

        <label for="phone">Nomor Telepon:</label>
        <input type="text" id="phone" name="no_tlp" value="{{$peg->no_tlp}}" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{$peg->email}}" required>

        <input type="submit" value="Simpan Perubahan">
</form>
</div>

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
