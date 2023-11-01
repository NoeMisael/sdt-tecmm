function init() {
  $("#ticket_form").on("submit", function (e) {
    guardaryeditar(e);
  });
}

$(document).ready(function () {
  $("#descripcion").summernote({
    height: 150,
    lang: "es-ES",
    callbacks: {
        onImageUpload: function(image) {
            console.log("Image detect...");
            myimagetreat(image[0]);
        },
        onPaste: function (e) {
            console.log("Text detect...");
        }
    },
    toolbar: [
      ['style', ['bold', 'italic', 'underline', 'clear']],
      ['font', ['strikethrough', 'superscript', 'subscript']],
      ['fontsize', ['fontsize']],
      ['color', ['color']],
      ['para', ['ul', 'ol', 'paragraph']],
    
  ],
    popover: {
      image: [],
      link: [],
      air: [],
    },
  });

  $.post("../../controllers/categoria.php?op=combo", function (data, status) {
    $("#id_categoria").html(data);
  });

  $.post("../../controllers/edificio.php?op=combo", function (data, status) {
    $("#id_edificio").html(data);
  });

  $.post("../../controllers/area.php?op=combo", function (data, status) {
    $("#id_area").html(data);
  });

  $.post(
    "../../controllers/vulnerabilidad.php?op=combo",
    function (data, status) {
      $("#id_vulnerabilidad").html(data);
    }
  );

  $.post("../../controllers/afectacion.php?op=combo", function (data, status) {
    $("#id_afectacion").html(data);
  });

  $.post("../../controllers/respuesta.php?op=combo", function (data, status) {
    $("#id_respuesta").html(data);
  });
});

function guardaryeditar(e) {
  e.preventDefault();
  var formData = new FormData($("#ticket_form")[0]);
  $.ajax({
    url: "../../controllers/ticket.php?op=insert",
    type: "POST",
    data: formData,
    contentType: false,
    processData: false,
    success: function (datos) {
      console.log(datos);
      $("#tituloTicket").val("");
      $("#descripcion").summernote("reset");

      $.post(
        "../../controllers/categoria.php?op=combo",
        function (data, status) {
          $("#id_categoria").html(data);
        }
      );

      $.post(
        "../../controllers/edificio.php?op=combo",
        function (data, status) {
          $("#id_edificio").html(data);
        }
      );

      $.post("../../controllers/area.php?op=combo", function (data, status) {
        $("#id_area").html(data);
      });

      $.post(
        "../../controllers/vulnerabilidad.php?op=combo",
        function (data, status) {
          $("#id_vulnerabilidad").html(data);
        }
      );

      $.post(
        "../../controllers/afectacion.php?op=combo",
        function (data, status) {
          $("#id_afectacion").html(data);
        }
      );

      $.post(
        "../../controllers/respuesta.php?op=combo",
        function (data, status) {
          $("#id_respuesta").html(data);
        }
      );

      swal({
        title: "¡Ticket generado!",
        text: "Su ticket ha sido creado correctamente",
        type: "success",
      });
    },
  });
}

init();
