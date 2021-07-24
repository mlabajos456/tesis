let map;
function iniciarMap2() {
  var submit = document.getElementById('nuevo');
  $("#loader").fadeIn("slow");

  $.ajax({
    url: "modelos/listar.php",
    dataType: "json",

    beforeSend: function (objeto) {
      $("#loader").html("<img src='loader.gif'>");
    },
    success: function (data) {
     var icono= "marker/mosquito.png"
      //   var longlat = json.decode(data);
      var coordInicial = {
        lat: -6.033962,
        lng: -76.974422,
      };
      
      $(".leyenda").html(`Total de casos: ${data.length}`);
      map = new google.maps.Map(document.getElementById("map2"), {
        zoom: 15,
        center: coordInicial,
      });

      for (var i = 0; i < data.length; i++) {
        var marker = new google.maps.Marker({
          position: new google.maps.LatLng(data[i].latitud, data[i].longitud),
          map: map,
          title: "Dengue",
         // icon: icono,
        });
      }
      $("#loader").html("");
    //  google.maps.event.addListener(submit, 'click', renewMap);
    },
  });

}

function renewMap() {
  var inicie = document.getElementById("inicio");
  var finale = document.getElementById("final");
  var detalle = document.getElementById("detalle");
  
  $("#loader").html("");
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
      
      $(".leyenda").html(`Total de casos: ${data.length}`);
      var coordInicial = {
        lat: -6.033962,
        lng: -76.974422,
      };
      var icono = "/marker/mosquito.png";
      map = new google.maps.Map(document.getElementById("map2"), {
        zoom: 15,
        center: coordInicial,
      });

      for (var i = 0; i < data.length; i++) {
        // init markers
        var marker = new google.maps.Marker({
          position: new google.maps.LatLng(data[i].latitud, data[i].longitud),
          map: map,
          title: "Dengue",
  
        });
      }

      //$(".outer_div").html(data).fadeIn('slow');
      $("#loader").html("");
    },
  });
}
