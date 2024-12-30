<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Capital - Lokasi GPS</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

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
        /* Active Link Style */
.dropdown-menu a.active {
background-color: #2c3e50;
color: #ffffff;
font-weight: bold;
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
.profile-name {
    color: #ffffff; /* Warna teks putih */
    font-size: 16px; /* Sesuaikan ukuran teks */
    font-weight: bold; /* Jika ingin teks tebal */
}

        /* Map Section */
        #map {
            height: 500px;
            width: 100%;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .container {
            max-width: 900px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            text-align: center;
        }

        .location-info {
            font-size: 1rem;
            margin: 15px 0;
            color: #2c3e50;
        }

        /* Button Konfirmasi */
        .confirm-button {
            display: inline-block;
            background-color: var(--primary);
            color: var(--font-color);
            padding: 15px 30px;
            font-size: 1rem;
            font-weight: bold;
            text-align: center;
            border-radius: 50px;
            text-decoration: none;
            transition: 0.3s;
            cursor: pointer;
            border: none;
        }

        .confirm-button:hover {
            background-color: #d68910;
        }

        .confirm-button:active {
            transform: scale(0.95);
        }

        .loading {
            font-size: 1rem;
            color: #2c3e50;
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

            .navbar {
                flex-direction: column;
            }

            .navbar a, .navbar .dropdown {
                display: block;
                width: 100%;
                text-align: center;
            }

            #map {
                height: 400px;
                width: 100%;
            }

            .confirm-button {
                width: 100%;
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

<div class="container">
    <h2>Lokasi Anda Saat Ini</h2>
    <p class="location-info" id="locationStatus">Sedang melacak lokasi...</p>

    <!-- Peta untuk menampilkan lokasi -->
    <div id="map"></div>

    <!-- Tombol Konfirmasi Lokasi -->
    <button class="confirm-button" id="confirmLocationButton" disabled>Konfirmasi Lokasi</button>
</div>

<script>
   // Koordinat Kampus 1 dan Kampus 2 dalam desimal
const kampus1 = { lat:  -4.0059, lng: 119.6257 }; // Kampus 1
const kampus2 = { lat: -4.0135, lng:  119.6250 }; // Kampus 2

// Fungsi untuk menghitung jarak menggunakan rumus Haversine
function calculateDistance(lat1, lng1, lat2, lng2) {
    const R = 6371; // Radius Bumi dalam kilometer
    const dLat = (lat2 - lat1) * Math.PI / 180;
    const dLng = (lng2 - lng1) * Math.PI / 180;
    const a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
              Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
              Math.sin(dLng / 2) * Math.sin(dLng / 2);
    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    const distance = R * c;
    return distance;
}

// Fungsi untuk menampilkan lokasi pengguna dan peta
function showLocation(lat, lng) {
    map = L.map('map').setView([lat, lng], 16);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
    }).addTo(map);

    userMarker = L.marker([lat, lng]).addTo(map);
    radiusCircle = L.circle([lat, lng], { radius: 100 }).addTo(map); // radius 100 meter

    // Menandai lokasi kampus
    L.marker([kampus1.lat, kampus1.lng]).addTo(map).bindPopup('Kampus 1');
    L.marker([kampus2.lat, kampus2.lng]).addTo(map).bindPopup('Kampus 2');

    // Menghitung jarak ke kampus 1 dan kampus 2
    const distanceToKampus1 = calculateDistance(lat, lng, kampus1.lat, kampus1.lng);
    const distanceToKampus2 = calculateDistance(lat, lng, kampus2.lat, kampus2.lng);

    // Menampilkan jarak ke dua kampus
    alert(`Jarak Anda ke Kampus 1: ${distanceToKampus1.toFixed(2)} km`);
    alert(`Jarak Anda ke Kampus 2: ${distanceToKampus2.toFixed(2)} km`);

    // Cek apakah jarak lebih dari 15 km
    if (distanceToKampus1 > 15) {
        alert("Anda terlalu jauh dari Kampus 1 untuk absen.");
    }

    if (distanceToKampus2 > 15) {
        alert("Anda terlalu jauh dari Kampus 2 untuk absen.");
    }
}

// Fungsi untuk mendapatkan lokasi pengguna
function getUserLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
            (position) => {
                const lat = position.coords.latitude;
                const lng = position.coords.longitude;

                localStorage.setItem('latitude', lat);
                localStorage.setItem('longitude', lng);

                document.getElementById('locationStatus').textContent = 'Lokasi berhasil ditemukan.';
                document.getElementById('confirmLocationButton').disabled = false;

                showLocation(lat, lng);
            },
            (error) => {
                document.getElementById('locationStatus').textContent = 'Gagal mendapatkan lokasi Anda. Pastikan GPS diaktifkan.';
                document.getElementById('confirmLocationButton').disabled = true;
            },
            {
                enableHighAccuracy: true,
                timeout: 10000,
                maximumAge: 0
            }
        );
    } else {
        document.getElementById('locationStatus').textContent = 'Geolocation tidak didukung oleh browser Anda.';
        document.getElementById('confirmLocationButton').disabled = true;
    }
}

    // Fungsi untuk konfirmasi lokasi
    document.getElementById('confirmLocationButton').addEventListener('click', () => {
        const lat = localStorage.getItem('latitude');
        const lng = localStorage.getItem('longitude');
        alert(`Lokasi Anda yang terkonfirmasi: Latitude: ${lat}, Longitude: ${lng}`);
    });

    // Memulai pelacakan lokasi saat halaman dimuat
    window.onload = getUserLocation;
    // Menentukan tombol dan menambahkan event listener
    document.getElementById('confirmLocationButton').addEventListener('click', function() {
    // Mengarahkan pengguna ke halaman absen_user dengan menggunakan URL Laravel
    window.location.href = '{{ route('absen_user') }}';  // Arahkan ke halaman absen_user
});

// Menambahkan logika untuk mendapatkan lokasi dan mengaktifkan tombol
if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
        var userLat = position.coords.latitude;
        var userLon = position.coords.longitude;

        // Aktifkan tombol setelah lokasi berhasil didapat
        document.getElementById('confirmLocationButton').disabled = false;
    }, function(error) {
        alert('Gagal mendapatkan lokasi.');
    });
} else {
    alert('Geolocation tidak didukung oleh browser ini.');
}

</script>

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
