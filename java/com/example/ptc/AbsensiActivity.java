package com.example.ptc;

import android.Manifest;
import android.annotation.SuppressLint;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.graphics.Bitmap;
import android.os.Bundle;
import android.provider.MediaStore;
import android.util.Log;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.Switch;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.core.app.ActivityCompat;
import androidx.core.content.ContextCompat;

import com.google.android.gms.location.FusedLocationProviderClient;
import com.google.android.gms.location.LocationServices;
import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.HashMap;
import java.util.List;

import android.location.Address;
import android.location.Geocoder;

public class AbsensiActivity extends AppCompatActivity {

    // Kode permission
    private static final int CAMERA_REQUEST_CODE = 100;
    private static final int LOCATION_PERMISSION_CODE = 200;

    // UI Components
    private ImageView selfieImageView;
    private Button buttonCamera, buttonSubmit;
    private TextView lokasiLabel, jamLabel;
    private Switch switchMasuk, switchPulang;

    // Variabel data
    private Bitmap capturedPhoto;
    private FusedLocationProviderClient fusedLocationClient;
    private String currentLocation = "";

    private DatabaseReference absensiRef;

    @SuppressLint("MissingInflatedId")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_absensi);

        // Inisialisasi UI
        selfieImageView = findViewById(R.id.selfie_image_view);
        buttonCamera = findViewById(R.id.button_camera);
        buttonSubmit = findViewById(R.id.kirim_absensi);
        lokasiLabel = findViewById(R.id.lokasi_label);
        switchMasuk = findViewById(R.id.switch_masuk);
        switchPulang = findViewById(R.id.switch_pulang);
        jamLabel = findViewById(R.id.jam_label);

        // Inisialisasi Firebase Database
        absensiRef = FirebaseDatabase.getInstance().getReference("Absensi");

        // Lokasi dan Waktu
        fusedLocationClient = LocationServices.getFusedLocationProviderClient(this);
        updateLocation();
        updateTime();

        // Listener Kamera
        buttonCamera.setOnClickListener(v -> checkCameraPermission());

        // Listener Submit Absensi
        buttonSubmit.setOnClickListener(v -> submitAbsensi());

        // Tombol Kembali
        ImageView ivBack = findViewById(R.id.ivBack);
        ivBack.setOnClickListener(v -> finish());
    }

    private void submitAbsensi() {
        if (capturedPhoto != null) {
            if (switchMasuk.isChecked() || switchPulang.isChecked()) {
                String jenisAbsensi = switchMasuk.isChecked() ? "masuk" : "pulang";

                // Format Tanggal dan Waktu
                SimpleDateFormat sdfDate = new SimpleDateFormat("dd MMM yyyy");
                SimpleDateFormat sdfTime = new SimpleDateFormat("HH:mm");
                String tanggal = sdfDate.format(new Date());
                String waktu = sdfTime.format(new Date());

                HashMap<String, Object> dataAbsensi = new HashMap<>();
                dataAbsensi.put("lokasi", currentLocation);
                dataAbsensi.put("tanggal", tanggal);

                // Simpan Absensi
                absensiRef.child(tanggal).addListenerForSingleValueEvent(new ValueEventListener() {
                    @Override
                    public void onDataChange(@NonNull DataSnapshot snapshot) {
                        if (jenisAbsensi.equals("masuk") && !snapshot.hasChild("masuk")) {
                            dataAbsensi.put("masuk", waktu);
                        } else if (jenisAbsensi.equals("pulang") && !snapshot.hasChild("pulang")) {
                            dataAbsensi.put("pulang", waktu);
                        } else {
                            Toast.makeText(AbsensiActivity.this, "Absensi " + jenisAbsensi + " sudah tercatat!", Toast.LENGTH_SHORT).show();
                            return;
                        }

                        absensiRef.child(tanggal).updateChildren(dataAbsensi)
                                .addOnSuccessListener(aVoid -> Toast.makeText(AbsensiActivity.this, "Absensi berhasil disimpan!", Toast.LENGTH_SHORT).show())
                                .addOnFailureListener(e -> {
                                    Toast.makeText(AbsensiActivity.this, "Gagal menyimpan data absensi: " + e.getMessage(), Toast.LENGTH_SHORT).show();
                                    Log.e("Firebase", "Error: " + e.getMessage());
                                });
                    }

                    @Override
                    public void onCancelled(@NonNull DatabaseError error) {
                        Toast.makeText(AbsensiActivity.this, "Gagal mengakses database!", Toast.LENGTH_SHORT).show();
                        Log.e("Firebase", "Database Error: " + error.getMessage());
                    }
                });
            } else {
                Toast.makeText(this, "Pilih jenis absensi: Masuk atau Pulang.", Toast.LENGTH_SHORT).show();
            }
        } else {
            Toast.makeText(this, "Mohon ambil foto terlebih dahulu.", Toast.LENGTH_SHORT).show();
        }
    }

    private void checkCameraPermission() {
        if (ContextCompat.checkSelfPermission(this, Manifest.permission.CAMERA) != PackageManager.PERMISSION_GRANTED) {
            ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.CAMERA}, CAMERA_REQUEST_CODE);
        } else {
            openCamera();
        }
    }

    private void openCamera() {
        Intent cameraIntent = new Intent(MediaStore.ACTION_IMAGE_CAPTURE);
        if (cameraIntent.resolveActivity(getPackageManager()) != null) {
            startActivityForResult(cameraIntent, CAMERA_REQUEST_CODE);
        } else {
            Toast.makeText(this, "Kamera tidak tersedia", Toast.LENGTH_SHORT).show();
        }
    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        if (requestCode == CAMERA_REQUEST_CODE && resultCode == RESULT_OK && data != null && data.getExtras() != null) {
            capturedPhoto = (Bitmap) data.getExtras().get("data");
            selfieImageView.setImageBitmap(capturedPhoto);
        } else {
            Toast.makeText(this, "Gagal mengambil foto", Toast.LENGTH_SHORT).show();
        }
    }

    private void updateLocation() {
        if (ContextCompat.checkSelfPermission(this, Manifest.permission.ACCESS_FINE_LOCATION) != PackageManager.PERMISSION_GRANTED) {
            ActivityCompat.requestPermissions(this, new String[]{Manifest.permission.ACCESS_FINE_LOCATION}, LOCATION_PERMISSION_CODE);
        } else {
            fusedLocationClient.getLastLocation().addOnSuccessListener(location -> {
                if (location != null) {
                    double latitude = location.getLatitude();
                    double longitude = location.getLongitude();

                    Geocoder geocoder = new Geocoder(this);
                    try {
                        List<Address> addresses = geocoder.getFromLocation(latitude, longitude, 1);
                        if (!addresses.isEmpty()) {
                            currentLocation = addresses.get(0).getAddressLine(0);
                        } else {
                            currentLocation = "Lokasi tidak ditemukan";
                        }
                    } catch (Exception e) {
                        currentLocation = "Gagal mendapatkan lokasi";
                    }

                    lokasiLabel.setText(currentLocation);
                } else {
                    lokasiLabel.setText("Tidak dapat menentukan lokasi. Aktifkan GPS.");
                }
            }).addOnFailureListener(e -> lokasiLabel.setText("Gagal mendapatkan lokasi: " + e.getMessage()));
        }
    }

    private void updateTime() {
        SimpleDateFormat sdf = new SimpleDateFormat("HH:mm");
        String currentTime = sdf.format(new Date());
        jamLabel.setText(currentTime);
        jamLabel.postDelayed(this::updateTime, 60000);
    }
}
