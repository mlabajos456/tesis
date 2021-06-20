
<?php 
  session_start();
	$raiz = "../docs/";
  require($raiz."class/sentencias.php");
  require($raiz."class/utilitario.php");
  $formato=new utilitariophp();
  $sql = new sentencias();
  $cons="SELECT * FROM t_empleado e
    order by e.id_empleado asc";
	
  
		$filename = "locadores".date('Ymd') . ".xls";
		header("Content-Type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=\"$filename\"");
		$show_coloumn = false;
		?>
		<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <h2>Registro de Locadores</h2>    
		<table border="1">
            <thead>
              <tr style="background-color:#297EDE;"style="color:#E6EFF9"; >
                 
                 <th>Nro Empleado</th>
                 <th>RUC/DNI</th>
                 <th>Nombre</th>
                 <th>Apellido Paterno</th>
                 <th>Apellido Materno</th>
                 
                 
               </tr>
            </thead>
            <tbody>
             <?php
             $linea = $sql->consulta($cons);
              while($r = pg_fetch_array($linea))
                 {
                        
                              $nombre=$r['nom_empleado'].' '.$r['ape_paterno'].' '.$r['ape_materno'];
                    ?>
              <tr>
                
                <td><?=$r[1]?></td>
                <td><?=$r[12]?></td>
                <td><?=$r['nom_empleado']?></td>
                <td><?=$r['ape_paterno']?></td>
                <td><?=$r['ape_materno']?></td>
               
                
               </tr>
           <?php } ?>
            </tbody>
        </table> 

 
