<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Capital- Edit Profil</title>
    <link rel="stylesheet" href="edit_profil.css">
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
    <span class="profile-name">Admin</span>
    <a href="{{ route('profil_admin') }}">
        <img src="images/foto_ade.jpg" alt="Profile Icon" class="profile-icon">
    </a>
</div>
</div>


<div class="profile-container">
    <div class="profile-card">
        <div class="profile-header">
            <img src="images/foto_ade.jpg" alt="Profile Icon" class="profile-icon">
            <button class="upload-button">Upload Profil</button>
        </div>
        <form class="profile-form">
            <input type="text" placeholder="Username" name="username">
            <input type="email" placeholder="Email" name="email">
            <input type="tel" placeholder="No.Telp" name="phone">
            <input type="lama" placeholder="Password Lama" name="password lama">
            <input type="baru" placeholder="Password Baru" name="password baru">
            <input type="konf" placeholder="Konfirmasi Password" name="konfirmasi Password">
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
