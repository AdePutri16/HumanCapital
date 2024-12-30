<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard_Operator</title>
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
    <style>
        :root {
    --background: #2c3e50;
    --primary: #FFBF61;
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

/* Tanda Link Aktif di Navbar */
.navbar a.active,
.navbar .dropdown > a.active {
    background-color: #5a6e83; /* Warna aktif sesuai dengan warna utama */
    color: var(--font);
    border-radius: 5px;
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
    top: calc(100% + 5px); /* Tambahkan jarak sedikit */
    left: 0;
    opacity: 0;
    transition: opacity 0.3s ease, transform 0.3s ease;
    transform: translateY(10px); /* Posisi awal dropdown sedikit ke bawah */
}

.navbar .dropdown:hover .dropdown-content {
    display: block;
    opacity: 1;
    transform: translateY(0); /* Posisikan kembali ke tempat semula */
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
/* Dropdown container */
.dropdown-content {
    display: none; /* Default hidden */
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 1;
    transition: opacity 0.3s ease, visibility 0.3s ease;
}

/* Show the dropdown on hover */
.dropdown:hover .dropdown-content {
    display: block;  /* Make it visible */
    opacity: 1;      /* Fade in */
    visibility: visible;  /* Make sure it's visible */
}

/* Optional: add a slight delay or smooth transition for hover effect */
.dropdown-content a {
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {
    background-color: #ddd;
}

/* Dashboard */
.dashboard {
    display: flex;
    flex-direction: column;
    align-items: flex-start; /* Menyelaraskan isi dashboard ke kiri */
    padding: 20px;
    color: #333;
}

/* Dashboard Title */
.dashboard h2 {
    display: flex; /* Mengatur ikon dan teks dalam satu baris */
    align-items: center; /* Menyelaraskan ikon dan teks secara vertikal */
    font-size: 1.0em; /* Ukuran teks */
    color: #333; /* Warna teks */
    margin: 0; /* Menghapus margin default */
}

.dashboard h2 i {
    margin-right: 8px; /* Spasi antara ikon dan teks */
    color: #333; /* Warna ikon sesuai dengan warna teks */
    font-size: 1.0em; /* Ukuran ikon */
    vertical-align: middle; /* Menjaga ikon sejajar dengan teks */
}

.dashboard h3 {
    margin-top: 20px;
    color: #333;
}

#leaveChart {
    max-width: 50%;
    margin-top: 10px;
}
/* Styling untuk elemen canvas agar berada di kiri */
#attendancePieChart {
    display: block;
    margin: 0 0 0 0; /* Hapus margin di kiri dan atas, gunakan margin di bawah jika perlu */
    max-width: 400px;
    max-height: 300px;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
}

/* Styling untuk container chart agar terpusat */
.chart-container {
    display: flex;
    flex-direction: column;
    margin-bottom: 30px;
    background-color: #ffffff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Tambahkan ruang antar bagian */
.chart-container h3 {
    margin-bottom: 10px;
    font-size: 1.5rem;
    color: #555;
}

.dashboard-content {
    display: flex;
    gap: 20px;
    flex-wrap: wrap;
    justify-content: center;
    margin-top: 20px;
}

.dashboard-card1, .dashboard-card3 {
    background-color: #FFBF61;
    color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    width: 350px;
    text-align: center;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}


.dashboard-card1 { background-color: #FFBF61; }
.dashboard-card2 { background-color: #72BF78; }
.dashboard-card3 { background-color: #D9534F; }

.data-count {
    font-size: 32px;
    font-weight: bold;
    margin: 0;
}

.card-title {
    margin-top: 5px;
    font-size: 18px;
}
.card-title2 {
    margin-bottom: 5px;
    font-size: 20px;
    padding-top: 10px;
}
.more-info {
    background: rgba(0, 0, 0, 0.1);
    padding: 10px;
    margin-top: 10px;
    font-size: 14px;
    font-weight: bold;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}

.more-info::after {
    content: '→';
    font-weight: bold;
    margin-left: 5px;
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
<div class="navbar">
    <a href="{{ route('dashboard_operator') }}" class="{{ Request::routeIs('dashboard_operator') ? 'active' : '' }}">Dashboard</a>
    <a href="{{ route('data_pegawai_operator') }}" class="{{ Request::routeIs('data_pegawai_operator') ? 'active' : '' }}">Data Pegawai</a>
    <a href="{{ route('bukti_kehadiran_operator') }}" class="{{ Request::routeIs('bukti_kehadiran_operator') ? 'active' : '' }}">Absen</a>
    <a href="{{ route('validasi_cuti_izin') }}" class="{{ Request::routeIs('validasi_cuti_izin') ? 'active' : '' }}">Validasi</a>
    <!-- Dropdown Menu Rekapitulasi -->
    <div class="dropdown">
        <a href="#" class="{{ Request::routeIs('rekap_kehadiran_operator', 'table_cuti_operator') ? 'active' : '' }}">Rekapitulasi</a>
        <div class="dropdown-content">
            <a href="{{ route('rekap_kehadiran_operator') }}" class="{{ Request::routeIs('rekap_kehadiran_operator') ? 'active' : '' }}">Kehadiran</a>
            <a href="{{ route('table_cuti_operator') }}" class="{{ Request::routeIs('table_cuti_operator') ? 'active' : '' }}">Pengajuan Cuti</a>
        </div>
    </div>
</div>
    <!-- Navbar -->
    <div class="dashboard">
    <h2><i class="fas fa-home"></i>Dashboard</h2>
    <div class="dashboard-content">
        <div class="dashboard-card1">
            <p class="data-count">0</p>
            <p class="card-title">Jumlah Pegawai</p>
            <div class="more-info" onclick="window.location='{{ route('data_pegawai_admin') }}'">More Info</div>
        </div>
        <div class="dashboard-card2">
            <p class="data-count">0 (0%)</p>
            <p class="card-title">Hadir Tepat Waktu</p>
            <div class="more-info">More Info</div>
        </div>
        <div class="dashboard-card3">
            <p class="data-count">0 (0%)</p>
            <p class="card-title">Terlambat</p>
            <div class="more-info">More Info</div>
        </div>
    </div>

    <!-- Canvas element for the bar chart -->
    <h3>Pengajuan Izin dan Cuti</h3>
    <canvas id="leaveChart" width="400" height="200"></canvas>

    <h3>Rekap Kehadiran</h3>
    <canvas id="attendancePieChart" width="400" height="200"></canvas>

</div>

<!-- Include Chart.js from CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Sample data for Leave and Permission Applications
    const data = {
    labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
    datasets: [
        {
            label: 'Pengajuan Izin',
            data: [5, 8, 3, 7, 6, 4, 5, 2, 3, 6, 7, 5],
            backgroundColor: 'rgba(75, 192, 192, 0.6)', // Warna baru untuk izin
            borderColor: 'rgba(75, 192, 192, 1)',        // Warna border baru untuk izin
            borderWidth: 1,
        },
        {
            label: 'Pengajuan Cuti',
            data: [2, 4, 1, 3, 5, 3, 2, 6, 4, 5, 3, 4],
            backgroundColor: 'rgba(255, 159, 64, 0.6)', // Warna baru untuk cuti
            borderColor: 'rgba(255, 159, 64, 1)',       // Warna border baru untuk cuti
            borderWidth: 1,
        },
    ],
};


    // Configuring the chart
    const config = {
        type: 'bar', // Bar chart type
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Pengajuan Izin dan Cuti per Bulan',
                },
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Jumlah Pengajuan'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Bulan'
                    }
                }
            }
        },
    };

    // Render the chart
    const ctx = document.getElementById('leaveChart').getContext('2d');
    new Chart(ctx, config);
});


