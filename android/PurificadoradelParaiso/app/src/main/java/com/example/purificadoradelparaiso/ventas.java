package com.example.purificadoradelparaiso;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.Button;

public class ventas extends AppCompatActivity {
    private WebView webview;
    private Button btnRegresar;
    private  String Empleado;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_ventas);
        Empleado = getIntent().getExtras().getString("usuario");
        webview = findViewById(R.id.wbVentas);
        WebSettings conf = webview.getSettings();
        conf.setJavaScriptEnabled(true);
        webview.setWebViewClient(new WebViewClient());
        webview.loadUrl( "https://purificadoradelparaiso.online/backend/webservices/ventas/listar.php?empleado_key="+Empleado);

        btnRegresar = findViewById(R.id.btnRegresarV);
        btnRegresar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent a = new Intent(ventas.this, MainActivity.class);
                a.putExtra("usuario",Empleado);
                startActivity(a);
            }
        });
    }
}
