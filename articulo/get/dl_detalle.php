<?php
   $raiz = "../../docs/";
   require($raiz."class/sentencias.php");
   $sql = new sentencias();
   $lista = array();
   $id_articulo = $_GET['id'];
   
   $linea=$sql->consulta("SELECT aa.id_articulo, aa.titulo, aa.imagen,a.nombre as nom_autor,aa.link_youtube,aa.enlace,aa.fecha,c.descripcion, aa.resumen, aa.id_autor, aa.p_1, aa.p_2, aa.p_3, aa.p_4, aa.p_5, aa.p_6, aa.id_categoria FROM t_articulo aa
inner join t_autor a on a.id_autor= aa.id_autor
inner join t_categoria c on c.id_categoria= aa.id_categoria where aa.id_articulo=$id_articulo");
          while($r = $sql->fetch_array($linea))
                 {
                  $fila= array();
                             
                              $r4=" ";
                              $fila['id_articulo']=$r['id_articulo'];
                              $fila['titulo']=$r['titulo'];
                              $fila['resumen']=$r['resumen'];
                              $fila['link_youtube'] = $r['link_youtube'];
                              $fila['enlace']=$r['enlace'];
                              $fila['id_autor']=$r['id_autor'];
                              $fila['p_1']=$r['p_1'];
                              $fila['p_2']=$r['p_2'];
                              $fila['p_3']=$r['p_3'];
                              $fila['p_4']=$r['p_4'];
                              $fila['p_5']=$r['p_5'];
                              $fila['p_6']=$r['p_6'];
                              $fila['id_categoria']=$r['id_categoria'];
                              $fila['nom_autor']=$r['nom_autor'];
                              $fila['descripcion']=$r['descripcion'];
                             
                     array_push($lista, $fila);
                      }
                    echo json_encode($lista);



?>