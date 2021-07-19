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
      $(".datos_ajax_register").html(
        "<center><img src='../docs/images/load.gif' height='100' width='100'></center>"
      );
      $("#btsubmit").attr("disabled", true);
    },
    success: function (datos) {
      if (datos == 1) {
        showToastPosition(
          "top-right",
          "Error!",
          "Hubo un problema al registrar la micro Red",
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
  var cod_mred = button.data("cod_mred");
  var cod_red = button.data("cod_red");
  var nom_mred = button.data("nom_mred");
  var cod_ugipress;
  var modal = $(this);
  $.ajax({
    type: "POST",
    url: "../servicios/salud/combo_ugipress.php",

    data: { id_red: cod_red },
    beforeSend: function (objeto) {},
    success: function (datos) {
      cod_ugipress = datos;
      $("#actualidarDatos")[0].reset();
      modal.find(".modal-body #cod_ugipress2").val(cod_ugipress);
      //   $("#id_red2").load("../servicios/salud/combo_red.php?id_ogess=" + datos);
      modal.find(".modal-body #id_red2").val(cod_red);
      modal.find(".modal-body #cod_mred2").val(cod_mred);
      modal.find(".modal-body #desc_mred2").val(nom_mred);
    },
  });
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
            // $(".datos_ajax_register").html("Mensaje: Cargando...");
          },
          success: function (datos) {
            if (datos == 1) {
              showToastPosition(
                "top-right",
                "Error!",
                "El registro se encuentra enlazado a un establecimiento de salud ",
                "warning"
              );
            } else {
              $(".datos_ajax_register").html(datos);
              load(1);
              $("#dataDelete").modal("hide");
              $(".modal-backdrop").hide();
            }
          },
        });
      });
    } else if (type === "success-message") {
      swal("Tarea Exitosa!", "Datos registrados!", "success");
    }
  };
})(jQuery);

$("#id_red").attr("disabled", "disabled");
$("#cod_ugipress").on("change", function () {
  if ($("#cod_ugipress").val() == "") {
    $("#id_red").empty();
    $("#id_mred").empty();
    $("#id_establecimiento").empty();
    $(
      '<option value = "">Debe seleccionar una UGIPRESS antes</option>'
    ).appendTo("#id_red");
    $("#id_red").attr("disabled", "disabled");
  } else {
    $("#id_red").removeAttr("disabled", "disabled");
    $("#id_red").load(
      "../servicios/salud/combo_red.php?id_ogess=" + $("#cod_ugipress").val()
    );
  }
});

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
$("#cod_ugipress2").on("change", function () {
  if ($("#cod_ugipress2").val() == "") {
    $("#id_red2").empty();
    $(
      '<option value = "">Debe seleccionar una UGIPRESS antes</option>'
    ).appendTo("#id_red2");
    $("#id_red2").attr("disabled", "disabled");
  } else {
    $("#id_red2").removeAttr("disabled", "disabled");
    $("#id_red2").load(
      "../servicios/salud/combo_red.php?id_ogess=" + $("#cod_ugipress2").val()
    );
  }
});
