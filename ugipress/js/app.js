function load(page) {
  var parametros = { action: "ajax", page: page };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "lista.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("<img src='loader.gif'>");
    },
    success: function (data) {
      $(".outer_div").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
// procede a guardar los recien agregados nuevos

$("#guardarDatos").submit(function (event) {
  var parametros = $(this).serialize();
  $.ajax({
    type: "POST",
    url: "modelos/agregar.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#datos_ajax_register").html(
        "<center><img src='../docs/images/load.gif' height='100' width='100'></center>"
      );
      $("#btsubmit").attr("disabled", true);
    },
    success: function (datos) {
      if (datos == 1) {
        showToastPosition(
          "top-right",
          "Error!",
          "Hubo un problema al registrar el usuario",
          "warning"
        );
        $("#btsubmit").attr("disabled", false);
      } else {
        $(".datos_ajax_register").html(datos);
        $("#guardarDatos")[0].reset();
        $("#btsubmit").attr("disabled", false);
        $("#dataRegister").modal("hide");
        $(".modal-backdrop").hide();
        showSwal("success-message");
        load(1);
      }
    },
  });
  event.preventDefault();
});

// jala los datos para mostrar y modificar
$("#dataUpdate").on("show.bs.modal", function (event) {
  var button = $(event.relatedTarget); // Botón que activó el modal
  var cod_ref = button.data("cod_ref"); // Extraer la información de atributos de datos
  var descripcion = button.data("descripcion"); // Extraer la información de atributos de datos
  var cod_ugipress = button.data("cod_ugipress"); // Extraer la información de atributos de datos

  var modal = $(this);
  $("#actualidarDatos")[0].reset();
  //modal.find('.modal-title').text('Modificar Departamento: '+nom_ciudad)
  modal.find(".modal-body #codigo_ugipress2").val(cod_ugipress);
  modal.find(".modal-body #descripcion2").val(descripcion);
  modal.find(".modal-body #cod_ref2").val(cod_ref);
});

//Modificar los datos recientemente jalados
$("#actualidarDatos").submit(function (event) {
  var parametros = $(this).serialize();
  $.ajax({
    type: "POST",
    url: "modelos/modificar.php",
    data: parametros,
    beforeSend: function (objeto) {
      $(".datos_ajax_register").html("Mensaje: Cargando...");
    },
    success: function (datos) {
      $(".datos_ajax_register").html(datos);
      $("#dataUpdate").modal("hide");
      $(".modal-backdrop").hide();

      load(1);
    },
  });

  event.preventDefault();
});

(function ($) {
  showSwal = function (type, id) {
    "use strict";
    if (type === "swalEliminar") {
      swal({
        title: "Está seguro de eliminar el registro?",
        text: "El registro se eliminará permanentemente!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Si",
      }).then(function () {
        $.ajax({
          type: "POST",
          url: "modelos/eliminar.php",
          data: "id=" + id,
          beforeSend: function (objeto) {
            $(".datos_ajax_register").html("Mensaje: Cargando...");
          },
          success: function (datos) {
            $(".datos_ajax_register").html(datos);

            load(1);

            $("#dataDelete").modal("hide");
            $(".modal-backdrop").hide();
          },
        });
      });
    } else if (type === "success-message") {
      swal("Tarea Exitosa!", "Datos registrados!", "success");
    }
  };
})(jQuery);

$(document).ready(function () {
  $("#id_gerencia").on("change", function () {
    if ($("#id_gerencia").val() == "") {
      $("#id_oficina").empty();
      $('<option value = "">Selecciona una Oficina</option>').appendTo(
        "#id_oficina"
      );
      $("#id_oficina").attr("disabled", "disabled");
    } else {
      $("#id_oficina").removeAttr("disabled", "disabled");
      $("#id_oficina").load(
        "selecciona_oficina.php?id_gerencia=" + $("#id_gerencia").val()
      );
    }
  });
  $("#id_gerencia_").on("change", function () {
    if ($("#id_gerencia_").val() == "") {
      $("#id_oficina_").empty();
      $('<option value = "">Selecciona una Oficina</option>').appendTo(
        "#id_oficina_"
      );
      $("#id_oficina_").attr("disabled", "disabled");
    } else {
      $("#id_oficina_").removeAttr("disabled", "disabled");
      $("#id_oficina_").load(
        "selecciona_oficina.php?id_gerencia=" + $("#id_gerencia_").val()
      );
    }
  });
});
