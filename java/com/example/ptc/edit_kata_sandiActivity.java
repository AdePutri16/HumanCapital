package com.example.ptc;

import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import com.google.firebase.auth.FirebaseAuth;
import com.google.firebase.auth.FirebaseUser;

public class edit_kata_sandiActivity extends AppCompatActivity {

    private EditText oldPasswordEditText;
    private EditText newPasswordEditText;
    private EditText confirmPasswordEditText;
    private Button saveButton;
    private ImageView backButton;

    private FirebaseAuth auth;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_edit_kata_sandi);

        // Inisialisasi elemen UI
        oldPasswordEditText = findViewById(R.id.old_password);
        newPasswordEditText = findViewById(R.id.new_password);
        confirmPasswordEditText = findViewById(R.id.confirm_password);
        saveButton = findViewById(R.id.buttonSimpan);
        backButton = findViewById(R.id.ivBackButton);

        // Inisialisasi Firebase Authentication
        auth = FirebaseAuth.getInstance();

        // Tombol kembali
        backButton.setOnClickListener(v -> onBackPressed());

        // Tombol simpan
        saveButton.setOnClickListener(v -> updatePassword());
    }

    private void updatePassword() {
        // Ambil input dari pengguna
        String oldPassword = oldPasswordEditText.getText().toString().trim();
        String newPassword = newPasswordEditText.getText().toString().trim();
        String confirmPassword = confirmPasswordEditText.getText().toString().trim();

        // Validasi input
        if (oldPassword.isEmpty()) {
            oldPasswordEditText.setError("Password lama tidak boleh kosong");
            return;
        }
        if (newPassword.isEmpty()) {
            newPasswordEditText.setError("Password baru tidak boleh kosong");
            return;
        }
        if (newPassword.length() < 6) {
            newPasswordEditText.setError("Password harus minimal 6 karakter");
            return;
        }
        if (!newPassword.equals(confirmPassword)) {
            confirmPasswordEditText.setError("Password tidak cocok");
            return;
        }

        // Update password di Firebase
        FirebaseUser user = auth.getCurrentUser();
        if (user != null) {
            user.updatePassword(newPassword)
                    .addOnCompleteListener(task -> {
                        if (task.isSuccessful()) {
                            Toast.makeText(edit_kata_sandiActivity.this, "Kata sandi berhasil diperbarui", Toast.LENGTH_SHORT).show();
                        } else {
                            Toast.makeText(edit_kata_sandiActivity.this, "Gagal memperbarui kata sandi: " + task.getException().getMessage(), Toast.LENGTH_LONG).show();
                        }
                    });
        } else {
            Toast.makeText(this, "Tidak ada pengguna yang login", Toast.LENGTH_SHORT).show();
        }
    }
}
