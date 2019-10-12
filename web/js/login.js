function session_auth() {
  user = $("#txtUsuario").val();
  if (user == "") {
    $("#txtUsuario").focus();
  }
  password = $("#txtContrasenia").val();
  if (password == "") {
    $("#txtContrasenia").focus();
  }
  $.ajax({type: "POST", url: "php/usuario/session_auth.php", data: "u=" + user + "&c=" + password, dataType: "html", beforeSend: function () {
    $("#resultado").html("<p align='center'><img id='imgLoader' src='assets/img/loader.gif' /> Loading...</p>");
  },
  error: function () {
    alert("error petición ajax");
  }, success: function (datos) {
    if (datos == 1) {
     window.location = "index.php";
   } else {
    $("#resultado").empty();
    $("#resultado").append(datos);
  }
}});
}