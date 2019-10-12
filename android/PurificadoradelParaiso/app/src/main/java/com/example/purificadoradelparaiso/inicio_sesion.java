package com.example.purificadoradelparaiso;

import android.content.Intent;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.android.volley.Request;
import com.android.volley.RequestQueue;
import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonObjectRequest;
import com.android.volley.toolbox.JsonRequest;
import com.android.volley.toolbox.Volley;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.zip.Inflater;

public class inicio_sesion extends AppCompatActivity implements Response.Listener<JSONObject>, Response.ErrorListener {
RequestQueue rq;
JsonRequest jr;
EditText cajaUser, cajaPwd;
Button btnIniciarSesion;

    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_inicio_sesion);

        cajaUser = (EditText) findViewById(R.id.txtUsuario);
        cajaPwd = (EditText) findViewById(R.id.txtPassword);
        btnIniciarSesion = (Button) findViewById(R.id.btnIngresarSesion);
        rq = Volley.newRequestQueue(getBaseContext());

        btnIniciarSesion.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                iniciarSesion();
            }
        });
    }

    @Override
    public void onErrorResponse(VolleyError error) {
        Toast.makeText(getApplicationContext(),"No se ha encontrado al usuario"+error.toString(), Toast.LENGTH_SHORT).show();
    }

    @Override
    public void onResponse(JSONObject response) {
        user usuario = new user();
        Toast.makeText(getApplicationContext(),"Se ha encontrado al usuario"+ cajaUser.getText().toString(), Toast.LENGTH_SHORT).show();

        JSONArray jsonArray = response.optJSONArray("datos");
        JSONObject jsonObject = null;
        try {
           jsonObject = jsonArray.getJSONObject(0);
           usuario.setUser(jsonObject.optString("usuario"));
           usuario.setPwd(jsonObject.optString("contrasenia"));
           usuario.setCorreo(jsonObject.optString("correo"));
           // en caso de que los datos del web services sean correctos que se abra el menu de la aplicación
            Intent a = new Intent(inicio_sesion.this, MainActivity.class);
            a.putExtra("usuario", usuario.getUser());
            startActivity(a);
        }catch (JSONException e){
            e.printStackTrace();
        }

    }
    private void iniciarSesion(){
        String url = "https://purificadoradelparaiso.online/backend/webservices/usuarios/sesion.php?user="+cajaUser.getText().toString()+"&pwd="+cajaPwd.getText().toString();
        jr = new JsonObjectRequest(Request.Method.GET, url, null,this, this);
        rq.add(jr);

    }
}
