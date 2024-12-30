<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilAdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BuatDataPegawaiOperatorController;
use App\Http\Controllers\BuatDataPegawaiController;
use App\Http\Controllers\BuktiKehadiranController;
use App\Http\Controllers\DashboardOperatorController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DataDiriUserController;
use App\Http\Controllers\DataPegawaiController;
use App\Http\Controllers\DataPegawaiOperatorController;
use App\Http\Controllers\DetailPengajuanController;
use App\Http\Controllers\EditProfilAdminController;
use App\Http\Controllers\EditProfilOperatorController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FormulirPengajuanController;
use App\Http\Controllers\InfoDataPegawaiController;
use App\Http\Controllers\InfoDataPegawaiOperatorController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\ProfilOperatorController;
use App\Http\Controllers\ProfilUserController;
use App\Http\Controllers\RekapKehadiranController;
use App\Http\Controllers\RekapKehadiranOperatorController;
use App\Http\Controllers\TableCutiAdminController;
use App\Http\Controllers\TableCutiOperatorController;
use App\Http\Controllers\TableRekapKehadiranAdminController;
use App\Http\Controllers\TableRekapKehadiranOperatorController;
use App\Http\Controllers\ValidasiCutiController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\BuatAkunController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OperatorController;
use App\Http\Controllers\AbsenUserController;
use App\Http\Controllers\AbsenGpsController;
use App\Http\Controllers\EditUserController;
use App\Http\Controllers\RekapAbsenUserController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/welcomith', function () {
    return view('welcomith');
});
Route::get('/login', function () {
    return view('login');
});
// Route::get('/dashboard_admin', function () {
//     return view('dashboard_admin');
// });
Route::get('/data_pegawai_admin', function () {
    return view('data_pegawai_admin');
});
Route::get('/profil_admin', function () {
    return view('profil_admin');
});
Route::get('/report', function () {
    return view('report');
});
Route::get('/buat_data_pegawai', function () {
    return view('buat_data_pegawai');
});
Route::get('/edit_data_pegawai', function () {
    return view('edit_data_pegawai');
});
Route::get('/edit_profil', function () {
    return view('edit_profil');
});
Route::get('/info_data_pegawai', function () {
    return view('info_data_pegawai');
});
Route::get('/rekap_cuti_izin', function () {
    return view('rekap_cuti_izin');
});
Route::get('/rekap_kehadiran', function () {
    return view('rekap_kehadiran');
});
Route::get('/table_cuti_admin', function () {
    return view('table_cuti_admin');
});
Route::get('/table_rekap_kehadiran', function () {
    return view('table_rekap_kehadiran');
});
Route::get('/buat_akun', function () {
    return view('buat_akun');
});

Route::get('/profil_admin', [ProfilAdminController::class, 'showProfilAdminForm'])->name('profil_admin');
// Route::get('/dashboard_admin', [DashboardAdminController::class, 'showDashboardAdminForm'])->name('dashboard_admin')->middleware('admin');
Route::get('edit_data_pegawai/{id}', [DataPegawaiController::class, 'edit'])->name('edit_data_pegawai');
Route::get('/data_pegawai_admin', [DataPegawaiController::class, 'index'])->name('data_pegawai_admin');
Route::get('/report', [ReportController::class, 'showReportForm'])->name('report');

Route::post('/simpan', [DataPegawaiController::class, 'store'])->name('simpan');
Route::get('/rekap_kehadiran', [RekapKehadiranController::class, 'index'])->name('rekap_kehadiran');

Route::get('/table_cuti_admin', [TableCutiAdminController::class, 'showTableCutiAdminForm'])->name('table_cuti_admin');
Route::get('/table_rekap_kehadiran', [TableRekapKehadiranAdminController::class, 'showTableRekapKehadiranAdminForm'])->name('table_rekap_kehadiran');
Route::get('/profil_admin', [ProfilAdminController::class, 'showProfilAdminForm'])->name('profil_admin');
Route::get('/edit_profil', [EditProfilAdminController::class, 'showEditProfilAdminForm'])->name('edit_profil');
Route::get('/info_data_pegawai', [InfoDataPegawaiController::class, 'index'])->name('info_data_pegawai');
Route::get('/buat_akun', [BuatAkunController::class, 'showBuatAkunForm'])->name('buat_akun');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
//operator
Route::get('/dashboard_operator', function () {
    return view('dashboard_operator');
});
Route::get('/buat_data_pegawai_operator', function () {
    return view('buat_data_pegawai_operator');
});
Route::get('/bukti_kehadiran_operator', function () {
    return view('bukti_kehadiran_operator');
});
Route::get('/data_pegawai_operator', function () {
    return view('data_pegawai_operator');
});
Route::get('/detail_pegajuan', function () {
    return view('detail_pegajuan');
});
Route::get('/edit_data_pegawai_operator', function () {
    return view('edit_data_pegawai_operator');
});
Route::get('/edit_profil_operator', function () {
    return view('edit_profil_operator');
});
Route::get('/info_datapeg_operator', function () {
    return view('info_datapeg_operator');
});

