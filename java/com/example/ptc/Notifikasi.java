package com.example.ptc;

public class Notifikasi {
    private String jenisPengajuan;
    private String mulaiCuti;
    private String status;

    // Konstruktor kosong (diperlukan untuk Firebase)
    public Notifikasi() {}

    // Konstruktor dengan parameter
    public Notifikasi(String jenisPengajuan, String mulaiCuti, String status) {
        this.jenisPengajuan = jenisPengajuan;
        this.mulaiCuti = mulaiCuti;
        this.status = status;
    }

    // Getter dan Setter
    public String getJenisPengajuan() {
        return jenisPengajuan;
    }

    public void setJenisPengajuan(String jenisPengajuan) {
        this.jenisPengajuan = jenisPengajuan;
    }

    public String getMulaiCuti() {
        return mulaiCuti;
    }

    public void setMulaiCuti(String mulaiCuti) {
        this.mulaiCuti = mulaiCuti;
    }

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }
}
