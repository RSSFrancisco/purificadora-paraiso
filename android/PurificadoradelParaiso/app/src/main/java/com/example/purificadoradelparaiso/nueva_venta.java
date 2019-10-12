package com.example.purificadoradelparaiso;

import android.content.Intent;
import android.content.pm.ActivityInfo;
import android.os.Build;
import android.support.annotation.Nullable;
import android.support.annotation.RequiresApi;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.SurfaceView;
import android.view.View;
import android.webkit.WebSettings;
import android.webkit.WebView;
import android.webkit.WebViewClient;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Button;
import android.widget.EditText;
import android.widget.FrameLayout;
import android.widget.Spinner;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.JsonRequest;
import com.google.zxing.integration.android.IntentIntegrator;
import com.google.zxing.integration.android.IntentResult;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;


public class nueva_venta extends AppCompatActivity implements Response.Listener<JSONObject>, Response.ErrorListener {
    private Button botonScanner, btnGuardarVenta;
    private EditText etCodigoQR, txtTotal, txtDetalleVenta;
    private SurfaceView viewQR;
    private SurfaceView SurfaceView;
    private FrameLayout frame;
    private WebView webview;
    public Spinner spCantidad;
    public Spinner spinner;
    public RequestQueue rq;
    public JsonRequest jr;
    public  int valor1;
    public EditText etEmpleado;
    public String Empleado;
    @RequiresApi(api = Build.VERSION_CODES.O)
    @Override
    protected void onCreate(Bundle savedInstanceState) {

        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_nueva_venta);
        etEmpleado = findViewById(R.id.txtEmpleado);
        Empleado = getIntent().getExtras().getString("usuario");
        etEmpleado.setText(Empleado);
        setRequestedOrientation(ActivityInfo.SCREEN_ORIENTATION_PORTRAIT);
        botonScanner = findViewById(R.id.btnScanner);
        //labelScanner = findViewById(R.id.txtScanner);
        etCodigoQR = findViewById(R.id.txtScanner);
        // viewQR = findViewById(R.id.sfViewCamera);
        botonScanner.setOnClickListener(mOnClickListener);
        // SurfaceView = findViewById(R.id.sfViewCamera);
        frame = findViewById(R.id.zxing_barcode_scanner);
        txtTotal = findViewById(R.id.txtTotalVenta);
        txtDetalleVenta = findViewById(R.id.txtDetalllesVenta);
        //Spinner de la lista de productos
        spinner = (Spinner) findViewById(R.id.spProducto);
        //Establece la llamada de una nueva consulta al web services remoto o local
        rq = Volley.newRequestQueue(getBaseContext());
        // creando un nuevo adaptador
        final ArrayAdapter<CharSequence> adapter = ArrayAdapter.createFromResource(this,
                R.array.spinner_producto, android.R.layout.simple_spinner_item);
        // especificando el layout en la lista
        adapter.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        // Aplicando el adaptador a la lista
        spinner.setAdapter(adapter);
        //Spinner de la lista de cantidad
        spCantidad = (Spinner) findViewById(R.id.spCantidadProducto);
        // creando un nuevo adaptador
        ArrayAdapter<CharSequence> adCantidad = ArrayAdapter.createFromResource(this,
                R.array.spinner_cantidad_producto, android.R.layout.simple_spinner_item);
        // especificando el layout en la lista
        adCantidad.setDropDownViewResource(android.R.layout.simple_spinner_dropdown_item);
        // Aplicando el adaptador a la lista
        spCantidad.setAdapter(adCantidad);
        spCantidad.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
            @Override
            public void onItemSelected(AdapterView<?> parentView, View selectedItemView, int position, long id) {
                Integer indexItem = spinner.getSelectedItemPosition();
                if(indexItem.equals(0)){
                     valor1 = 15;
                }
                if (indexItem.equals(1)){
                     valor1 = 14;
                }
                if (indexItem.equals(2)){
                    valor1 = -15;
                }

                int valor2 = Integer.parseInt(spCantidad.getSelectedItem().toString());
                int total = valor1 * valor2;

                txtTotal.setText("" + total);
            }

            @Override
            public void onNothingSelected(AdapterView<?> parentView) {

            }

        });
        btnGuardarVenta = findViewById(R.id.btnGuardarVenta);
        btnGuardarVenta.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (etCodigoQR.getText().toString().equals("") || txtTotal.getText().equals("") || txtDetalleVenta.getText().toString().equals("")) {
                    Toast.makeText(getApplicationContext(), "POR FAVOR INGRESE DATOS EN LOS CAMPOS QUE FALTAN", Toast.LENGTH_SHORT).show();
                } else {
                    enviarDatosVenta();
                }
            }
        });


    }

    @Override
    protected void onActivityResult(int requestCode, int resultCode, @Nullable Intent data) {
        super.onActivityResult(requestCode, resultCode, data);
        IntentResult result = IntentIntegrator.parseActivityResult(requestCode, resultCode, data);
        if (result != null) {
            if (result.getContents() != null) {
                etCodigoQR.setText(result.getContents());
                webview = findViewById(R.id.wbCodeQrCliente);
                WebSettings conf = webview.getSettings();
                conf.setJavaScriptEnabled(true);
                webview.setWebViewClient(new WebViewClient());
                webview.loadUrl("https://purificadoradelparaiso.online/backend/webservices/clientes/listar_details.php?qr=" + etCodigoQR.getText().toString());

            } else {
                etCodigoQR.setText("Error");
            }
        }
    }

    private View.OnClickListener mOnClickListener = new View.OnClickListener() {
        @Override
        public void onClick(View v) {
            switch (v.getId()) {
                case R.id.btnScanner:
                    new IntentIntegrator(nueva_venta.this).initiateScan();

                    break;
            }
        }
    };

    protected void enviarDatosVenta() {
        String cantidades = (String) spCantidad.getSelectedItem();
        String itemProducto = (String) spinner.getSelectedItem();
        String url2 = "https://purificadoradelparaiso.online/backend/webservices/ventas/guardar.php?codigo_qr=" + etCodigoQR.getText().toString() + "&total=" + txtTotal.getText().toString() + "&detalle=" + txtDetalleVenta.getText().toString() + "&cantidad=" + cantidades + "&producto=" + itemProducto + "&empleado="+ Empleado;
        jr = new JsonObjectRequest(Request.Method.GET, url2, null, this, this);
        rq.add(jr);
    }

    @Override
    public void onErrorResponse(VolleyError error) {
        Toast.makeText(getApplicationContext(), "NO SE PUDO REALIZAR SU REGISTRO, VUELVA A INTENTAR MAS TARDE, GRACIAS", Toast.LENGTH_SHORT).show();
    }

    public void onResponse(JSONObject response) {
        class_ventas ventass = new class_ventas();
        Toast.makeText(getApplicationContext(), "SE GUARDO CON EXITO SU VENTA", Toast.LENGTH_SHORT).show();

        JSONArray jsonArray = response.optJSONArray("datos");
        JSONObject jsonObject = null;
        try {
            jsonObject = jsonArray.getJSONObject(0);
            ventass.setProducto(jsonObject.optString("producto"));
            ventass.setCantidad(jsonObject.optString("cantidad"));
            ventass.setDetalles(jsonObject.optString("detalles"));
            // en caso de que los datos del web services sean correctos que se abra el menu de la aplicación
            Intent a = new Intent(nueva_venta.this, ventas.class);
            a.putExtra("usuario",Empleado);
            startActivity(a);
        } catch (JSONException e) {
            e.printStackTrace();
        }

    }
}