Route::get('/profil_operator', function () {
    return view('profil_operator');
});
Route::get('/rekap_absen_user', function () {
    return view('rekap_absen_user');
});
Route::get('/rekap_kehadiran_operator', function () {
    return view('rekap_kehadiran_operator');
});
Route::get('/table_rekap_kehadiran_operator', function () {
    return view('table_rekap_kehadiran_operator');
});
Route::get('/validasi_cuti_izin', function () {
    return view('validasi_cuti_izin');
});
Route::get('/detail_pengajuan', function () {
    return view('detail_pengajuan');
});

Route::get('/dashboard_operator', [DashboardOperatorController::class, 'showDashboardOperatorForm'])->name('dashboard_operator');
Route::get('/profil_operator', [ProfilOperatorController::class, 'showProfilOperatorForm'])->name('profil_operator');
// Route::get('/buat_data_pegawai_operator', [BuatDataPegawaiOperatorController::class, 'showBuatDataPegawaiOperatorForm'])->name('buat_data_pegawai_operator');
// Route::get('/data_pegawai_operator', [DataPegawaiOperatorController::class, 'showDataPegawaiOperatorForm'])->name('data_pegawai_operator');
Route::get('edit_data_pegawai_operator/{id}', [DataPegawaiOperatorController::class, 'edit'])->name('edit_data_pegawai_operator');
Route::post('/simpan_operator', [DataPegawaiOperatorController::class, 'store'])->name('simpan_operator');
Route::get('/data_pegawai_operator', [DataPegawaiOperatorController::class, 'index'])->name('data_pegawai_operator');
Route::get('/buat_data_pegawai_operator', [DataPegawaiOperatorController::class, 'create'])->name('buat_data_pegawai_operator');
Route::get('/rekap_kehadiran_operator', [RekapKehadiranOperatorController::class, 'showRekapKehadiranOperatorForm'])->name('rekap_kehadiran_operator');
Route::get('/table_cuti_operator', [TableCutiOperatorController::class, 'showTableCutiOperatorForm'])->name('table_cuti_operator');
Route::get('/tabel_rekap_kehadiran_operator', [TableRekapKehadiranOperatorController::class, 'showTableRekapKehadiranOperatorForm'])->name('tabel_rekap_kehadiran_operator');
Route::get('/profil_operator', [ProfilOperatorController::class, 'showProfilOperatorForm'])->name('profil_operator');
Route::get('/edit_profil_operator', [EditProfilOperatorController::class, 'showEditProfilOperatorForm'])->name('edit_profil_operator');
Route::get('/info_data_pegawai_operator', [InfoDataPegawaiOperatorController::class, 'index'])->name('info_data_pegawai_operator');
Route::get('/bukti_kehadiran_operator', [BuktiKehadiranController::class, 'showBuktiKehadiranForm'])->name('bukti_kehadiran_operator');
Route::get('/validasi_cuti_izin', [ValidasiCutiController::class, 'showValidasiCutiForm'])->name('validasi_cuti_izin');
Route::get('/detail_pengajuan', [DetailPengajuanController::class, 'showDetailPengajuanForm'])->name('detail_pengajuan');
//operator


