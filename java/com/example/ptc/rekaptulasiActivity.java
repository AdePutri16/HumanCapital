package com.example.ptc;

import android.annotation.SuppressLint;
import android.graphics.Typeface;
import android.os.Bundle;
import android.util.Log;
import android.view.Gravity;
import android.view.View;
import android.widget.ImageView;
import android.widget.Spinner;
import android.widget.TableLayout;
import android.widget.TableRow;
import android.widget.TextView;
import android.widget.Toast;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;

import com.google.firebase.database.DataSnapshot;
import com.google.firebase.database.DatabaseError;
import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;
import com.google.firebase.database.ValueEventListener;

import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Calendar;
import java.util.Date;

public class rekaptulasiActivity extends AppCompatActivity {

    private TableLayout tableLayout;
    private DatabaseReference databaseReference;
    private ImageView ivBackButton;
    private Spinner bulanSpinner;
    private Spinner tahunSpinner;

    private int jumlahHadir = 0;  // Variabel untuk menghitung jumlah hadir
    private int jumlahTerlambat = 0;  // Variabel untuk menghitung jumlah terlambat
    private static final String TAG = "rekaptulasiActivity";

    @SuppressLint("MissingInflatedId")
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_rekaptulasi);

        // Inisialisasi elemen layout
        tableLayout = findViewById(R.id.tableLayout);
        ivBackButton = findViewById(R.id.backArrow);
        bulanSpinner = findViewById(R.id.spinnerBulan);
        tahunSpinner = findViewById(R.id.spinnerTahun);

        // Tombol kembali
        if (ivBackButton != null) {
            ivBackButton.setOnClickListener(new View.OnClickListener() {
                @Override
                public void onClick(View v) {
                    Log.d(TAG, "Tombol kembali ditekan.");
                    finish(); // Tutup activity dan kembali ke activity sebelumnya
                }
            });
        } else {
            Log.e(TAG, "Tombol kembali tidak ditemukan di layout!");
        }

        // Setel bulan dan tahun default di spinner
        setCurrentMonthAndYear();

        // Inisialisasi Firebase Database
        databaseReference = FirebaseDatabase.getInstance().getReference("Absensi");

        // Ambil data dari Firebase
        fetchDataFromDatabase();
    }

    // Method untuk mendapatkan posisi tahun di spinner
    private int getYearPosition(int year) {
        String[] years = getResources().getStringArray(R.array.array_tahun);
        for (int i = 0; i < years.length; i++) {
            if (Integer.parseInt(years[i]) == year) {
                return i; // Kembalikan posisi tahun yang sesuai
            }
        }
        return 0; // Default jika tidak ditemukan
    }

    // Set bulan dan tahun saat ini ke spinner
    private void setCurrentMonthAndYear() {
        Calendar calendar = Calendar.getInstance();
        int currentMonth = calendar.get(Calendar.MONTH); // 0-11 (0 = Januari)
        int currentYear = calendar.get(Calendar.YEAR); // Tahun saat ini

        // Setel bulan dan tahun default di spinner
        bulanSpinner.setSelection(currentMonth);
        tahunSpinner.setSelection(getYearPosition(currentYear));
    }

    private void fetchDataFromDatabase() {
        databaseReference.addValueEventListener(new ValueEventListener() {
            @Override
            public void onDataChange(@NonNull DataSnapshot snapshot) {
                if (snapshot.exists()) {
                    Log.d(TAG, "Data ditemukan di Firebase.");
                    tableLayout.removeAllViews(); // Reset tabel
                    setTableHeader(); // Tambah header tabel

                    // Reset jumlah hadir dan terlambat sebelum memulai perhitungan
                    jumlahHadir = 0;
                    jumlahTerlambat = 0;

                    // Loop melalui data
                    for (DataSnapshot dateSnapshot : snapshot.getChildren()) {
                        String tanggal = dateSnapshot.child("tanggal").getValue(String.class);
                        String masuk = dateSnapshot.child("masuk").getValue(String.class);
                        String pulang = dateSnapshot.child("pulang").getValue(String.class);

                        // Validasi data
                        if (tanggal == null) tanggal = "Tidak tersedia";
                        if (masuk == null) masuk = "Tidak tersedia";
                        if (pulang == null) pulang = "Tidak tersedia";

                        // Tentukan apakah terlambat atau hadir berdasarkan jam masuk
                        if (!masuk.equals("Tidak tersedia") && !masuk.isEmpty()) {
                            if (isTerlambat(masuk)) {
                                jumlahTerlambat++;  // Tambah jumlah terlambat
                            } else {
                                jumlahHadir++;  // Tambah jumlah hadir
                            }
                        }

                        addRowToTable(tanggal, masuk, pulang);
                    }

                    // Tampilkan jumlah kehadiran
                    updateAttendanceSummary();
                } else {
                    Log.w(TAG, "Data absensi tidak ditemukan.");
                    Toast.makeText(rekaptulasiActivity.this, "Data absensi tidak ditemukan.", Toast.LENGTH_SHORT).show();
                }
            }

            @Override
            public void onCancelled(@NonNull DatabaseError error) {
                Log.e(TAG, "Gagal mengambil data: " + error.getMessage());
                Toast.makeText(rekaptulasiActivity.this, "Gagal mengambil data: " + error.getMessage(), Toast.LENGTH_SHORT).show();
            }
        });
    }

    private boolean isTerlambat(String jamMasuk) {
        try {
            SimpleDateFormat format = new SimpleDateFormat("HH:mm");
            Date jamMasukTime = format.parse(jamMasuk);
            Date jamBatas = format.parse("08:00");  // Jam 08:00 sebagai batas

            if (jamMasukTime != null && jamMasukTime.after(jamBatas)) {
                return true;  // Terlambat jika jam masuk lebih dari jam 08:00
            }
        } catch (ParseException e) {
            e.printStackTrace();
        }
        return false;  // Hadir jika jam masuk sebelum jam 08:00
    }

    private void setTableHeader() {
        TableRow headerRow = new TableRow(this);

        TextView dateHeader = createTableCell("Tanggal", true);
        TextView masukHeader = createTableCell("Jam Masuk", true);
        TextView pulangHeader = createTableCell("Jam Pulang", true);

        headerRow.addView(dateHeader);
        headerRow.addView(masukHeader);
        headerRow.addView(pulangHeader);
        tableLayout.addView(headerRow);
    }

    private void addRowToTable(String tanggal, String masuk, String pulang) {
        TableRow row = new TableRow(this);

        TextView dateText = createTableCell(tanggal, false);
        TextView masukText = createTableCell(masuk, false);
        TextView pulangText = createTableCell(pulang, false);

        row.addView(dateText);
        row.addView(masukText);
        row.addView(pulangText);
        tableLayout.addView(row);
    }

    private TextView createTableCell(String text, boolean isHeader) {
        TextView textView = new TextView(this);
        textView.setText(text);
        textView.setGravity(Gravity.CENTER);
        textView.setPadding(16, 16, 16, 16);
        textView.setBackgroundResource(R.drawable.cell_border); // Border untuk sel
        if (isHeader) {
            textView.setTypeface(null, Typeface.BOLD);
        }
        return textView;
    }

    // Update jumlah kehadiran di tampilan
    private void updateAttendanceSummary() {
        TextView tvAttendanceCircle = findViewById(R.id.tvAttendanceCircle);

        if (tvAttendanceCircle != null) {
            // Menampilkan hasil kehadiran dalam format 'persentase hadir'
            double hadirPercentage = (jumlahHadir / (double)(jumlahHadir + jumlahTerlambat)) * 100;
            String text = String.format("%.2f%%\n%d/%d Hari", hadirPercentage, jumlahHadir, (jumlahHadir + jumlahTerlambat));
            tvAttendanceCircle.setText(text);
        }
    }
}
