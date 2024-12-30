<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Capital - Edit Profil</title>
    <link rel="stylesheet" href="edit_profil.css"> <!-- Tambahkan file CSS baru untuk styling -->
    <style>
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
.profile-container {
    width: 100%;
    max-width: 500px;
    background: #ffffff;
    border-radius: 12px;
    box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
    overflow: hidden;
    padding: 20px;
    box-sizing: border-box;
}

/* Profile Card */
.profile-card {
    text-align: center;
}

/* Profile Header */
.profile-header {
    position: relative;
    margin-bottom: 20px;
}

.profile-header .profile-icon {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    object-fit: cover;
    border: 4px solid #007BFF;
    margin-bottom: 10px;
}

.upload-button {
    display: inline-block;
    margin-top: 10px;
    padding: 8px 16px;
    font-size: 14px;
    color: white;
    background-color: #007BFF;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.upload-button:hover {
    background-color: #0056b3;
}

/* Profile Form */
.profile-form {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

.profile-form input {
    width: 100%;
    padding: 12px;
    font-size: 14px;
    border: 1px solid #ddd;
    border-radius: 5px;
    box-sizing: border-box;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.profile-form input:focus {
    border-color: #007BFF;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    outline: none;
}

/* Submit Button */
.simpan-btn {
    width: 100%;
    padding: 12px;
    font-size: 16px;
    color: white;
    background-color: #28a745;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.simpan-btn:hover {
    background-color: #218838;
}

/* Responsive Design */
@media (max-width: 576px) {
    .profile-container {
        padding: 15px;
    }

    .upload-button,
    .simpan-btn {
        font-size: 13px;
        padding: 10px;
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
        <span class="profile-name">Ade Putri Bustan S.Kom., M.Kom</span>
        <img src="images/foto_ade.jpg" alt="Profile Icon" class="profile-icon">
        <div class="dropdown-menu">
        <a href="{{ route('data_diri_user') }}" class="{{ Request::routeIs('data_diri_user') ? 'active' : '' }}">Data Diri</a>
        <a href="{{ route('profil_user') }}" class="{{ Request::routeIs('profil_user') ? 'active' : '' }}">Ubah Kata Sandi</a>
        <a href="{{route('logout')}}">Logout</a>
        </div>
    </div>
</div>

<div class="profile-container">
<form action="" method="POST">
        @csrf
        @method('PUT')
    <div class="profile-card">
        <div class="profile-header">
            <img src="path/to/profile-icon.png" alt="Profile Icon" class="profile-icon">
            <button class="upload-button">Upload Profil</button>
        </div>
        <form class="profile-form">
            <input type="email" placeholder="Email" name="email">
            <input type="tel" placeholder="No.Telp" name="phone">
            <button type="submit" class="simpan-btn">Simpan</button>
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
