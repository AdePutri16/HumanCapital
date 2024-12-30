<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Human Capital</title>
    <link rel="stylesheet" href="rekap_absen.css">
</head>
<body>

<div class="header">
    <div class="logo">
        <img src="{{ asset('images/logo_bulat.png'
        ) }}" alt="Logo">
        <div>
            <div class="logo-text">Human Capital</div>
            <div class="subtitle">Sistem Manajemen Kepegawaian</div>
        </div>
    </div>

    <!-- Profile Section with Admin text -->
    <div class="profile-section">
        <span class="profile-name">Ade Putri Bustan S.Kom.,M.Kom</span>
        <img src="path/to/profile-icon.png" alt="Profile Icon" class="profile-icon">
    </div>
</div>

<!-- Navbar -->
<div class="navbar">
    <a href="#">Dashboard</a>
    <a href="#">Absen</a>
    <a href="#">Pengajuan Cuti</a>
    <a href="#">Notifikasi</a>
</div>

<!-- Absensi Summary Section -->
<!-- Absensi Summary Section -->
<div class="attendance-summary">
    <div class="attendance-circle">
        <div class="circle">
            <span>30.91<br>5/20 Hari</span>
        </div>
        <div class="status">
            <ul>
                <li>Hadir <span>3 Hari</span></li>
                <li>Izin <span>3 Hari</span></li>
                <li>Sakit <span>3 Hari</span></li>
                <li>Lain-Lain <span>3 Hari</span></li>
                <li>Terlambat <span>3 Hari</span></li>
            </ul>
        </div>
    </div>

    <div class="attendance-table">
        <!-- Dropdown untuk memilih bulan dan tahun -->
        <div class="select-month-year">
            <label for="bulan">Bulan:</label>
            <select id="bulan" name="bulan">
                <option value="januari">Januari</option>
                <option value="februari">Februari</option>
                <option value="maret">Maret</option>
                <option value="april">April</option>
                <option value="mei">Mei</option>
                <option value="juni">Juni</option>
                <option value="juli">Juli</option>
                <option value="agustus">Agustus</option>
                <option value="september">September</option>
                <option value="oktober">Oktober</option>
                <option value="november">November</option>
                <option value="desember">Desember</option>
            </select>

            <label for="tahun">Tahun:</label>
            <select id="tahun" name="tahun">
                <option value="2025">2022</option> 
                <option value="2024">2024</option>
                <option value="2023">2023</option>
                <!-- Anda bisa menambahkan tahun lain sesuai kebutuhan -->
            </select>
            <button type="submit">Tampilkan Rekap</button>
        </div>

        <h3>Absensi Bulan</h3>
        <table>
            <thead>
                <tr>
                    <th>Tanggal</th>
                    <th>Datang - Pulang</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>02 Okt 2024</td>
                    <td>15:00</td>
                    <td><a href="#">Detail</a></td>
                </tr>
                <tr>
                    <td>10 Okt 2024</td>
                    <td>10:30 - 11:20</td>
                    <td><a href="#">Detail</a></td>
                </tr>
                <tr>
                    <td>14 Okt 2024</td>
                    <td>16:00</td>
                    <td><a href="#">Detail</a></td>
                </tr>
                <tr>
                    <td>15 Okt 2024</td>
                    <td>16:00</td>
                    <td><a href="#">Detail</a></td>
                </tr>
            </tbody>
        </table>
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
