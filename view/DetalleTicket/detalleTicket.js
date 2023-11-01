function init() {}

$(document).ready(function () {
  var tick_id = getUrlParameter("ID");

  $.post(
    "../../controllers/ticket.php?op=listardetalle",
    { tick_id: tick_id },
    function (data) {
      $("#lbldetalle").html(data);
    }
  );

  $.post("../../controllers/status.php?op=combo", function (data, status) {
    $("#id_status").html(data);
  });

  $("#notas").summernote({
    height: 150,
    lang: "es-ES",
    popover: {
      image: [],
      link: [],
      air: [],
    },
  });

  $("#descripcion").summernote({
    height: 150,
    minHeight: 150,
    maxHeight: 150,
    lang: "es-ES",
    disableResizeEditor: true,
    popover: {
      image: [],
      link: [],
      air: [],
    },

    toolbar: [],
  });

  $("#descripcion").summernote("disable");

  $.post(
    "../../controllers/ticket.php?op=mostrar",
    { tick_id: tick_id },
    function (data) {
      data = JSON.parse(data);
      $("#fechaTicket").html("Fecha creación: " + data.fechaticket);
      $("#lblagente").html("Agente a cargo: " + data.agente);
      $("#id_ticket").html(data.id_ticket);
      $("#tituloTicket").html(data.tituloTicket);
      $("#titulo").html(data.id_ticket + " : " + data.tituloTicket);
      $("#descripcion").summernote("code", data.descripcionTicket);
      $("#prioridad").val(data.prioridad);
      $("#categoria").val(data.categoria);
      $("#area").val(data.area);
      $("#edificio").val(data.edificio);
      $("#id_presupuesto").val(data.presupuesto);
      $("#lblstatus").html(data.status);
      $("#reqpresupuesto").val(data.presupuesto);
    }
  );
});

var getUrlParameter = function getUrlParameter(sParam) {
  var sPageURL = decodeURIComponent(window.location.search.substring(1)),
    sURLVariables = sPageURL.split("&"),
    sParameterName,
    i;

  for (i = 0; i < sURLVariables.length; i++) {
    sParameterName = sURLVariables[i].split("=");

    if (sParameterName[0] === sParam) {
      return sParameterName[1] === undefined ? true : sParameterName[1];
    }
  }
};

$(document).on("click", "#enviar", function () {
  var id_ticket = getUrlParameter("ID");
  var id_usuario = $("#user_idx").val();
  var id_status;
  var notas = $("#notas").val();

  if (id_usuario == 1) {
    id_status = 1;
    presupuesto = $("#reqpresupuesto").val();
  } else {
    id_status = $("#id_status").val();
    presupuesto = $("#id_presupuesto").val();
  }

  $.post(
    "../../controllers/ticket.php?op=insertdetalle",
    {
      id_ticket: id_ticket,
      notas: notas,
      id_usuario: id_usuario,
      presupuesto: presupuesto,
      id_status: id_status,
    },
    function (data) {
      console.log(id_usuario);
      console.log(id_ticket);
      console.log(notas);
      console.log(id_status);
      console.log(presupuesto);
      $("#notas").summernote("reset");
      $.post("../../controllers/status.php?op=combo", function (data, status) {
        $("#id_status").html(data);
      });
      $("#reqpresupuesto").val(data.presupuesto);

      swal("Correcto!", "Registrado Correctamente", "success");
    }
  );
});

init();
