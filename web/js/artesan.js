
/*
 Fecha de creación: 23/02/2017
 Autor: Ing.Francisco Reyes Sánchez
 Función 'mod_add_form': Consumir datos mediante ajax
 Fecha de modificación: 24/02/2017
 */
 function mod_add_form(_type,_url,_dataType,_dom,_data){
  $.ajax({type: _type, url: _url, 
    data: _data,
    dataType: _dataType, 
    beforeSend: function () {
      $(_dom).html("<p align='center'><img id='imgLoader' src='assets/img/loader.gif' /> Cargando...</p>");
    },
    success: function (datos) {
     $(_dom).empty();
     $(_dom).append(datos);   

   }});
}

function validar_datos_formulario(obj){
    //se recorre 'obj' con la funcion each de jquery
    $.each(obj, function( i, valor){
        //se le asigna lo que trae el objeto 'valor' a la variable item
        item =$(valor).val();
        //Variable bool;
        bool_valida = true;
        // Si la variable 'item' es igual a vacio entonces que realize los cambios en el DOM  con ID 'valor'
        if(item === ''){  
            //se le asigna un estilo con la funcion 'css' 
            $(valor).css({"border-color": "red", "border-width": "2px"});
            // se le agrega un atributo con la funcion attr
            $(valor).attr("placeholder","Datos necesarios");
            bool_valida = false;

          }else{
            $(valor).css({"border-color": "green", "border-width": "2px"});
            $(valor).removeAttr("placeholder","Datos necesarios");
            bool_valida = true;
          }

        });
    return bool_valida;
  }
  //Accesos
  function table_clientes(){
    mod_add_form("POST","view/cliente/table.php","html","#page-body","");
  }
  function table_empleado(){
    mod_add_form("POST","view/empleado/table.php","html","#page-body","");
  }
  function table_historial(){
    mod_add_form("POST","view/historial/table.php","html","#page-body","");
  }
  function table_producto(){
     mod_add_form("POST","view/producto/table.php","html","#page-body","");
  }
  function table_usuario(){
     mod_add_form("POST","view/usuario/table.php","html","#page-body","");
  }
  function table_venta(){
     mod_add_form("POST","view/venta/table.php","html","#page-body","");
  }
  //funciones que enlazan los formularios del sistema 
  function form_cliente(){
    mod_add_form("POST","view/cliente/form.php","html","#page-body","");
  }
  function form_empleado(){
    mod_add_form("POST","view/empleado/form.php","html","#page-body","");
  }
  function form_producto(){
    mod_add_form("POST","view/producto/form.php","html","#page-body","");
  }
  function form_usuario(){
    mod_add_form("POST","view/usuario/form.php","html","#page-body","");
  }
  function form_venta(){
    mod_add_form("POST","view/venta/form.php","html","#page-body","");
  }
  function editar_cliente(clave){
    _data = "clave="+clave;
    mod_add_form("POST","view/cliente/edit.php","html","#page-body",_data);
  }
  function editar_empleado(clave){
     _data = "clave="+clave;
    mod_add_form("POST","view/empleado/edit.php","html","#page-body",_data);
  }
   function editar_usuario(clave){
     _data = "clave="+clave;
    mod_add_form("POST","view/usuario/edit.php","html","#page-body", _data);
  }
  function actualizar_cliente(clave){
    nombre = $("#txtNombre").val();
    fecha = $("#txtFecha").val();
    direccion = $("#txtDireccion").val();
    colonia = $("#txtColonia").val();
    ciudad = $("#txtCiudad").val();
    estado = $("#txtEstado").val();
    codigoQR = $("#txtCodigoQr").val();
     if(nombre == "" || fecha == "" || direccion == "" || colonia == "" || ciudad == ""|| estado == "" ){
       alert("Faltan algunos campos del formulario por llenar");
    }else{
      _data = "nombre="+nombre+"&fecha="+fecha+"&direccion="+direccion+"&colonia="+colonia+"&ciudad="+ciudad+"&estado="+estado+"&clave="+clave+"&codigoQR="+codigoQR;
       mod_add_form("POST","php/cliente/actualizar.php","html","#resultado",_data);
       setTimeout(
      function ()
      {
       table_clientes();
                   }, 3000);
     }
  }
  function guardar_cliente(){
    nombre = $("#txtNombre").val();
    fecha = $("#txtFecha").val();
    direccion = $("#txtDireccion").val();
    colonia = $("#txtColonia").val();
    ciudad = $("#txtCiudad").val();
    estado = $("#txtEstado").val();
    if(nombre == "" || fecha == "" || direccion == "" || colonia == "" || ciudad == ""|| estado == "" ){
       alert("Faltan algunos campos del formulario por llenar");
    }else{
      _data = "nombre="+nombre+"&fecha="+fecha+"&direccion="+direccion+"&colonia="+colonia+"&ciudad="+ciudad+"&estado="+estado;
       mod_add_form("POST","php/cliente/guardar.php","html","#resultado",_data);
       setTimeout(
    function ()
    {
       table_clientes();
                   }, 3000);
    }
  }
  function guardar_empleado(){
    nombre = $("#txtNombre").val();
    fecha = $("#txtFecha").val();
    direccion = $("#txtDireccion").val();
    nss = $("#txtNss").val();
    telefono = $("#txtTelefono").val();
    if(nombre == "" || fecha == "" || direccion == "" || nss == "" || telefono == ""){
       alert("Faltan algunos campos del formulario por llenar");
    }else{
      _data = "nombre="+nombre+"&fecha="+fecha+"&direccion="+direccion+"&nss="+nss+"&telefono="+telefono;
       mod_add_form("POST","php/empleado/guardar.php","html","#resultado",_data);
       setTimeout(
    function ()
    {
       table_empleado();
                   }, 3000);
    }
  }
  function borrar_cliente(clave){
    if (confirm("Mensaje de confirmacion.\n ¿Desea Eliminar Este registro?")) {
    _data = "clave="+clave;
       mod_add_form("POST","php/cliente/borrar.php","html","",_data);
       alert("Se borro con exito de la base de datos");
       table_clientes();
    }else{
       alert("LA ACCION HA SIDO CANCELADA");
    }
  }
 function borrar_empleado(clave){
    _data = "clave="+clave;
    if (confirm("Mensaje de confirmacion.\n ¿Desea Eliminar Este registro?")) {
       mod_add_form("POST","php/empleado/borrar.php","html","",_data);
       alert("Se borro con exito de la base de datos");
       table_empleado();
    }else{
       alert("LA ACCION HA SIDO CANCELADA");
    }
  }
  function borrar_producto(clave){
    _data = "clave="+clave;
    if (confirm("Mensaje de confirmacion.\n ¿Desea Eliminar Este registro?")) {
       mod_add_form("POST","php/producto/borrar.php","html","",_data);
       alert("Se borro con exito de la base de datos");
       table_producto();
    }else{
        alert("LA ACCION HA SIDO CANCELADA");
    }
  }
  function borrar_usuario(clave){
    _data = "clave="+clave;
    if (confirm("Mensaje de confirmacion.\n ¿Desea Eliminar Este registro?")) {
       mod_add_form("POST","php/usuario/borrar.php","html","",_data);
       alert("Se borro con exito de la base de datos");
       table_usuario();
    }else{
       alert("LA ACCION HA SIDO CANCELADA");
    }
  }
  function borrar_venta(clave){
    _data = "clave="+clave;
    if (confirm("Mensaje de confirmacion.\n ¿Desea Eliminar Este registro?")) {
       mod_add_form("POST","php/venta/borrar.php","html","",_data);
       alert("Se borro con exito de la base de datos");
       table_venta();
    }else{
       alert("LA ACCION HA SIDO CANCELADA");
    }
  }
   //Fecha: 03/07/2019
  function guardarUsuario(){
    usuario = $("#txtUsuario").val();
    correo = $("#txtCorreo").val();
    contrasenia = $("#txtContrasenia").val();
    repetirContrasenia = $("#txtRepetirContrasenia").val();
    //chekar como esta dado de alta el empleado en la base de datos 
    empleado = $("#txtEmpleado").val();
    tipo = $("#txtTipo").val();
    if(usuario == "" || correo == "" || contrasenia == "" || repetirContrasenia == "" || empleado == "" || tipo == ""){
        alert("Faltan algunos campos del formulario por llenar");
    }else{
      if(contrasenia != repetirContrasenia){
          alert("LA CLAVE DE USUARIO QUE USTED INGRESO NO COINCIDE CON LA REPETIDA");
      }else{
          _data = "usuario="+usuario+"&contrasenia="+contrasenia+"&correo="+correo+"&empleado="+empleado+"&tipo="+tipo;
           mod_add_form("POST","php/usuario/guardar.php","html","#resultado",_data);
            setTimeout(
             function ()
              {
               table_usuario();
                   }, 3000);
              }
           }
       }
   function actualizar_usuario(clave){
    usuario = $("#txtUsuario").val();
    correo = $("#txtCorreo").val();
    contrasenia = $("#txtContrasenia").val();
    repetirContrasenia = $("#txtRepetirContrasenia").val();
    //chekar como esta dado de alta el empleado en la base de datos 
    empleado = $("#txtEmpleado").val();
    tipo = $("#txtTipo").val();
    if(usuario == "" || correo == "" || contrasenia == "" || repetirContrasenia == "" || empleado == "" || tipo == ""){
        alert("Faltan algunos campos del formulario por llenar");
    }else{
      if(contrasenia != repetirContrasenia){
          alert("LA CLAVE DE USUARIO QUE USTED INGRESO NO COINCIDE CON LA REPETIDA");
      }else{
          _data = "usuario="+usuario+"&contrasenia="+contrasenia+"&correo="+correo+"&empleado="+empleado+"&tipo="+tipo+"&clave="+clave;
           mod_add_form("POST","php/usuario/actualizar.php","html","#resultado",_data);
            setTimeout(
             function ()
              {
               table_usuario();
                   }, 3000);
              }
           }
       }
  
  
