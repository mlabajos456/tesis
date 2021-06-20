
 <?php
 $raiz = "..";
   $raizcss = "../..";
   require_once("$raiz/class/sentencias.php");
   require_once("../php/utilitario.php");
  $utilitario=new utilitariophp();
  $sql = new sentencias();

?>
   <script src="<?php echo $raizcss; ?>/build/js/paginado.js"></script>
   <?php
     $id = $_POST['id'];
     $bancos = 1;
     $cajas = 2;
     $soles = 2;
     $dolares = 7;

    
   ?>

   <div class="x_title">
                    <h2>Reportes de Saldo en Bancos (Soles)</h2>
                  <div class="clearfix"></div>
                  </div>
       <table class="table table-striped responsive-utilities jambo_table bulk_action">
                      <thead>
                            <tr>
                                          <th>Nombre Banco</th>
                                          <th>Nombre Cuenta</th>
                                          <th>N° Cuenta</th>
                                          <th>Tipo Cuenta</th>
                                          <th>Saldo Cuenta</th>
                                          
                            </tr>
                        </thead>
                         <tbody>
                                          <tr>
                                            <?php
                                              /*SELECT m.id_almacen,m.nom_almacen FROM T_almacen m
                                              inner join T_detalle_razon_social_almacen dts on dts.id_almacen = m.id_almacen
                                              inner join T_detalle_almacen_empleado dte on dte.id_detalle_razon_social_almacen = dts.id_detalle_razon_social_almacen
                                              inner join T_dato_laboral_empleado dl on dl.id_dato_laboral_empleado = dte.id_dato_laboral_empleado
                                              inner join T_empleado em on em.id_empleado = dl.id_empleado
                                              inner join T_usuario us on us.id_empleado = em.id_empleado
                                              where us.id_usuario = '$id_usuario'
                                              order by m.id_almacen asc "*/

                                             $linea = $sql->consulta("SELECT b.nom_banco, m.nom_cuenta_bancaria, m.num_cuenta_bancaria, tc.nom_tipo_cuenta_bancaria, m.saldo_cuenta_bancaria FROM T_cuenta_bancaria m
                                              inner join T_tipo_cuenta tc on tc.id_tipo_cuenta_bancaria = m.id_tipo_cuenta_bancaria
                                              inner join T_banco b on b.id_banco = m.id_banco
                                              inner join T_detalle_empleado_cuenta dec on dec.id_cuenta_bancaria = m.id_cuenta_bancaria
                                              inner join T_detalle_almacen_empleado dte on dte.id_detalle_almacen_empleado = dec.id_detalle_almacen_empleado
                                              inner join T_dato_laboral_empleado dl on dl.id_dato_laboral_empleado = dte.id_dato_laboral_empleado
                                              inner join T_empleado em on em.id_empleado = dl.id_empleado
                                              inner join T_usuario us on us.id_empleado = em.id_empleado
                                              where us.id_usuario = '$id' and m.id_tipo_cuenta_bancaria = '$bancos' and m.id_moneda = '$soles'
                                              order by m.id_banco asc ");
                                              $monto_total = 0;
                                              while($r = pg_fetch_array($linea))
                                              {
                                              ?> 
                                                     <td><?= $r[0]?></td>
                                                        <td><?= $r[1]?></td>
                                                        <td><?= $r[2]?></td>
                                                        <td><?= $r[3]?></td>
                                                        <td align="right" style='color: #2C3E50;font-weight: bold;'>S/ <?= $utilitario->formatMoney(number_format($r[4], 2, '.', ''), true)?></td>
                                                       
                                          </tr>
                                               <?php 
                                               $monto_total = number_format($r[4], 2, '.', '')+ number_format($monto_total, 2, '.', '');
                                              }
                                              ?>
                          </tbody>
                          <tfoot>
                            <tr>
                                            <td colspan="4" scope="rowgroup">TOTAL</td>
                                            <td align="right" style='color: #2C3E50;font-weight: bold;'>S/ <?= $utilitario->formatMoney(number_format($monto_total, 2, '.', ''), true);?></td>
                                          </tr>
                          </tfoot>
                    </table>
<div class="clearfix"></div><br>





<!--//////////////////////////////////////////////////////////-->
<div class="x_title">
                    <h2>Reportes de Saldo en Bancos (Dolares)</h2>
                  <div class="clearfix"></div>
                  </div>

 <table class="table table-striped responsive-utilities jambo_table bulk_action">
                      <thead>
                            <tr>
                                          <th>Nombre Banco</th>
                                          <th>Nombre Cuenta</th>
                                          <th>N° Cuenta</th>
                                          <th>Tipo Cuenta</th>
                                          <th>Saldo Cuenta</th>
                                          
                            </tr>
                        </thead>
                         <tbody>
                                          <tr>
                                            <?php
                                              /*SELECT m.id_almacen,m.nom_almacen FROM T_almacen m
                                              inner join T_detalle_razon_social_almacen dts on dts.id_almacen = m.id_almacen
                                              inner join T_detalle_almacen_empleado dte on dte.id_detalle_razon_social_almacen = dts.id_detalle_razon_social_almacen
                                              inner join T_dato_laboral_empleado dl on dl.id_dato_laboral_empleado = dte.id_dato_laboral_empleado
                                              inner join T_empleado em on em.id_empleado = dl.id_empleado
                                              inner join T_usuario us on us.id_empleado = em.id_empleado
                                              where us.id_usuario = '$id_usuario'
                                              order by m.id_almacen asc "*/

                                             $linea = $sql->consulta("SELECT b.nom_banco, m.nom_cuenta_bancaria, m.num_cuenta_bancaria, tc.nom_tipo_cuenta_bancaria, m.saldo_cuenta_bancaria FROM T_cuenta_bancaria m
                                              inner join T_tipo_cuenta tc on tc.id_tipo_cuenta_bancaria = m.id_tipo_cuenta_bancaria
                                              inner join T_banco b on b.id_banco = m.id_banco
                                              inner join T_detalle_empleado_cuenta dec on dec.id_cuenta_bancaria = m.id_cuenta_bancaria
                                              inner join T_detalle_almacen_empleado dte on dte.id_detalle_almacen_empleado = dec.id_detalle_almacen_empleado
                                              inner join T_dato_laboral_empleado dl on dl.id_dato_laboral_empleado = dte.id_dato_laboral_empleado
                                              inner join T_empleado em on em.id_empleado = dl.id_empleado
                                              inner join T_usuario us on us.id_empleado = em.id_empleado
                                              where us.id_usuario = '$id' and m.id_tipo_cuenta_bancaria = '$bancos' and m.id_moneda = '$dolares'
                                              order by m.id_banco asc ");
                                              $monto_total2 = 0;
                                              while($r = pg_fetch_array($linea))
                                              {
                                              ?> 
                                                     <td><?= $r[0]?></td>
                                                        <td><?= $r[1]?></td>
                                                        <td><?= $r[2]?></td>
                                                        <td><?= $r[3]?></td>
                                                        <td align="right" style='color: #2C3E50;font-weight: bold;'>$ <?= $utilitario->formatMoney(number_format($r[4], 2, '.', ''), true) ?></td>
                                                       
                                          </tr>
                                               <?php
                                                $monto_total2 = number_format($r[4], 2, '.', '')+ number_format($monto_total2, 2, '.', '');
                                              }
                                              ?>
                          </tbody>
                          <tfoot>
                            <tr>
                                            <td colspan="4" scope="rowgroup">TOTAL</td>
                                            <td align="right" style='color: #2C3E50;font-weight: bold;' >$ <?php echo $utilitario->formatMoney(number_format($monto_total2, 2, '.', ''), true) ;?></td>
                                          </tr>
                          </tfoot>
                    </table><div class="clearfix"></div><br>


<!--//////////////////////////////////////////////////////////-->

<div class="x_title">
                    <h2>Reportes de Saldo en Caja Efectiva</h2>
                  <div class="clearfix"></div>
                  </div>


<table class="table table-striped responsive-utilities jambo_table bulk_action">
                      <thead>
                            <tr>
                                          <th>Nombre Banco</th>
                                          <th>Nombre Cuenta</th>
                                          <th>N° Cuenta</th>
                                          <th>Tipo Cuenta</th>
                                          <th>Saldo Cuenta</th>
                                          
                            </tr>
                        </thead>
                         <tbody>
                                          <tr>
                                            <?php
                                              /*SELECT m.id_almacen,m.nom_almacen FROM T_almacen m
                                              inner join T_detalle_razon_social_almacen dts on dts.id_almacen = m.id_almacen
                                              inner join T_detalle_almacen_empleado dte on dte.id_detalle_razon_social_almacen = dts.id_detalle_razon_social_almacen
                                              inner join T_dato_laboral_empleado dl on dl.id_dato_laboral_empleado = dte.id_dato_laboral_empleado
                                              inner join T_empleado em on em.id_empleado = dl.id_empleado
                                              inner join T_usuario us on us.id_empleado = em.id_empleado
                                              where us.id_usuario = '$id_usuario'
                                              order by m.id_almacen asc "*/

                                             $linea = $sql->consulta("SELECT b.nom_banco, m.nom_cuenta_bancaria, m.num_cuenta_bancaria, tc.nom_tipo_cuenta_bancaria, m.saldo_cuenta_bancaria FROM T_cuenta_bancaria m
                                              inner join T_tipo_cuenta tc on tc.id_tipo_cuenta_bancaria = m.id_tipo_cuenta_bancaria
                                              inner join T_banco b on b.id_banco = m.id_banco
                                              inner join T_detalle_empleado_cuenta dec on dec.id_cuenta_bancaria = m.id_cuenta_bancaria
                                              inner join T_detalle_almacen_empleado dte on dte.id_detalle_almacen_empleado = dec.id_detalle_almacen_empleado
                                              inner join T_dato_laboral_empleado dl on dl.id_dato_laboral_empleado = dte.id_dato_laboral_empleado
                                              inner join T_empleado em on em.id_empleado = dl.id_empleado
                                              inner join T_usuario us on us.id_empleado = em.id_empleado
                                              where us.id_usuario = '$id' and m.id_tipo_cuenta_bancaria = '$cajas' and m.id_moneda = '$soles'
                                              order by m.id_banco asc ");
                                              $monto_total3 = 0;
                                              while($r = pg_fetch_array($linea))
                                              {
                                              ?> 
                                                     <td><?= $r[0]?></td>
                                                        <td><?= $r[1]?></td>
                                                        <td><?= $r[2]?></td>
                                                        <td><?= $r[3]?></td>
                                                        <td align="right" style='color: #2C3E50;font-weight: bold;'>S/ <?=  $utilitario->formatMoney(number_format($r[4], 2, '.', ''), true)?></td>
                                                       
                                          </tr>
                                               <?php
                                                $monto_total3 = number_format($r[4], 2, '.', '')+ number_format($monto_total3, 2, '.', '');
                                              }
                                              ?>
                                          <tr>
                                            <td colspan="4" scope="rowgroup">TOTAL</td>
                                            <td align="right" style='color: #2C3E50;font-weight: bold;'>S/ <?php echo $utilitario->formatMoney(number_format($monto_total3, 2, '.', ''), true) ;?></td>
                                          </tr>
                          </tbody>
                    </table>
     <div class="clearfix"></div>               

<!--////////////////////////////////////////////////////////////////////////-->


<div class="x_title">
                    <h2>Resumen General de Saldos</h2>
                  <div class="clearfix"></div>
                  </div>


<table class="table table-striped responsive-utilities jambo_table bulk_action">
                      <thead>
                            <tr>
                                          <th>Totales</th>
                                          <th>Saldo Soles</th>
                                          <th>Saldo Dolares</th>
                                          
                            </tr>
                        </thead>
                         <tbody>
                                          <tr>
                                                        <td>SALDO TOTAL ENTRE CAJAS Y CUENTAS</td>
                                                        <?php $suma_soles = number_format($monto_total, 2, '.', '') + number_format($monto_total3, 2, '.', '') ?>
                                                        <td align="right" style='color: #2C3E50;font-weight: bold;'>S/ <?= $utilitario->formatMoney(number_format( $suma_soles , 2, '.', ''), true) ?></td>
                                                        <td align="right" style='color: #2C3E50;font-weight: bold;'>$ <?= $utilitario->formatMoney(number_format( $monto_total2 , 2, '.', ''), true) ?></td>
                                                       
                                          </tr>
                          </tbody>
                    </table>
     <div class="clearfix"></div>      