//user
Route::get('/dashboard_user', function () {
    return view('dashboard_user');
});
Route::get('/data_diri_user', function () {
    return view('data_diri_user');
});
Route::get('/formulir_pengajuan', function () {
    return view('formulir_pengajuan');
});
Route::get('/notifikasi', function () {
    return view('notifikasi');
});
Route::get('/profil_user', function () {
    return view('profil_user');
});
Route::get('/rekap_absen_user', function () {
    return view('rekap_absen_user');
});
Route::get('/absen_user', function () {
    return view('absen_user');
});
// Route::get('/dashboard_user', [DashboardUserController::class, 'showDashboardUserForm'])->name('dashboard_user');
Route::get('/edit_data_user', [EditUserController::class, 'showEditUserForm'])->name('edit_data_user');
Route::get('/data_diri_user', [DataDiriUserController::class, 'showDataDiriUserForm'])->name('data_diri_user');
Route::get('/formulir_pengajuan', [FormulirPengajuanController::class, 'showFormulirPengajuanForm'])->name('formulir_pengajuan');
Route::get('/notifikasi', [NotifikasiController::class, 'showNotifikasiForm'])->name('notifikasi');
Route::get('/profil_user', [ProfilUserController::class, 'showProfilUserForm'])->name('profil_user');
Route::get('/rekap_absen_user', [RekapAbsenUserController::class, 'showRekapAbsenUserForm'])->name('rekap_absen_user');
Route::get('/absen_user', [AbsenUserController::class, 'showAbsenUserForm'])->name('absen_user');
Route::get('/absen_gps', [AbsenGpsController::class, 'showAbsenGpsForm'])->name('absen_gps');

use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Route untuk menyimpan data registrasi
Route::post('/simpanregistrasi', [AuthenticatedSessionController::class, 'simpanregistrasi'])->name('simpanregistrasi');

Route::get('/buat_akun', [AuthenticatedSessionController::class, 'registrasi'])->name('buat_akun');  // Halaman login // Halaman login
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');  // Halaman login
Route::post('/login', [AuthenticatedSessionController::class, 'store']);  // Proses login
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
// });
Route::get('/dashboard_user', [UserController::class, 'index'])->name('dashboard_user');

    Route::middleware(['auth'])->group(function () {
        Route::get('/data-diri_user', [UserController::class, 'show'])->name('data_diri_user');
    });
// Route::group(['middleware' => ['auth', 'role:operator']], function () {
//     Route::get('/dashboard_operator', [OperatorController::class, 'index'])->name('dashboard_operator');
// });

// Route::get('/dashboard', [DashboardController::class, 'showDashboardForm'])->name('dashboard')->middleware('admin');
// Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
// Route::get('/dashboard_operator', [AdminController::class, 'index'])->name('dashboard_operator');
// Route::get('/dashboard_user', [AdminController::class, 'index'])->name('dashboard_user');

Route::put('update_data_pegawai/{id}', [DataPegawaiController::class, 'update'])->name('update_data_pegawai');
Route::get('delete_data_pegawai/{id}', [DataPegawaiController::class, 'destroy'])->name('delete_data_pegawai');
Route::get('info_data_pegawai/{id}', [DataPegawaiController::class, 'show'])->name('info_data_pegawai');
Route::get('search_pegawai', [DataPegawaiController::class, 'search'])->name('search_pegawai');
Route::get('search_pegawai_operator', [DataPegawaiOperatorController::class, 'search'])->name('search_pegawai_operator');
Route::put('update_data_operator/{id}', [DataPegawaiOperatorController::class, 'update'])->name('update_data_operator');
Route::get('info_datapeg_operator/{id}', [DataPegawaiOperatorController::class, 'show'])->name('info_datapeg_operator');


use App\Http\Controllers\PengajuanCutiController;

Route::post('/simpancuti', [PengajuanCutiController::class, 'simpanCuti'])->name('simpancuti');
// Route::get('/detail-pengajuan/{id}', [PengajuanCutiController::class, 'show'])->name('detail_pengajuan');
// Route::post('/terima-cuti/{id}', [PengajuanCutiController::class, 'approve'])->name('terima_cuti');
// Route::post('/tolak-cuti/{id}', [PengajuanCutiController::class, 'reject'])->name('tolak_cuti');


use App\Http\Controllers\SettingController;

Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
Route::post('/settings', [SettingController::class, 'store']);


Route::post('saveSettings', [SettingController::class, 'saveSettings'])->name('saveSettings');
use App\Http\Controllers\UserPegawaiController;

