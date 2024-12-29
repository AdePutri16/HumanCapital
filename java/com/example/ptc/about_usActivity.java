package com.example.ptc;

import android.os.Bundle;
import androidx.appcompat.app.AppCompatActivity;
import android.widget.TextView;
import android.widget.ImageView;
import androidx.constraintlayout.widget.ConstraintLayout;

public class about_usActivity extends AppCompatActivity {

    // Declare Views
    private TextView headerText, tvIntroduction, tvPoint1, tvDetailsPoint1, tvPoint2, tvDetailsPoint2, tvPoint3, tvDetailsPoint3;
    private TextView tvPoint4, tvDetailsPoint4, tvVersion;
    private ImageView ivBack;
    private ConstraintLayout headerSection;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_about_us);

        // Initialize Views
        headerText = findViewById(R.id.headerText);
        tvIntroduction = findViewById(R.id.tvIntroduction);
        tvPoint1 = findViewById(R.id.tvPoint1);
        tvDetailsPoint1 = findViewById(R.id.tvDetailsPoint1);
        tvPoint2 = findViewById(R.id.tvPoint2);
        tvDetailsPoint2 = findViewById(R.id.tvDetailsPoint2);
        tvPoint3 = findViewById(R.id.tvPoint3);
        tvDetailsPoint3 = findViewById(R.id.tvDetailsPoint3);
        tvPoint4 = findViewById(R.id.tvPoint4);
        tvDetailsPoint4 = findViewById(R.id.tvDetailsPoint4);
        tvVersion = findViewById(R.id.tvVersion);
        ivBack = findViewById(R.id.ivBack);
        headerSection = findViewById(R.id.headerSection);

        // Set title text
        headerText.setText("Tentang Kami");

        // Set introduction text
        tvIntroduction.setText("Kami adalah platform manajemen kepegawaian yang bertujuan untuk memberikan solusi efisien dalam pengelolaan data kehadiran dan informasi pegawai. Dengan teknologi canggih, kami membantu organisasi untuk meningkatkan produktivitas, mengurangi kesalahan administratif, dan memberikan pengalaman terbaik bagi penggunanya.");

        // Set point 1 details
        tvPoint1.setText("1. Pendataan Pegawai:");
        tvDetailsPoint1.setText("- Meliputi informasi dasar seperti nama, jabatan, dan unit kerja.\n- Mempermudah proses rekapitulasi data pegawai.");

        // Set point 2 details
        tvPoint2.setText("2. Sistem Kehadiran:");
        tvDetailsPoint2.setText("- Monitoring kehadiran pegawai secara real-time.\n- Menerapkan teknologi verifikasi seperti foto selfie dan lokasi GPS.");

        // Set point 3 details
        tvPoint3.setText("3. Rekapitulasi Data:");
        tvDetailsPoint3.setText("- Memberikan laporan kehadiran secara bulanan.\n- Memudahkan proses evaluasi kinerja pegawai.");

        // Set point 4 details
        tvPoint4.setText("4. Analisis Kinerja:");
        tvDetailsPoint4.setText("- Menyediakan data untuk analisis kinerja pegawai.\n- Memudahkan perencanaan pengembangan karir pegawai.");

        // Set version
        tvVersion.setText("Versi Aplikasi: 1.0.0");

        // Set up back button functionality
        ivBack.setOnClickListener(v -> {
            // Handle back button click (for example, finish activity or go back to previous screen)
            finish(); // Close the activity
        });
    }
}