document.addEventListener('DOMContentLoaded', function () {
    // Data Kehadiran
    const attendanceData = {
        labels: ['Hadir', 'Sakit', 'Izin', 'Cuti', 'Alpa'], // Menambahkan label baru
        datasets: [
            {
                data: [70, 10, 8, 7, 5], // Contoh data: menyesuaikan untuk 5 kategori
                backgroundColor: [
                    'rgba(75, 192, 192, 0.6)', // Warna untuk Hadir
                    'rgba(255, 205, 86, 0.6)', // Warna untuk Sakit
                    'rgba(255, 99, 132, 0.6)', // Warna untuk Izin
                    'rgba(153, 102, 255, 0.6)', // Warna untuk Cuti
                    'rgba(201, 203, 207, 0.6)'  // Warna untuk Alpa
                ],
                borderColor: [
                    'rgba(75, 192, 192, 1)',
                    'rgba(255, 205, 86, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(201, 203, 207, 1)'
                ],
                borderWidth: 1,
            },
        ],
    };

    // Konfigurasi pie chart
    const attendanceConfig = {
        type: 'pie', // Tipe pie chart
        data: attendanceData,
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                title: {
                    display: true,
                    text: 'Rekap Kehadiran'
                },
            },
        },
    };

    // Render pie chart
    const attendanceCtx = document.getElementById('attendancePieChart').getContext('2d');
    new Chart(attendanceCtx, attendanceConfig);
});

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
