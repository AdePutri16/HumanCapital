package com.example.ptc;

import com.google.firebase.database.DatabaseReference;
import com.google.firebase.database.FirebaseDatabase;

public class HelperAbsensi {

    private DatabaseReference databaseReference;

    public HelperAbsensi() {
        FirebaseDatabase database = FirebaseDatabase.getInstance();
        databaseReference = database.getReference("Absensi");
    }

    public interface DataStatus {
        void DataIsLoaded();
        void DataIsInserted();
        void DataIsUpdated();
        void DataIsDeleted();
    }

    public void saveAbsensi(Absensi absensi, DataStatus dataStatus) {
        String key = databaseReference.push().getKey();
        if (key != null) {
            databaseReference.child(key).setValue(absensi)
                    .addOnSuccessListener(aVoid -> dataStatus.DataIsInserted())
                    .addOnFailureListener(e -> {
                        // Handle error
                    });
        }
    }
}
