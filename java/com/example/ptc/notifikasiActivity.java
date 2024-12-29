package com.example.ptc;

import android.annotation.SuppressLint;
import android.os.Bundle;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.widget.ImageView;
import android.widget.LinearLayout;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

public class notifikasiActivity extends AppCompatActivity {

    // Referensi ke Firebase Database
    private DatabaseReference databaseReference;

    // Kontainer untuk menampilkan notifikasi
    private LinearLayout notificationContainer;

    @SuppressLint("MissingInflatedId")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_notifikasi);

        // Inisialisasi LinearLayout container
        notificationContainer = findViewById(R.id.notificationContainer);

        // Inisialisasi Firebase Database
        databaseReference = FirebaseDatabase.getInstance().getReference("notifikasi");

        // Mengambil data dari Firebase secara dinamis
        databaseReference.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot dataSnapshot) {
                // Bersihkan kontainer setiap kali ada pembaruan
                notificationContainer.removeAllViews();

                // Jika data ada di Firebase
                if (dataSnapshot.exists()) {
                    for (DataSnapshot childSnapshot : dataSnapshot.getChildren()) {
                        // Ambil data dari child
                        String jenisPengajuan = childSnapshot.child("jenisPengajuan").getValue(String.class);
                        String mulaiCuti = childSnapshot.child("mulaiCuti").getValue(String.class);
                        String status = childSnapshot.child("status").getValue(String.class);

                        // Menambahkan notifikasi baru ke layout
                        addNotificationItem(jenisPengajuan, mulaiCuti, status);
                    }
                }
            }

            @Override
            public void onCancelled(@NonNull DatabaseError databaseError) {
                Log.e("FirebaseError", databaseError.getMessage());
            }
        });

        // Tombol kembali
        ImageView ivBack = findViewById(R.id.ivBack);
        ivBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Kembali ke halaman sebelumnya
                onBackPressed(); // Memanggil method onBackPressed() untuk kembali ke activity sebelumnya
            }
        });
    }

    // Fungsi untuk menambahkan item notifikasi baru ke LinearLayout
    private void addNotificationItem(String jenisPengajuan, String mulaiCuti, String status) {
        // Inflasi layout item notifikasi menggunakan LayoutInflater
        LayoutInflater inflater = LayoutInflater.from(this);
        View notificationView = inflater.inflate(R.layout.notification_item, notificationContainer, false);

        // Bind data ke elemen di layout yang sudah di-inflate
        TextView tvDateRange = notificationView.findViewById(R.id.tvDateRange1);
        TextView tvApprovalStatus = notificationView.findViewById(R.id.tvApprovalStatus1);
        TextView tvStatus = notificationView.findViewById(R.id.tvStatus1);

        // Set data dari Firebase ke TextView
        tvDateRange.setText(jenisPengajuan != null ? jenisPengajuan : "Tidak Diketahui");
        tvApprovalStatus.setText(status != null ? status : "Tidak Diketahui");
        tvStatus.setText("Tanggal Pengajuan: " + (mulaiCuti != null ? mulaiCuti : "Tidak Diketahui"));

        // Menambahkan notifikasi ke container
        notificationContainer.addView(notificationView);
    }
}
