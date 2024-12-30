<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Capital - Absensi</title>
    <link rel="stylesheet" href="absen.css">
    <!-- Link ke Font Awesome untuk ikon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.26/webcam.min.js" integrity="sha512-dQIiHSl2hr3NWKKLycPndtpbh5iaHLo6MwrXm7F0FM5e+kL2U16oE9uIwPHUl6fQBeCthiEuV/rzP3MiAB8Vfw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
            color: var(--primary);
            font-size: 0.9em;
        }

        /* Profile Section and Dropdown Menu */
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
        .profile-name {
    color: #ffffff; /* Warna teks putih */
    font-size: 16px; /* Sesuaikan ukuran teks */
    font-weight: bold; /* Jika ingin teks tebal */
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

        /* Absensi Section */
        .absen-section {
            margin: 20px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .absen-section h2 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .absen-time {
            font-size: 16px;
            margin-bottom: 20px;
            color: #333;
        }

        .absen-location {
            font-size: 14px;
            margin-bottom: 20px;
            color: #666;
        }

        .selfie-box {
            position: relative;
            z-index: 10;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 2px dashed #ccc;
            width: 200px;
            height: 250px;
            margin-bottom: 20px;
            color: #888;
            
        }

        .absen-buttons {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .absen-buttons input {
            margin-right: 5px;
        }

        .submit-button {
    background-color: var(--primary);
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    display: block;
    margin: 0 auto; /* Memusatkan tombol */
}

.kamera {
    font-family: 'Arial', sans-serif; /* Mengubah font pada teks di dalam .kamera */
    font-size: 0.8em; /* Menyesuaikan ukuran font */
}

.submit-button:hover {
            background-color: #e69500;
        }
        .dropdown-menu a.active {
background-color: #2c3e50;
color: #ffffff;
font-weight: bold;
}
        /* Main Container */
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            padding: 20px;
            text-align: center;
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
<form action="{{ route('simpan_absen') }}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="absen-section">
        <h2>Absen</h2>
        <div class="absen-time">
            <i class="fas fa-clock"></i> <span id="current-time"></span>
            <p id="status-absen">
                {{ $statusAbsensi ?? 'Belum absen' }}
            </p>
        </div>

        <div class="absen-location">
            <i class="fas fa-map-marker-alt"></i> 
            <span id="location-info">Mengambil lokasi...</span>
        </div>

        <div class="kamera">
            <i class="fas fa-camera" onclick="startSelfie()"> Kamera</i>
        </div>
        <div class="container">
            <div class="selfie-box" id="selfieBox">
                <p>Selfie</p>
            </div>
            <canvas id="selfieCanvas" style="display: none;"></canvas>
        </div>

        <input type="hidden" name="id_pegawai" value="{{ auth()->user()->id }}">
        <input type="hidden" name="tanggal" value="{{ date('Y-m-d') }}">

        @if($statusAbsensi === 'Absen Masuk')
            <input type="hidden" name="jam_masuk" value="{{ now()->format('H:i') }}">
            <input type="hidden" name="lokasi_masuk" id="locationInput">
            <input type="hidden" name="foto_masuk" id="photoPathInput">
            <button class="submit-button" type="submit">Absen Masuk</button>
        @elseif($statusAbsensi === 'Absen Pulang')
            <input type="hidden" name="jam_keluar" value="{{ now()->format('H:i') }}">
            <input type="hidden" name="lokasi_keluar" id="locationInput">
            <input type="hidden" name="foto_keluar" id="photoPathInput">
            <button class="submit-button" type="submit">Absen Pulang</button>
        @endif
    </div>
</form>

<script>
    // Update the time every second
    setInterval(function () {
        document.getElementById('current-time').textContent = new Date().toLocaleString();
    }, 1000);

    // Get current location
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function (position) {
            document.getElementById('location-info').textContent = `Latitude: ${position.coords.latitude}, Longitude: ${position.coords.longitude}`;
            const locationInput = document.getElementById('locationInput');
            locationInput.value = `${position.coords.latitude},${position.coords.longitude}`;
        }, function (error) {
            document.getElementById('location-info').textContent = "Gagal mendapatkan lokasi. Pastikan GPS diaktifkan.";
        });
    } else {
        document.getElementById('location-info').textContent = "Geolokasi tidak didukung di browser ini.";
    }

    // Handle the selfie capture
    function startSelfie() {
        const video = document.createElement('video');
        const selfieBox = document.getElementById('selfieBox');
        const errorMessage = document.getElementById('error-message');

        selfieBox.innerHTML = ''; // Clear old content
        selfieBox.appendChild(video);

        if (!navigator.mediaDevices || !navigator.mediaDevices.getUserMedia) {
            selfieBox.innerHTML = '<p>Browser Anda tidak mendukung akses kamera. Silakan gunakan browser lain.</p>';
            return;
        }

        navigator.mediaDevices.getUserMedia({ video: true })
            .then(function (stream) {
                video.srcObject = stream;
                video.play();

                video.addEventListener('click', function () {
                    const canvas = document.getElementById('selfieCanvas');
                    const ctx = canvas.getContext('2d');
                    const MAX_WIDTH = 640;
                    const MAX_HEIGHT = 480;

                    let width = video.videoWidth;
                    let height = video.videoHeight;

                    if (width > height) {
                        if (width > MAX_WIDTH) {
                            height *= MAX_WIDTH / width;
                            width = MAX_WIDTH;
                        }
                    } else {
                        if (height > MAX_HEIGHT) {
                            width *= MAX_HEIGHT / height;
                            height = MAX_HEIGHT;
                        }
                    }

                    canvas.width = width;
                    canvas.height = height;
                    ctx.drawImage(video, 0, 0, width, height);

                    stream.getTracks().forEach(track => track.stop());

                    const selfieData = canvas.toDataURL('image/jpeg', 0.7);

                    const imageSize = byteSizeFromBase64(selfieData);
                    if (imageSize > 2 * 1024 * 1024) {
                        errorMessage.textContent = "Ukuran gambar terlalu besar! Harap coba lagi.";
                        return;
                    }

                    document.getElementById('photoPathInput').value = selfieData;

                    const img = document.createElement('img');
                    img.src = selfieData;
                    img.style.width = `${selfieBox.offsetWidth}px`;
                    img.style.height = `${selfieBox.offsetHeight}px`;
                    img.style.objectFit = 'cover';

                    selfieBox.innerHTML = '';
                    selfieBox.appendChild(img);
                });
            })
            .catch(function (error) {
                console.error('Gagal mengakses kamera:', error);
                selfieBox.innerHTML = '<p>Gagal mengakses kamera. Periksa izin browser.</p>';
            });
    }

    // Calculate byte size from Base64 image
    function byteSizeFromBase64(base64Data) {
        const binaryString = atob(base64Data.split(',')[1]);
        return binaryString.length;
    }

    // Validation before submission
    document.querySelector('.submit-button').addEventListener('click', function (e) {
        const photoPathInput = document.getElementById('photoPathInput').value;
        const locationInput = document.getElementById('locationInput').value;

        if (!photoPathInput || !locationInput) {
            e.preventDefault();
            const errorMessage = document.getElementById('error-message');
            errorMessage.textContent = 'Data selfie atau lokasi belum lengkap!';
            errorMessage.style.display = 'block';
        }
    });

    // Auto-set date and time on load
    window.onload = function () {
        const today = new Date();
        const dateInput = document.querySelector('input[name="tanggal"]');
        dateInput.value = today.toISOString().split('T')[0];

        const hours = today.getHours().toString().padStart(2, '0');
        const minutes = today.getMinutes().toString().padStart(2, '0');
        const timeInput = document.querySelector('input[name="jam_masuk"]');
        timeInput.value = `${hours}:${minutes}`;
    };
</script>



<!-- Footer Section -->
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
