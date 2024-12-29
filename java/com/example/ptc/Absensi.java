package com.example.ptc;

public class Absensi {
    private String userId;
    private String tanggal;
    private String waktu;
    private String jenisAbsensi;
    private String lokasi;

    public Absensi() {}

    public Absensi(String userId, String tanggal, String waktu, String jenisAbsensi, String lokasi) {
        this.userId = userId;
        this.tanggal = tanggal;
        this.waktu = waktu;
        this.jenisAbsensi = jenisAbsensi;
        this.lokasi = lokasi;
    }

    public String getUserId() {
        return userId;
    }

    public void setUserId(String userId) {
        this.userId = userId;
    }

    public String getTanggal() {
        return tanggal;
    }

    public void setTanggal(String tanggal) {
        this.tanggal = tanggal;
    }

    public String getWaktu() {
        return waktu;
    }

    public void setWaktu(String waktu) {
        this.waktu = waktu;
    }

    public String getJenisAbsensi() {
        return jenisAbsensi;
    }

    public void setJenisAbsensi(String jenisAbsensi) {
        this.jenisAbsensi = jenisAbsensi;
    }

    public String getLokasi() {
        return lokasi;
    }

    public void setLokasi(String lokasi) {
        this.lokasi = lokasi;
    }
}
