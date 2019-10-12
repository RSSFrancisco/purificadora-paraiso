package com.example.purificadoradelparaiso;
        import android.content.Intent;
        import android.support.v7.app.AppCompatActivity;
        import android.os.Bundle;
        import android.view.View;
        import android.webkit.WebSettings;
        import android.webkit.WebView;
        import android.webkit.WebViewClient;
        import android.widget.ArrayAdapter;
        import android.widget.Button;
        import android.widget.ListView;
        import android.widget.Toast;
        import android.util.Log;
        import com.android.volley.Request;
        import com.android.volley.RequestQueue;
        import com.android.volley.Response;
        import com.android.volley.VolleyError;
        import com.android.volley.toolbox.StringRequest;
        import com.android.volley.toolbox.Volley;

        import org.json.JSONArray;
        import org.json.JSONException;

        import java.util.ArrayList;

public class activity_clientes extends AppCompatActivity {
    /*Button  btnCargar;
    ListView listaResultado;*/
    private WebView webview;
    Button btnRegresar;
    private  String Empleado;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_clientes);
        Empleado = getIntent().getExtras().getString("usuario");
        webview = findViewById(R.id.wbClientes);
        WebSettings conf = webview.getSettings();
        conf.setJavaScriptEnabled(true);
        webview.setWebViewClient(new WebViewClient());
        webview.loadUrl( "https://purificadoradelparaiso.online/backend/webservices/clientes/listar.php");
        btnRegresar = findViewById(R.id.btnRegresarC);
        btnRegresar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                Intent a = new Intent(activity_clientes.this, MainActivity.class);
                a.putExtra("usuario",Empleado);
                startActivity(a);
            }
        });

        /*btnCargar = (Button)findViewById(R.id.btnCargar);
        listaResultado = (ListView)findViewById(R.id.lvClientes);

        btnCargar.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String consulta = "http://ligacordobesadefutbolamateur.com.mx/purificadora/webservices/clientes/listar.php";
                EnviarRecibirDatos(consulta);


            }
        });*/
    }
    @Override
    public void onBackPressed() {
        if (webview.canGoBack()) {
            webview.goBack();
        } else {
            super.onBackPressed();
        }
    }
/*
    public void EnviarRecibirDatos(String URL){

        //Toast.makeText(getApplicationContext(), "" + URL, Toast.LENGTH_SHORT).show();
        //Toast.makeText(getApplicationContext(),"Se guardo correctamente el cliente "+ etNombre.getText().toString(), Toast.LENGTH_SHORT).show();
        RequestQueue queue = Volley.newRequestQueue(this);
        StringRequest stringRequest = new StringRequest(Request.Method.GET, URL, new Response.Listener<String>() {
            @Override
            public void onResponse(String response) {

                response = response.replace("][", ",");
                if (response.length() > 0) {
                    try {

                        JSONArray ja = new JSONArray(response);
                        Log.i("sizejson", "" + ja.length());

                        CargarListView(ja);
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
    public void CargarListView(JSONArray ja){

        ArrayList<String> lista = new ArrayList<>();

        for(int i=0;i<ja.length();i+=4){

            try {

                lista.add(ja.getString(i)+" "+ja.getString(i+1)+" "+ja.getString(i+2)+" "+ja.getString(i+3));
            } catch (JSONException e) {
                e.printStackTrace();
            }

        }


        ArrayAdapter<String> adaptador;
        adaptador = new ArrayAdapter<String>(this, android.R.layout.simple_list_item_1, lista);
        listaResultado.setAdapter(adaptador);



    }*/

}
