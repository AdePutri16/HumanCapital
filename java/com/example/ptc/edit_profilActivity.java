package com.example.ptc;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Toast;
import androidx.appcompat.app.AppCompatActivity;

public class edit_profilActivity extends AppCompatActivity {

    private ImageView ivBackButton;
    private EditText statusPernikahanInput, nikInput, noTelpInput, alamatInput;
    private Button buttonSimpan;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_edit_profil); // Sesuaikan nama layout XML jika berbeda

        // Inisialisasi elemen-elemen UI
        ivBackButton = findViewById(R.id.ivBackButton);
        statusPernikahanInput = findViewById(R.id.statusPernikahanInput);
        nikInput = findViewById(R.id.nikInput);
        noTelpInput = findViewById(R.id.noTelpInput);
        alamatInput = findViewById(R.id.alamatInput);
        buttonSimpan = findViewById(R.id.buttonSimpan);

        // Tombol kembali
        ivBackButton.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Kembali ke aktivitas sebelumnya
                finish();
            }
        });

        // Tombol simpan
        buttonSimpan.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Ambil data dari input
                String statusPernikahan = statusPernikahanInput.getText().toString().trim();
                String nik = nikInput.getText().toString().trim();
                String noTelp = noTelpInput.getText().toString().trim();
                String alamat = alamatInput.getText().toString().trim();

                // Validasi input
                if (statusPernikahan.isEmpty() || nik.isEmpty() || noTelp.isEmpty() || alamat.isEmpty()) {
                    Toast.makeText(edit_profilActivity.this, "Harap lengkapi semua data!", Toast.LENGTH_SHORT).show();
                } else {
                    // Simpan data (contoh: tampilkan Toast untuk simulasi)
                    Toast.makeText(edit_profilActivity.this, "Data berhasil disimpan!", Toast.LENGTH_SHORT).show();

                    // Kembali ke halaman sebelumnya (opsional)
                    finish();
                }
            }
        });
    }
}
