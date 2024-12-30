<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Capital- Edit Profil</title>
    <link rel="stylesheet" href="edit_profil.css">
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


.profile-container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

.profile-card {
    width: 500px;
    background-color: #f8f4f4;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
}

.profile-header {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
}

.profile-icon {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    background-color: #ccc;
    margin-bottom: 10px;
}


.profile-form {
    display: flex;
    flex-direction: column;
}

.profile-form input {
    padding: 10px;
    margin: 8px 0;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
}

.simpan-btn {
    background-color: #ffac33;
    color: white;
    padding: 10px;
    border: none;
    border-radius: 5px;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s;
}

.simpan-btn:hover {
    background-color: #e69900;
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

/* Footer */
.footer {
    background-color: #2c3e50;
    color: #ffffff;
    padding: 20px 0;
    position: relative;
    bottom: 0;
    width: 100%;
}

.footer-content {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

.footer-section {
    flex: 1;
    margin: 10px;
}

.footer-section h3 {
    font-size: 1.2em;
    margin-bottom: 10px;
}

.footer-section p,
.footer-section ul {
    font-size: 0.9em;
    line-height: 1.5;
}

.footer-section ul {
    list-style-type: none;
    padding: 0;
}

.footer-section ul li {
    margin-bottom: 5px;
}

.footer-section ul li a {
    color: #ffffff;
    text-decoration: none;
}

.footer-section ul li a:hover {
    text-decoration: underline;
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
    .header {
        flex-direction: column;
        align-items: center;
    }

    .dashboard-content {
        flex-direction: column;
        align-items: center;
    }

    .footer-content {
        flex-direction: column;
        text-align: center;
    }

    .navbar {
        flex-direction: column;
    }

    .navbar a, .navbar .dropdown {
        display: block;
        width: 100%;
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
