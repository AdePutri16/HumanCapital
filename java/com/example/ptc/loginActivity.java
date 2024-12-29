package com.example.ptc;

import android.content.Intent;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

import java.util.HashMap;
import java.util.Map;

public class loginActivity extends AppCompatActivity {

    private DatabaseReference databaseReference;

    // Akun hardcoded
    private final String[][] validAccounts = {
            {"Nirwana", "Akwal27"},   // Akun 1
            {"Adhe", "Adhe1234"},    // Akun 2
            {"Fliza", "Fliza1234"}   // Akun 3
    };

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);

        EditText inputUsername = findViewById(R.id.username);
        EditText inputPassword = findViewById(R.id.password);
        Button btnLogin = findViewById(R.id.btn_login);

        // Referensi Firebase Realtime Database
        databaseReference = FirebaseDatabase.getInstance().getReference("users");

        btnLogin.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String username = inputUsername.getText().toString().trim();
                String password = inputPassword.getText().toString().trim();

                if (username.isEmpty() || password.isEmpty()) {
                    Toast.makeText(loginActivity.this, "Username dan Password harus diisi!", Toast.LENGTH_SHORT).show();
                    return;
                }

                // Cek di akun hardcoded terlebih dahulu
                if (checkHardcodedAccounts(username, password)) {
                    // Simpan akun ke Firebase jika berasal dari hardcoded
                    saveHardcodedAccountToFirebase(username, password);
                    loginSuccess();
                } else {
                    // Jika tidak ada di hardcoded, cek ke Firebase
                    databaseReference.child(username).addListenerForSingleValueEvent(new ValueEventListener() {
                        @Override
                        public void onDataChange(@NonNull DataSnapshot snapshot) {
                            if (snapshot.exists()) {
                                // Username ditemukan di Firebase
                                String correctPassword = snapshot.child("password").getValue(String.class);
                                if (correctPassword != null && correctPassword.equals(password)) {
                                    loginSuccess();
                                } else {
                                    // Password salah
                                    Toast.makeText(loginActivity.this, "Password salah!", Toast.LENGTH_SHORT).show();
                                }
                            } else {
                                // Username tidak ditemukan
                                Toast.makeText(loginActivity.this, "Username tidak ditemukan!", Toast.LENGTH_SHORT).show();
                            }
                        }

                        @Override
                        public void onCancelled(@NonNull DatabaseError error) {
                            Toast.makeText(loginActivity.this, "Terjadi kesalahan: " + error.getMessage(), Toast.LENGTH_SHORT).show();
                        }
                    });
                }
            }
        });
    }

    // Method untuk memeriksa akun hardcoded
    private boolean checkHardcodedAccounts(String username, String password) {
        for (String[] account : validAccounts) {
            if (account[0].equals(username) && account[1].equals(password)) {
                return true; // Akun ditemukan
            }
        }
        return false; // Akun tidak ditemukan
    }

    // Method untuk menyimpan akun hardcoded ke Firebase
    private void saveHardcodedAccountToFirebase(String username, String password) {
        databaseReference.child(username).addListenerForSingleValueEvent(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot snapshot) {
                if (!snapshot.exists()) {
                    // Jika akun belum ada di Firebase, simpan akun
                    Map<String, Object> userData = new HashMap<>();
                    userData.put("username", username);
                    userData.put("password", password);

                    databaseReference.child(username).setValue(userData)
                            .addOnSuccessListener(aVoid -> Toast.makeText(loginActivity.this, "Akun disimpan ke database", Toast.LENGTH_SHORT).show())
                            .addOnFailureListener(e -> Toast.makeText(loginActivity.this, "Gagal menyimpan akun: " + e.getMessage(), Toast.LENGTH_SHORT).show());
                }
            }

            @Override
            public void onCancelled(@NonNull DatabaseError error) {
                Toast.makeText(loginActivity.this, "Error: " + error.getMessage(), Toast.LENGTH_SHORT).show();
            }
        });
    }

    // Method untuk sukses login
    private void loginSuccess() {
        Toast.makeText(loginActivity.this, "Login berhasil!", Toast.LENGTH_SHORT).show();
        Intent intent = new Intent(loginActivity.this, DashboardActivity.class);
        startActivity(intent);
        finish();
    }
}
