package com.example.purificadoradelparaiso;

import android.content.Intent;
import android.support.annotation.Nullable;
import android.support.v4.app.FragmentManager;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.ListView;
import android.widget.TextView;
import android.widget.Toast;


import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.StringRequest;
import com.android.volley.toolbox.Volley;
import com.google.zxing.integration.android.IntentIntegrator;
import com.google.zxing.integration.android.IntentResult;

import org.json.JSONArray;
import org.json.JSONException;

public class nuevoCliente extends AppCompatActivity {

    //variables para el escaner
    //private Button botonScanner;
    //private EditText etCodigoQR;
    //private TextView labelScanner;

    //
    EditText etNombre;
    String   etFechaNacimiento;
    EditText etFechaNacimientoDD;
    EditText etFechaNacimientoMM;
    EditText etFechaNacimientoYY;
    EditText etDireccion;
    EditText etColonia;
    EditText etCiudad;
    EditText etEstado;
    Button btGuardar;
    ListView ListaClientes;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_nuevo_cliente);
        //codigo scanner
        //botonScanner = findViewById(R.id.btnScanner);
        //labelScanner = findViewById(R.id.txtScanner);
        //etCodigoQR = findViewById(R.id.txtScanner);
        //botonScanner.setOnClickListener(mOnClickListener);
        //
        etNombre = findViewById(R.id.txtNombre);
        etFechaNacimientoDD = findViewById(R.id.txtFechaNacimientoDD);
        etFechaNacimientoMM = findViewById(R.id.txtFechaNacimientoMM);
        etFechaNacimientoYY = findViewById(R.id.txtFechaNacimientoYY);
        etDireccion = findViewById(R.id.txtDireccion);
        etColonia = findViewById(R.id.txtColonia);
        etCiudad =  findViewById(R.id.txtEstado);
        etEstado =  findViewById(R.id.txtEstado);
        btGuardar = findViewById(R.id.btnGuardar);


        btGuardar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                etFechaNacimiento = etFechaNacimientoDD.getText()+"-"+etFechaNacimientoMM.getText()+"-"+etFechaNacimientoYY.getText();
                String registro = "https://purificadoradelparaiso.online/backend/webservices/clientes/guardar.php?nombre=" + etNombre.getText().toString() + "&fecha=" + etFechaNacimiento + "&direccion=" + etDireccion.getText()+"&colonia="+etColonia.getText().toString()+"&ciudad="+etCiudad.getText().toString()+"&estado="+etEstado.getText().toString();
                if(etNombre.getText().toString().equals("") || etFechaNacimiento.equals("") || etDireccion.getText().toString().equals("")|| etColonia.getText().toString().equals("") || etCiudad.getText().toString().equals("") || etEstado.getText().toString().equals("")){
                    Toast.makeText(getApplicationContext(), "POR FAVOR INGRESE DATOS EN LOS CAMPOS QUE FALTAN", Toast.LENGTH_SHORT).show();
                }else{
                    EnviarRecibirDatos(registro);
                    Intent a = new Intent(nuevoCliente.this, activity_clientes.class);
                    startActivity(a);
                    etNombre.setText("");
                    etFechaNacimientoDD.setText("");
                    etFechaNacimientoMM.setText("");
                    etFechaNacimientoYY.setText("");
                    etDireccion.setText("");
                    etColonia.setText("");
                    etCiudad.setText("");
                    etEstado.setText("");
                }
            }
        });
    }
    public void EnviarRecibirDatos(String URL){
        //Toast.makeText(getApplicationContext(), "" + URL, Toast.LENGTH_SHORT).show();
        Toast.makeText(getApplicationContext(),"Se guardo correctamente el cliente "+ etNombre.getText().toString(), Toast.LENGTH_SHORT).show();
        RequestQueue queue = Volley.newRequestQueue(this);
        StringRequest stringRequest = new StringRequest(Request.Method.GET, URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {
                response = response.replace("][", ",");
                if (response.length() > 0) {
                    try {

                        JSONArray ja = new JSONArray(response);
                        //Log.i("sizejson", "" + ja.length());

                        //CargarListView(ja);
                        //Inicia el layout si se envia correctamente los datos y se encuentra una respuesta


                    } catch (JSONException e) {
                        e.printStackTrace();
                    }

                }

            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {

            }
        });

        queue.add(stringRequest);

    }
   /* @Override
    protected  void onActivityResult(int requestCode, int resultCode, @Nullable Intent data){
        super.onActivityResult(requestCode, resultCode, data);
        IntentResult result = IntentIntegrator.parseActivityResult(requestCode, resultCode, data);
        if(result != null){
            if(result.getContents() != null){
                etCodigoQR.setText(result.getContents());
            }else{
                etCodigoQR.setText("Error");
            }
        }
    }
    private View.OnClickListener mOnClickListener = new View.OnClickListener() {
        @Override
        public void onClick(View v) {
            switch (v.getId()){
                case R.id.btnScanner:
                    new IntentIntegrator(nuevoCliente.this).initiateScan();
                    break;
            }
        }
    };*/
}
