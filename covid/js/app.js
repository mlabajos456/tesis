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

$(function () {
  $("#guardar").click(function () {
    var detalle = document.getElementById("detalle");
    var checks = document.querySelectorAll(".form-check-input");
    var formData = new FormData();
    checks.forEach((e) => {
      if (e.checked == true) {
        formData.append(e.id, 1);
      } else {
        formData.append(e.id, 0);
      }
    });
    var id = document.getElementById("id_covid");
    var oxigenacion = document.getElementById("cant_pers");
    console.log(id);
    formData.append("id_covid", id.value);
    formData.append("cant_pers", oxigenacion.value);
    formData.append("nino", 0);
    formData.append("fam_enfer_cron", 0);

    $.ajax({
      type: "POST",
      url: "modelos/modificar.php",
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function (objeto) {
        $("#datos_ajax_register").html(
          "<center><img src='../docs/images/load.gif' height='100' width='100'></center>"
        );
      },
      success: function (data) {
        showSwal("success-message");
        $("#datos_ajax_register").html(data);
        //   window.location='index.php';
      },
    });
  });
});

/*$(function (){     
       $("#guardar").click(function(){
        var detalle=$("#detalle").serialize();
        var par12=$("#par12").serialize();
        var par34=$("#par34").serialize();
        var datos=detalle+par12+par34;

       //  console.log(datos);
       //  alert(datos);
        $.ajax({
                  type: "POST",
                  url: "modelos/agregar.php",
                  data: new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                  beforeSend: function(objeto){
                     $("#datos_ajax_register").html("<center><img src='../docs/images/load.gif' height='100' width='100'></center>");
                   },
                  success:function(data){
                   showSwal('success-message');
                  $("#datos_ajax_register").html(data);
                //  window.location='index.php';
              }
          })
       })
      }); */

$("#dataUpdate").on("show.bs.modal", function (event) {
  var button = $(event.relatedTarget);
  var id_autor = button.data("id_autor");
  var nombre = button.data("nombre");
  var dni = button.data("dni");
  var descripcion = button.data("descripcion");
  var frase = button.data("frase");
  var facebook = button.data("facebook");
  var twitter = button.data("twitter");

  var modal = $(this);
  $("#actualidarDatos")[0].reset();

  modal.find(".modal-body #id_autor").val(id_autor);
  modal.find(".modal-body #nombre").val(nombre);
  modal.find(".modal-body #dni").val(dni);
  modal.find(".modal-body #descripcion").val(descripcion);
  modal.find(".modal-body #frase").val(frase);
  modal.find(".modal-body #facebook").val(facebook);
  modal.find(".modal-body #twitter").val(twitter);
});

//Modificar los datos recientemente jalados
$("#actualidarDatos").submit(function (event) {
  var parametros = $(this).serialize();
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
      $(".datos_ajax_register").html(datos);
      $("#dataUpdate").modal("hide");
      $(".modal-backdrop").hide();

      load(1);
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

            load(1, id_categoria);

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

$("#id_red").attr("disabled", "disabled");
$("#id_mred").attr("disabled", "disabled");
$("#id_establecimiento").attr("disabled", "disabled");
$("#tipo_seguro").attr("disabled", "disabled");
$("#orden_cremacion").attr("disabled", "disabled");
$("#id_provincia").attr("disabled", "disabled");
$("#id_distrito").attr("disabled", "disabled");

$("#id_ogess").on("change", function () {
  if ($("#id_ogess").val() == "") {
    $("#id_red").empty();
    $("#id_mred").empty();
    $("#id_establecimiento").empty();
    $(
      '<option value = "">Debe seleccionar una UGIPRESS antes</option>'
    ).appendTo("#id_red");
    $(
      '<option value = "">Debe seleccionar una red de salud antes</option>'
    ).appendTo("#id_mred");
    $(
      '<option value = "">Debe seleccionar una micro red de salud antes</option>'
    ).appendTo("#id_establecimiento");
    $("#id_red").attr("disabled", "disabled");
    $("#id_mred").attr("disabled", "disabled");
    $("#id_establecimiento").attr("disabled", "disabled");
  } else {
    $("#id_red").removeAttr("disabled", "disabled");
    $("#id_red").load("modelos/combo_red.php?id_ogess=" + $("#id_ogess").val());
  }
});

$("#id_red").on("change", function () {
  if ($("#id_red").val() == "") {
    $("#id_mred").empty();
    $('<option value = "">Debe seleccionar una red antes</option>').appendTo(
      "#id_mred"
    );
    $("#id_mred").attr("disabled", "disabled");
  } else {
    $("#id_mred").removeAttr("disabled", "disabled");
    $("#id_mred").load("modelos/combo_mred.php?id_red=" + $("#id_red").val());
  }
});
$("#id_mred").on("change", function () {
  if ($("#id_mred").val() == "") {
    $("#id_establecimiento").empty();
    $(
      '<option value = "">Debe seleccionar una Micro red antes</option>'
    ).appendTo("#id_establecimiento");
    $("#id_establecimiento").attr("disabled", "disabled");
  } else {
    $("#id_establecimiento").removeAttr("disabled", "disabled");
    $("#id_establecimiento").load(
      "modelos/combo_establecimiento.php?id_mred=" + $("#id_mred").val()
    );
  }
});

$("#tipo_regimen").on("change", function () {
  if ($("#tipo_regimen").val() == "") {
    $("#tipo_seguro").empty();
    $(
      '<option value = "">Debe seleccionar un tipo de regimen</option>'
    ).appendTo("#tipo_seguro");
    $("#tipo_seguro").attr("disabled", "disabled");
  } else {
    $("#tipo_seguro").removeAttr("disabled", "disabled");
    $("#tipo_seguro").load(
      "modelos/combo_tiposeguro.php?id_tipo_regimen=" + $("#tipo_regimen").val()
    );
  }
});

$("#manejo_falle").on("change", function () {
  if ($("#manejo_falle").val() == "") {
    $("#orden_cremacion").empty();
    $(
      '<option value = "">Debe seleccionar el manejo del fallecido</option>'
    ).appendTo("#orden_cremacion");
    $("#orden_cremacion").attr("disabled", "disabled");
  } else {
    $("#orden_cremacion").removeAttr("disabled", "disabled");
    $("#orden_cremacion").load(
      "modelos/combo_orden_cremacion.php?id_man_falle=" +
        $("#manejo_falle").val()
    );
  }
});

$("#id_departamento").on("change", function () {
  if ($("#id_departamento").val() == "") {
    $("#id_provincia").empty();
    $("#id_distrito").empty();
    $('<option value = "">Debe seleccionar un departamento</option>').appendTo(
      "#id_provincia"
    );
    $('<option value = "">Debe seleccionar una provincia</option>').appendTo(
      "#id_distrito"
    );
    $("#id_provincia").attr("disabled", "disabled");
    $("#id_distrito").attr("disabled", "disabled");
  } else {
    $("#id_provincia").removeAttr("disabled", "disabled");
    $("#id_provincia").load(
      "modelos/combo_provincia.php?id_departamento=" +
        $("#id_departamento").val()
    );
  }
});

$("#id_provincia").on("change", function () {
  if ($("#id_provincia").val() == "") {
    $("#id_distrito").empty();
    $('<option value = "">Debe seleccionar una provincia</option>').appendTo(
      "#id_distrito"
    );
    $("#id_distrito").attr("disabled", "disabled");
  } else {
    $("#id_distrito").removeAttr("disabled", "disabled");
    $("#id_distrito").load(
      "modelos/combo_distrito.php?id_provincia=" + $("#id_provincia").val()
    );
  }
});
