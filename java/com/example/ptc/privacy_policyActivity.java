package com.example.ptc;

import android.os.Bundle;
import android.view.View;
import android.widget.ImageView;
import android.widget.ScrollView;
import android.widget.TextView;
import android.widget.Toast;

import androidx.appcompat.app.AppCompatActivity;

public class privacy_policyActivity extends AppCompatActivity {

    // Declare UI elements
    private ImageView ivBack;
    private TextView tvIntroduction, tvDataCollection, tvDetails, tvDataUsage, tvUsageDetails;
    private TextView tvDataProtection, tvProtectionDetails, tvAdditionalPoint1, tvUserRights;
    private TextView tvAdditionalPoint2, tvPolicyChanges;
    private ScrollView mainContent;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_privacy_policy); // Make sure this matches your XML file name

        // Initialize UI elements
        ivBack = findViewById(R.id.ivBack);
        tvIntroduction = findViewById(R.id.tvIntroduction);
        tvDataCollection = findViewById(R.id.tvDataCollection);
        tvDetails = findViewById(R.id.tvDetails);
        tvDataUsage = findViewById(R.id.tvDataUsage);
        tvUsageDetails = findViewById(R.id.tvUsageDetails);
        tvDataProtection = findViewById(R.id.tvDataProtection);
        tvProtectionDetails = findViewById(R.id.tvProtectionDetails);
        tvAdditionalPoint1 = findViewById(R.id.tvAdditionalPoint1);
        tvUserRights = findViewById(R.id.tvUserRights);
        tvAdditionalPoint2 = findViewById(R.id.tvAdditionalPoint2);
        tvPolicyChanges = findViewById(R.id.tvPolicyChanges);
        mainContent = findViewById(R.id.mainContent);

        // Set up click listener for the back button
        ivBack.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                // Action for back button
                Toast.makeText(privacy_policyActivity.this, "Kembali ditekan", Toast.LENGTH_SHORT).show();
                finish(); // Closes the activity
            }
        });

        // Example usage of other UI elements
        tvIntroduction.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Toast.makeText(privacy_policyActivity.this, tvIntroduction.getText(), Toast.LENGTH_LONG).show();
            }
        });
    }
}
