package com.example.purificadoradelparaiso;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.support.v7.widget.CardView;
import android.view.View;
import android.widget.Button;
import android.widget.TextView;

public class MainActivity extends AppCompatActivity {
    CardView botonClientes;
    CardView botonNuevoCliente;
    CardView botonVentas,botonNuevaVenta,botonCerrarSesion;
    String Usuario;
    TextView tbSesion;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        Usuario = getIntent().getExtras().getString("usuario");
        tbSesion =findViewById(R.id.lblSesion);
        tbSesion.setText("Bienvenido: "+Usuario);
        botonClientes =findViewById(R.id.btnClientes);
        botonClientes.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent i = new Intent(MainActivity.this, activity_clientes.class);
                i.putExtra("usuario",Usuario);
                startActivity(i);
            }
        });
        botonNuevoCliente = findViewById(R.id.btnAgregarCliente);
        botonNuevoCliente.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View N){
                Intent a = new Intent(MainActivity.this, nuevoCliente.class);
                startActivity(a);
            }
        }
        );
        botonVentas = findViewById(R.id.btnVentas);
        botonVentas.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent a = new Intent(MainActivity.this, ventas.class);
                a.putExtra("usuario",Usuario);
                startActivity(a);
            }
        });
        botonNuevaVenta = findViewById(R.id.btnNuevaVenta);
        botonNuevaVenta.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent a = new Intent(MainActivity.this, nueva_venta.class);
                a.putExtra("usuario",Usuario);
                startActivity(a);
            }
        });
        botonCerrarSesion = findViewById(R.id.btnCerrarSesion);
        botonCerrarSesion.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent a = new Intent(MainActivity.this, inicio_sesion.class);
                startActivity(a);
            }
        });
    }

}
