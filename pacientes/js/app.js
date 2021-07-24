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
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    beforeSend: function (objeto) {
      $("#datos_ajax_register").html(
        "<center><img src='../docs/images/load.gif' height='100' width='100'></center>"
      );
      $("#btsubmit").attr("disabled", true);
    },
    success: function (datos) {
      $("#datos_ajax_register").html(datos);
      $("#guardarDatos")[0].reset();
      $("#btsubmit").attr("disabled", false);
      $("#dataRegister").modal("hide");
      $(".modal-backdrop").hide();
      showSwal("success-message");
      load(1);
    },
  });
  event.preventDefault();
});

$("#dataUpdate").on("show.bs.modal", function (event) {
  var button = $(event.relatedTarget);

  var id_persona = button.data("id_persona");
  var nombre = button.data("nombre");
  var dni = button.data("dni");
  var sexo = button.data("sexo");
  var fecha_nac = button.data("fecha_nac");
  var estado_civil = button.data("estado_civil");
  var apellido_paterno = button.data("apellido_paterno");
  var apellido_materno = button.data("apellido_materno"); 
  var domicilio = button.data("domicilio"); 
  var telefono = button.data("telefono"); 
  var modal = $(this);
  $("#actualidarDatos")[0].reset();

  modal.find(".modal-body #id_persona").val(id_persona);
  modal.find(".modal-body #nombre").val(nombre);
  modal.find(".modal-body #dni").val(dni);
  modal.find(".modal-body #apellido_paterno").val(apellido_paterno);
  modal.find(".modal-body #apellido_materno").val(apellido_materno);
  modal.find(".modal-body #fecha_nac").val(fecha_nac);
  modal.find(".modal-body #sexo").val(sexo);
  modal.find(".modal-body #estado_civil").val(estado_civil);
  modal.find(".modal-body #apellido_materno").val(apellido_materno);
  modal.find(".modal-body #telefono").val(telefono);
  modal.find(".modal-body #domicilio").val(domicilio);
});

//Modificar los datos recientemente jalados
$("#actualidarDatos").submit(function (event) {
  var parametros = $(this).serialize();
  console.log("aqui id persona");
  console.log(parametros.id_persona);
  $.ajax({
    type: "POST",
    url: "modelos/modificar.php",
    data: new FormData(this),
    contentType: false,
    cache: false,
    processData: false,
    beforeSend: function (objeto) {
      $(".datos_ajax_register").html("Mensaje: Cargando...");
    },
    success: function (datos) {
      if(datos ==0){
        showToastPosition('top-right', 'Duplicidad!', 'Ya existe un paciente con ese dni', 'warning');
      }else{
        $(".datos_ajax_register").html(datos);
        $("#dataUpdate").modal("hide");
        $(".modal-backdrop").hide();
  
        load(1);
      }
   
    },
  });

  event.preventDefault();
});

function change_pic(img) {
  $.ajax({
    type: "POST",
    url: "get_img.php",
    data: "img=" + img,
    success: function (data) {
      $(".div_img").html(data);
    },
  });
}

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
