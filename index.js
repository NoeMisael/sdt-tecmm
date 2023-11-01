function init() {}

$(document).ready(function () {});

$(document).on("click", "#btnsoporte", function () {
  if ($("#level").val() == 1) {
    $("#lbltitulo").html("Inicio de sesión Soporte");
    $("#btnsoporte").html("Acceso Usuario");
    $("#btnadmin").html("Admin");
    $("#level").val(2);
  } else if ($("#level").val() == 2) {
    $("#lbltitulo").html("Inicio de sesión Usuario");
    $("#btnsoporte").html("Agente Soporte");
    $("#btnadmin").html("Admin");
    $("#level").val(1);

  }else if ($("#level").val() == 3) {
    $("#lbltitulo").html("Inicio de sesión Usuario");
    $("#btnsoporte").html("Agente Soporte");
    $("#btnadmin").html("Admin");
    $("#level").val(1);}
   else {
    $("#lbltitulo").html("Inicio de sesión Usuario");
    $("#btnadmin").html("Agente Soporte");
    $("#btnsoporte").html("Admin")
    $("#level").val(1);
  }
});

$(document).on("click", "#btnadmin", function () {
  if ($("#level").val() == 1) {
    $("#lbltitulo").html("Inicio de sesión Admin");
    $("#btnsoporte").html("Acceso Usuario");
    $("#btnadmin").html("Agente Soporte");
    $("#level").val(3);

  } else if ($("#level").val() == 3) {
    $("#lbltitulo").html("Inicio de sesión Soporte");
    $("#btnsoporte").html("Acceso Usuario");
    $("#btnadmin").html("Admin");
    $("#level").val(2);

  } else if ($("#level").val() == 2) {
    $("#lbltitulo").html("Inicio de sesión Admin");
    $("#btnsoporte").html("Acceso Usuario");
    $("#btnadmin").html("Agente Soporte");
    $("#level").val(3);

  }
  
  else {
    $("#lbltitulo").html("Inicio de sesión Usuario");
    $("#btnadmin").html("Agente Soporte");
    $("#btnsoporte").html("Admin");
    $("#level").val(1);
  }
});

init();
