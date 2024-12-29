package com.example.ptc;

public class Cuti {
    private String nama;
    private String jabatan;
    private String nip;
    private String jenisPengajuan;
    private String mulai;
    private String selesai;
    private String alamat;

    // Constructor tanpa argumen untuk Firebase
    public Cuti() {}

    // Constructor dengan parameter
    public Cuti(String nama, String jabatan, String nip, String jenisPengajuan, String mulai, String selesai, String alamat) {
        this.nama = nama;
        this.jabatan = jabatan;
        this.nip = nip;
        this.jenisPengajuan = jenisPengajuan;
        this.mulai = mulai;
        this.selesai = selesai;
        this.alamat = alamat;
    }

    // Getter methods
    public String getNama() { return nama; }
    public String getJabatan() { return jabatan; }
    public String getNip() { return nip; }
    public String getJenisPengajuan() { return jenisPengajuan; }
    public String getMulai() { return mulai; }
    public String getSelesai() { return selesai; }
    public String getAlamat() { return alamat; }
}
