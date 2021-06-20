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
  if ($("#id_persona").val() == 0) {
    showToastPosition(
      "top-right",
      "Error!",
      "Seleccione un personal",
      "warning"
    );
  } else if ($("#nom_usuario").val() == "") {
    showToastPosition(
      "top-right",
      "Error!",
      "Ingrese un nombre de usuario",
      "warning"
    );
  } else if ($("#pass_usuario").val() == "" || $("#pw").val() == "") {
    showToastPosition(
      "top-right",
      "Error!",
      "Ingrese una contraseña",
      "warning"
    );
  } else if ($("#pass_usuario").val() != $("#pw").val()) {
    showToastPosition(
      "top-right",
      "Error!",
      "Las contraseñas no coinciden",
      "warning"
    );
  } else {
    $.ajax({
      type: "POST",
      url: "modelos/agregar.php",
      data: parametros,
      beforeSend: function (objeto) {
        $("#btsubmit").attr("disabled", true);
      },
      success: function (datos) {
        if (datos == 1) {
          showToastPosition(
            "top-right",
            "Error!",
            "El usuario ya existe!",
            "warning"
          );
          $("#btsubmit").attr("disabled", false);
        } else if (datos == 2) {
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
  }

  event.preventDefault();
});

// jala los datos para mostrar y modificar
$("#dataUpdate").on("show.bs.modal", function (event) {
  var button = $(event.relatedTarget); // Botón que activó el modal
  var password = button.data("password");
  var id_registrador = button.data("idregistrador");
  var usuario = button.data("usuario");
  var idpersona = button.data("idpersona");

  var modal = $(this);
  $("#actualidarDatos")[0].reset();
  modal.find(".modal-body #id_persona2").val(idpersona);
  modal.find(".modal-body #id_registrador2").val(id_registrador);
  modal.find(".modal-body #nom_usuario2").val(usuario);
  modal.find(".modal-body #pass_usuario2").val(password);
  modal.find(".modal-body #pw2").val(password);
});

//Modificar los datos recientemente jalados
$("#actualidarDatos").submit(function (event) {
  var parametros = $(this).serialize();

  if ($("#id_persona2").val() == 0) {
    showToastPosition(
      "top-right",
      "Error!",
      "Seleccione un personal",
      "warning"
    );
  } else if ($("#nom_usuario2").val() == "") {
    showToastPosition(
      "top-right",
      "Error!",
      "Ingrese un nombre de usuario",
      "warning"
    );
  } else if ($("#pass_usuario2").val() == "" || $("#pw2").val() == "") {
    showToastPosition(
      "top-right",
      "Error!",
      "Ingrese una contraseña",
      "warning"
    );
  } else if ($("#pass_usuario2").val() != $("#pw2").val()) {
    showToastPosition(
      "top-right",
      "Error!",
      "Las contraseñas no coinciden",
      "warning"
    );
  } else {
    $.ajax({
      type: "POST",
      url: "modelos/modificar.php",
      data: parametros,
      beforeSend: function (objeto) {
        console.log("qwer");
        $("#datos_ajax").html("Mensaje: Cargando...");
      },
      error: function (datos) {
        console.log("error");
      },
      success: function (datos) {
        $("#datos_ajax").html(datos);

        $("#dataUpdate").modal("hide");
        $(".modal-backdrop").hide();

        load(1);
      },
    });
  }
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
