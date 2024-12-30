<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Human Capital - Data Pegawai</title>
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="data_pegawai_admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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

//* Profile Section */
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

/* Employee Data Section */
.employee-data-container {
    padding: 20px;
    background-color: #f9f9f9;
}

.employee-data-container h2 {
    font-size: 0.9em;
    display: flex;
    align-items: center;
    color: #333;
}

.employee-actions {
    display: flex;
    align-items: center;
    gap: 10px;
    margin: 10px 0;
}

.add-employee-button {
    background-color: #ffb84d;
    border: none;
    padding: 8px 16px;
    color: #fff;
    cursor: pointer;
    border-radius: 5px;
}

.search-wrapper {
    display: flex;
    align-items: center;
    gap: 5px; /* Jarak antara input dan tombol */
    position: absolute; /* Agar bisa diatur posisinya */
    right: 20px; /* Atur jarak dengan sisi kanan */
    top: 230px; /* Atur jarak dengan atas, sesuaikan sesuai kebutuhan */
}


.search-bar {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px 0 0 5px; /* Round hanya di kiri */
    width: 200px;
}

.search-button {
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 0 5px 5px 0; /* Round hanya di kanan */
    background-color: var(--primary); /* Gunakan warna tema */
    color: white;
    cursor: pointer;
}

.search-button:hover {
    background-color: #e67e22; /* Warna hover */
}

.employee-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
    margin-bottom: 100px;
}

.employee-table th, .employee-table td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: center;
}

.employee-table th {
    background-color: #e0f7fa;
    color: #333;
}

.profile-img {
    width: 100px;
    height: 120px;
    object-fit: cover;
}

.actions button {
    border: none;
    cursor: pointer;
    padding: 5px 10px;
    border-radius: 5px;
    margin: 0 2px;
}

.edit-button {
    background-color: #72BF78;
    color: white;
}

.delete-button {
    background-color: var(--card);
    color: white;
}

.info-button {
    background-color: #ffc107;
    color: white;
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
    <a href="{{ route('profil_admin') }}">
        <img src="images/foto_ade.jpg" alt="Profile Icon" class="profile-icon">
    </a>
</div>

</div>

    <!-- Navbar -->
    <div class="navbar">
    <a href="{{ route('dashboard') }}" class="{{ Request::routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
    <a href="{{ route('data_pegawai_admin') }}" class="{{ Request::routeIs('data_pegawai_admin') ? 'active' : '' }}">Data Pegawai</a>

    <!-- Dropdown Menu Rekapitulasi -->
    <div class="dropdown">
        <a href="#" class="{{ Request::routeIs('rekap_kehadiran', 'table_cuti_admin') ? 'active' : '' }}">Rekapitulasi</a>
        <div class="dropdown-content">
            <a href="{{ route('rekap_kehadiran') }}" class="{{ Request::routeIs('rekap_kehadiran') ? 'active' : '' }}">Kehadiran</a>
            <a href="{{ route('table_cuti_admin') }}" class="{{ Request::routeIs('table_cuti_admin') ? 'active' : '' }}">Pengajuan Cuti</a>
        </div>
    </div>
    <a href="{{ route('report') }}" class="{{ Request::routeIs('report') ? 'active' : '' }}">Report</a>
</div>

    <!-- Data Pegawai Section -->
    <div class="employee-data-container">
    <h2><i class="fas fa-users"></i> Data Pegawai</h2> 
    <div class="employee-actions">
        <form method="GET" action="{{ route('search_pegawai') }}">
    <div class="search-wrapper">
        <input type="search" name="search" placeholder="Search" class="search-bar" value="{{ request('data_pegawai_admin') }}">
        <button type="submit" class="search-button"><i class="fas fa-search"></i></button>
    </div>
</form>
</div>
    </div>


    <table class="employee-table">
    <thead>
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Nama Lengkap</th>
            <th>NIP</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>TMT</th>
            <!-- <th>Pendidikan Terakhir</th>
            <th>Tahun</th>
            <th>Jenis Kelamin</th>
            <th>NIK</th>
            <th>Jabatan</th>
            <th>Status Kawin</th>
            <th>No Telp</th>
            <th>Email</th> -->
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dtPegawai as $item)
            <tr>
            <td>{{ $loop->iteration }}</td>
                <td>
                    @if ($item->image_path)
                    <img src="{{ asset('storage/' . $item->image_path) }}" alt="Foto Pegawai" width="50" height="50">
                    @else
                        <span>No Image</span>
                    @endif
                </td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->nip }}</td>
                <td>{{ $item->tmpt_lahir }}</td>
                <td>{{ date('d-m-Y', strtotime($item->tgl_lahir))}}</td>
                <td>{{ date('d-m-Y', strtotime($item->tmt))}}</td>
                <!-- <td>{{ $item->pendidikan }}</td>
                <td>{{ $item->tahun }}</td>
                <td>{{ $item->jenis_kelamin }}</td>
                <td>{{ $item->nik }}</td>
                <td>{{ $item->jabatan }}</td>
                <td>{{ $item->status_kawin }}</td>
                <td>{{ $item->no_tlp }}</td>
                <td>{{ $item->email }}</td> -->
                <td>
                    <a href="{{url('edit_data_pegawai/'.$item->id)}}"><i class="fas fa-edit"></i></a>
                    <a href="{{url('delete_data_pegawai/'.$item->id)}}" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                <button class="delete-button" style="border: none; background: none; color: red; cursor: pointer;">
                    <i class="fas fa-trash-alt"></i>
                 </button>
                </a>

                    <a href="{{url('info_data_pegawai/'.$item->id)}}"><i class="fas fa-info-circle" style="color: blue;"></i></a>
                    <!-- <button class="edit-button" onclick="window.location.href='/edit_data_pegawai/{{ $item->id }}'">✏️</button>
                    <button class="delete-button" onclick="window.location.href='/delete_data_pegawai/{{ $item->id }}'">🗑️</button>
                    <button class="info-button" onclick="window.location.href='/info_data_pegawai/{{ $item->id }}'">ℹ️</button> -->
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="pagination">
    {{ $dtPegawai->links() }} <!-- Gunakan links() untuk paginasi -->
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