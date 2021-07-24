let map;
let mark = [];
function iniciarMap() {
  $("#loader").fadeIn("slow");

  var qwe = document.getElementById("nuevo");
  $.ajax({
    url: "modelos/listar.php",
    dataType: "json",

    beforeSend: function (objeto) {
      $("#loader").html("<img src='loader.gif'>");
    },
    success: function (data) {
      var coordInicial = {
        lat: -6.033962,
        lng: -76.974422,
      };

      var icono = "/marker/marker.png";
      map = new google.maps.Map(document.getElementById("map"), {
        zoom: 15,
        center: coordInicial,
      });

      $(".leyenda").html(`Total de casos: ${data.length}`);
      for (var i = 0; i < data.length; i++) {
        // init markers
        var marker = new google.maps.Marker({
          position: new google.maps.LatLng(data[i].latitud, data[i].longitud),
          map: map,
          title: "Covid",
          icon: "http://encuesta.s4rang.com/marker/marker.png",
        });
      }

      //$(".outer_div").html(data).fadeIn('slow');
      $("#loader").html("");
    },
  });
}

function renewMap() {
  var inicie = document.getElementById("inicio");
  var finale = document.getElementById("final");
  var detalle = document.getElementById("detalle");

  var datos = new FormData(detalle);
  // datos.append("inicio", inicie);
  //datos.append("final", finale);

  $.ajax({
    url: "modelos/range-fechas.php",
    method: "post",
    processData: false,
    contentType: false,
    cache: false,
    enctype: "multipart/form-data",
    dataType: "json",
    data: datos,

    beforeSend: function (objeto) {
      $("#loader").html("<img src='loader.gif'>");
    },
    success: function (data) {
      var coordInicial = {
        lat: -6.033962,
        lng: -76.974422,
      };

      $(".leyenda").html(`Total de casos: ${data.length}`);
      var icono = "/marker/marker.png";
      map = new google.maps.Map(document.getElementById("map"), {
        zoom: 15,
        center: coordInicial,
      });

      for (var i = 0; i < data.length; i++) {
        // init markers
        var marker = new google.maps.Marker({
          position: new google.maps.LatLng(data[i].latitud, data[i].longitud),
          map: map,
          title: "Covid",
          icon: "../market/market.png",
        });
      }

      //$(".outer_div").html(data).fadeIn('slow');
      $("#loader").html("");
    },
  });

  /* $.ajax({
      url: "modelos/range-fechas.php",
      dataType: "json", 
      data: datos,
    beforeSend: function (objeto) { 
        $(".datos_ajax_register").html(
          "<center><img src='../docs/images/load.gif' height='100' width='100'></center>"
        );
      },
      success: function (data) {
        var coordInicial = {
          lat: -6.033962,
          lng: -76.974422,
        };
        var icono = "/marker/marker.png";
         map = new google.maps.Map(document.getElementById("map"), {
          zoom: 15,
          center: coordInicial,
        });
        for (var i = 0; i < data.length; i++) {
          // init markers
          var marker = new google.maps.Marker({
            position: new google.maps.LatLng(data[i].latitud, data[i].longitud),
            map: map,
            title: "Covid"+data[i].fecha_registro,
            icon: "http://encuesta.s4rang.com/marker/marker.png",
          });
        }
        $(".datos_ajax_register").html("");
      },
    }); */
}
// aqui haz la funcion script nada más

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