// Route::post('/data_diri_user', [PegawaiController::class, 'show'])->name('data_diri_user');
// Route::get('/data_diri_user', [UserPegawaiController::class, 'index'])->name('data_diri_user');
// Route::post('/simpan', [UserPegawaiController::class, 'store'])->name('simpan');
// Route::get('/update_diri_user', [UserPegawaiController::class, 'update'])->name('update_diri_user');
// Route::get('/buat-data-pegawai/{user_id}', [AuthenticatedSessionController::class, 'buatDataPegawai'])->name('buat_data_pegawai');
// Route::post('/simpan/{user_id}', [AuthenticatedSessionController::class, 'simpan'])->name('simpan');

use App\Http\Controllers\PegawaiController;


// Dashboard User
// Route::get('/dashboard_user', [DashboardUserController::class, 'showDashboardUserForm'])->name('dashboard_user');
// Route::group(['prefix' => 'user', 'middleware' => ['auth']], function () {
//     Route::get('pegawai/{id}', [PegawaiController::class, 'show'])->name('pegawai');
// });






use App\Http\Controllers\AbsensiController;
Route::middleware('auth')->group(function () {
Route::post('/simpan_absen', [AbsensiController::class, 'store'])->name('simpan_absen');
Route::get('/absen_user', [AbsensiController::class, 'showAbsensiForm'])->name('absen_user');

});

Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

Route::get('/validasi_cuti_izin', [ValidasiCutiController::class, 'index'])->name('validasi_cuti_izin');
Route::get('/validasi-cuti/{id}/{status}', [ValidasiCutiController::class, 'validasi'])->name('validasi_cuti_action');
Route::post('/validasi-cuti/{id}/{status}', [ValidasiCutiController::class, 'validasi'])->name('validasi_cuti_action');
Route::get('detail_pengajuan/{id}', [ValidasiCutiController::class, 'detail'])->name('detail_pengajuan');
Route::get('/notifikasi', [PengajuanCutiController::class, 'notifikasi'])->name('notifikasi');
Route::get('/table_cuti_operator', [PengajuanCutiController::class, 'rekapitulasi'])->name('table_cuti_operator');


Route::get('/data_pegawai_admin', [DataPegawaiController::class, 'index'])->name('data_pegawai_admin');

// Menampilkan form untuk membuat data pegawai baru
Route::get('/buat_data_pegawai', [DataPegawaiController::class, 'create'])->name('buat_data_pegawai');

// Menyimpan data pegawai baru
Route::post('/simpan', [DataPegawaiController::class, 'store'])->name('simpan');

// Menampilkan detail pegawai
Route::get('/datapegawai/{id}', [DataPegawaiController::class, 'show'])->name('info_data_pegawai');

// Menampilkan form untuk mengedit data pegawai
Route::get('/data-pegawai/{id}/edit', [DataPegawaiController::class, 'edit'])->name('edit_data_pegawai');

// Mengupdate data pegawai
Route::put('/data-pegawai/{id}', [DataPegawaiController::class, 'update'])->name('update_data_pegawai');

// Menghapus data pegawai
Route::delete('/data-pegawai/{id}', [DataPegawaiController::class, 'destroy'])->name('hapus_data_pegawai');

// Mencari data pegawai
Route::get('/data-pegawai/search', [DataPegawaiController::class, 'search'])->name('search_data_pegawai');

use App\Http\Controllers\BuktiAbsenController;

// Route untuk menampilkan data absensi
Route::get('/bukti_kehadiran_operator', [BuktiAbsenController::class, 'index'])->name('bukti_kehadiran_operator');
use App\Http\Controllers\PreferenceController;
Route::get('/report', [PreferenceController::class, 'index'])->name('report');
Route::post('/update_report', [PreferenceController::class, 'update'])->name('update_report');
Route::get('/rekap_kehadiran_operator', [AbsensiController::class, 'rekapAbsen'])->name('rekap_kehadiran_operator')->defaults('bulan', date('m'))->defaults('tahun', date('Y'));
Route::get('tabel_rekap_kehadiran_operator/{bulan}/{tahun}', [AbsensiController::class, 'rekapAbsen'])->name('tabel_rekap_kehadiran_operator');
Route::get('/rekap_kehadiran', [DataPegawaiController::class, 'rekapAbsen'])->name('rekap_kehadiran');
Route::get('table_rekap_kehadiran/{bulan}/{tahun}', [DataPegawaiController::class, 'rekapAbsen'])->name('table_rekap_kehadiran');
Route::get('/table_cuti_admin', [DataPegawaiController::class, 'rekapitulasi'])->name('table_cuti_admin');
