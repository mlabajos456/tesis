<?php
$raiz = "../../docs/";
require($raiz . "class/sentencias.php");
$sql = new sentencias();


$id_persona = $_POST['id_persona'];
$dni = ($_POST['dni']);
$apellido_paterno = ($_POST['apellido_paterno']);
$apellido_materno = ($_POST['apellido_materno']);
$nombre = ($_POST['nombre']);
$fecha_nac = ($_POST['fecha_nac']);
$estado_civil = ($_POST['estado_civil']);
$sexo = ($_POST['sexo']);
$domicilio = ($_POST['domicilio']);
$telefono = ($_POST['telefono']);
$linea = $sql->consulta("SELECT e.id_persona,e.dni from t_paciente e where e.id_persona='$id_persona'");
    foreach ($linea as $r) {
        if ($r['dni'] == $dni){
            $sql->consulta("UPDATE t_paciente 
                set 
               apellido_paterno ='$apellido_paterno',
               apellido_materno = '$apellido_materno',
               nombre ='$nombre',
               estado_civil = '$estado_civil',
               sexo = '$sexo',
               domicilio = '$domicilio',
               telefono = '$telefono'
               where id_persona='$id_persona'");
            if ($sql->error()) {
                $respuesta = array($sql->error());
                echo json_encode($respuesta);
            } else {
                $respuesta = array('okay');
                echo json_encode($respuesta);
            }
        }else{
            $val = $sql->numRegistros("SELECT e.dni from t_paciente e where e.dni='$dni'");
                $respuesta = array();
                if ($val > 0) {
                    $respuesta = array('duplicidad');
                    echo json_encode($respuesta);
                }else{
                      $sql->consulta("UPDATE t_paciente 
                        set 
                       apellido_paterno ='$apellido_paterno',
                       apellido_materno = '$apellido_materno',
                       nombre ='$nombre',
                       dni = '$dni',
                      
                       estado_civil = '$estado_civil',
                       sexo = '$sexo',
                       domicilio = '$domicilio',
                       telefono = '$telefono'
                       where id_persona='$id_persona'");
                    if ($sql->error()) {
                        $respuesta = array($sql->error());
                        echo json_encode($respuesta);
                    } else {
                        $respuesta = array('okay');
                        echo json_encode($respuesta);
                    }
                }
        }
    }
