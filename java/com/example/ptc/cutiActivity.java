package com.example.ptc;

import android.app.DatePickerDialog;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.DatePicker;
import android.widget.EditText;
import android.widget.ImageView;
import android.widget.Spinner;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;

import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Locale;

public class cutiActivity extends AppCompatActivity {

    private EditText namaLengkap, jabatan, nip, mulaiCuti, selesaiCuti, alamatCuti;
    private Spinner spinnerJenisPengajuan;
    private Button buttonPengajuanCuti;
    private DatabaseReference databaseReference;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_cuti);

        // Inisialisasi elemen
        namaLengkap = findViewById(R.id.nama_lengkap);
        jabatan = findViewById(R.id.jabatan);
        nip = findViewById(R.id.nip);
        mulaiCuti = findViewById(R.id.mulai_cuti);
        selesaiCuti = findViewById(R.id.selesai_cuti);
        alamatCuti = findViewById(R.id.alamat_cuti);
        spinnerJenisPengajuan = findViewById(R.id.spinner_jenis_pengajuan);
        buttonPengajuanCuti = findViewById(R.id.button_pengajuan_cuti);

        // Firebase
        databaseReference = FirebaseDatabase.getInstance().getReference("cuti");

        // Spinner
        ArrayAdapter<CharSequence> adapter = ArrayAdapter.createFromResource(this,
                R.array.jenis_pengajuan_array, android.R.layout.simple_spinner_item);
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        spinnerJenisPengajuan.setAdapter(adapter);

        // Date Picker
        mulaiCuti.setOnClickListener(v -> showDatePickerDialog(mulaiCuti));
        selesaiCuti.setOnClickListener(v -> showDatePickerDialog(selesaiCuti));

        // Tombol Ajukan Cuti
        buttonPengajuanCuti.setOnClickListener(v -> ajukanCuti());

        // Tombol Kembali
        ImageView ivBack = findViewById(R.id.ivBack);
        ivBack.setOnClickListener(v -> finish());
    }

    // Fungsi untuk memformat tanggal
    private String formatDateWithDay(int year, int month, int dayOfMonth) {
        try {
            // Buat objek Calendar dari input
            Calendar calendar = Calendar.getInstance();
            calendar.set(year, month, dayOfMonth);

            // Format tanggal menjadi "EEEE, dd MMM yyyy" (Senin, 22 Sep 2024)
            SimpleDateFormat dateFormat = new SimpleDateFormat("EEEE, dd MMM yyyy", new Locale("id", "ID"));
            return dateFormat.format(calendar.getTime());
        } catch (Exception e) {
            e.printStackTrace();
            return "";
        }
    }

    // Fungsi untuk menampilkan DatePicker dan set ke EditText
    private void showDatePickerDialog(final EditText editText) {
        Calendar calendar = Calendar.getInstance();
        int year = calendar.get(Calendar.YEAR);
        int month = calendar.get(Calendar.MONTH);
        int day = calendar.get(Calendar.DAY_OF_MONTH);

        DatePickerDialog datePickerDialog = new DatePickerDialog(this, (view, year1, month1, dayOfMonth) -> {
            // Format tanggal yang dipilih
            String formattedDate = formatDateWithDay(year1, month1, dayOfMonth);
            editText.setText(formattedDate); // Set hasil ke EditText
        }, year, month, day);
        datePickerDialog.show();
    }

    // Fungsi untuk menyimpan data cuti ke Firebase dan notifikasi
    private void ajukanCuti() {
        String nama = namaLengkap.getText().toString().trim();
        String jabatanText = jabatan.getText().toString().trim();
        String nipText = nip.getText().toString().trim();
        String jenisPengajuan = spinnerJenisPengajuan.getSelectedItem().toString();
        String mulai = mulaiCuti.getText().toString().trim();
        String selesai = selesaiCuti.getText().toString().trim();
        String alamat = alamatCuti.getText().toString().trim();

        if (nama.isEmpty() || jabatanText.isEmpty() || nipText.isEmpty() || mulai.isEmpty() || selesai.isEmpty() || alamat.isEmpty()) {
            Toast.makeText(this, "Harap lengkapi semua data.", Toast.LENGTH_SHORT).show();
        } else {
            String id = databaseReference.push().getKey();
            if (id == null) {
                Toast.makeText(this, "Gagal membuat ID untuk pengajuan cuti.", Toast.LENGTH_SHORT).show();
                return;
            }

            // Simpan data cuti
            Cuti cuti = new Cuti(nama, jabatanText, nipText, jenisPengajuan, mulai, selesai, alamat);

            // Menyimpan data ke node 'cuti'
            databaseReference.child(id).setValue(cuti)
                    .addOnSuccessListener(aVoid -> {
                        Toast.makeText(this, "Pengajuan berhasil.", Toast.LENGTH_SHORT).show();

                        // Simpan data notifikasi
                        saveNotification(jenisPengajuan, mulai);
                    })
                    .addOnFailureListener(e -> Toast.makeText(this, "Gagal: " + e.getMessage(), Toast.LENGTH_SHORT).show());
        }
    }

    // Fungsi untuk menyimpan data notifikasi ke Firebase
    private void saveNotification(String jenisPengajuan, String mulaiCuti) {
        DatabaseReference notifRef = FirebaseDatabase.getInstance().getReference("notifikasi");
        String notifId = notifRef.push().getKey();

        if (notifId == null) {
            Toast.makeText(this, "Gagal menyimpan notifikasi.", Toast.LENGTH_SHORT).show();
            return;
        }

        // Buat objek notifikasi dengan tanggal terformat
        Notifikasi notifikasi = new Notifikasi(jenisPengajuan, mulaiCuti, "Menunggu Persetujuan");

        // Simpan ke node 'notifikasi'
        notifRef.child(notifId).setValue(notifikasi)
                .addOnSuccessListener(aVoid -> Log.d("Notifikasi", "Notifikasi berhasil disimpan."))
                .addOnFailureListener(e -> Log.e("FirebaseError", "Gagal menyimpan notifikasi: " + e.getMessage()));
    }
}
