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
/* Styling umum untuk profile container */
.profile-container {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 30px;
    min-height: 10vh;
    background-color: #f8f9fa;
}

.profile-card {
    background-color: #ffffff;
    width: 100%;
    max-width: 500px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    padding: 20px;
    overflow: hidden;
}

.profile-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
}

.profile-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
}

.upload-button {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.upload-button:hover {
    background-color: #0056b3;
}

.profile-form {
    display: flex;
    flex-direction: column;
}

.profile-form input {
    font-size: 16px;
    padding: 12px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 8px;
    outline: none;
    transition: border-color 0.3s ease;
}

.profile-form input:focus {
    border-color: #007bff;
}

.simpan-btn {
    background-color: #28a745;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease;
}

.simpan-btn:hover {
    background-color: #218838;
}

@media (max-width: 600px) {
    .profile-card {
        width: 90%;
        padding: 15px;
    }

    .profile-header {
        flex-direction: column;
        align-items: center;
    }

    .profile-icon {
        width: 70px;
        height: 70px;
        margin-bottom: 15px;
    }

    .upload-button {
        margin-top: 10px;
    }

    .profile-form input {
        font-size: 14px;
        padding: 10px;
    }

    .simpan-btn {
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
    <span class="profile-name"> {{ auth()->user()->pegawai ? auth()->user()->pegawai->nama : 'Nama Tidak Tersedia' }}</span>
    <img src="{{ auth()->user()->pegawai && auth()->user()->pegawai->image_path ? asset('storage/' . auth()->user()->pegawai->image_path) : 'images/foto_default.jpg' }}" alt="Profile Icon" class="profile-icon">
    <div class="dropdown-menu">
        <a href="{{ route('data_diri_user') }}" class="{{ Request::routeIs('data_diri_user') ? 'active' : '' }}">Data Diri</a>
        <a href="{{ route('profil_user') }}" class="{{ Request::routeIs('profil_user') ? 'active' : '' }}">Ubah Kata Sandi</a>
        <a href="{{route('logout')}}">Logout</a>
    </div>
</div>

</div>
<div class="profile-container">
    <form action="{{ route('update_user') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="profile-card">
            <div class="profile-header">
                <!-- Gambar Profil -->
                <img src="{{ $pegawai->image_path ? asset('images/pegawai/' . $pegawai->image_path) : asset('path/to/default-icon.png') }}" 
                     alt="Profile Icon" 
                     class="profile-icon">
                <label for="profile_image" class="upload-button">Upload Profil</label>
                <!-- Input Gambar Profil -->
                <input type="file" name="profile_image" id="profile_image" style="display:none;">
            </div>

            <div class="profile-form">
                <!-- Input Email -->
                <input type="email" name="email" value="{{ old('email', $pegawai->email) }}" placeholder="Email">
                <input type="tel" name="phone" value="{{ old('phone', $pegawai->phone) }}" placeholder="No.Telp">
                <button type="submit" class="simpan-btn">Simpan</button>
            </div>
        </div>
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
