

<section class="content-header">
<div class="row">
    <div class="col-md-6">
  <h1>
    <i class="fa fa-folder-o icon-title"></i>Imprimir notificación con 3 Meses de morosidad</h1>
   
</div>
</div>
</section>


<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php  

    if (empty($_GET['alert'])) {
      echo "";
    } 
  
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
              Datos registrados correctamente
              </div>";
    }

    elseif ($_GET['alert'] == 2) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
              Datos Actualizados correctamente
            </div>";
    }

    elseif ($_GET['alert'] == 3) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
              Procesado Correctamente!
            </div>";
    }

    elseif ($_GET['alert'] == 4) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
              No se pudo completar la operación!
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
        
          <table id="dataTables1" class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <h2>Lista de usuarios</h2>
            <div align="center" class="box box-secound">
              <div class="box-body">
              <label for="">Actualizar luego de <strong>procesar</strong> una Notificación </label>
              <a data-toggle="tooltip" data-placement="top" title="Actualizar lista" class="btn btn-primary btn-sm" href="main.php?module=3">
                   <i style="color:#000" class="glyphicon glyphicon-refresh"></i>
               </a>
              <!-- <i style="color:#000" class="glyphicon glyphicon-refresh"><strong> (Presionar tecla F5)</strong></i>-->
              </div>
              </div>
            <thead>
              <tr>
			<th scope=col>Usuario</th>
      <th scope=col>Fecha facturacion</th>
      <th scope=col>Fecha vencimiento</th>
      <th scope=col>Año</th>
      <th scope=col>Mes</th>
      <th scope=col>días</th>

      <th scope=col><strong>Procesar</strong></th>
              </tr>
            </thead>
            <tbody>
            <?php  
        
            $query = mysqli_query($mysqli, "SELECT CONCAT(PerNomPri, ' ', PerApePri, ' ', PerApeSeg) AS Usuario,
            zon.ZonDsc AS Zona,
            cli.CliCod AS Codigo_Cliente,
            CuoAnio AS Anio, 
            CuoMes AS Mes, 
            TipoCuo, 
            TipIvaDsc, 
            CuoVen AS Fecha_vencimiento, 
            CuoCan AS Fecha_pago,
            CuoFchAlt AS Fecha_facturacion,
            TipoCuoMnt AS monto,
            DATEDIFF(NOW(),CuoVen) AS dias
            FROM cuotas cuo, clientes cli, personas pers, zonas zon, tipoiva tipiva
            WHERE DATEDIFF(NOW(),CuoVen) BETWEEN 90 AND 119
            AND cuo.CliCod=cli.CliCod
            AND zon.ZonCod=cli.CliZona
            AND cli.PerCi=pers.PerCi
            AND tipiva.TipIvaCod=cuo.TipIvaCod
            AND CuoCan = '1000-01-01'
            AND TipoCuo=1
            AND Notificacion IS NULL")
                                            or die('error: '.mysqli_error($mysqli));  

            while ($data = mysqli_fetch_assoc($query)) { 
              //$precio_compra = format_rupiah($data['precio_compra']);
           //   $precio_venta = format_rupiah($data['precio_venta']);
           $Usuario=$data['Usuario'];
           $Fecha_facturacion= $data['Fecha_facturacion'];
           $Fecha_vencimiento= $data['Fecha_vencimiento'];
           $Mes= $data['Mes'];
           $dias= $data['dias'];
           $anio= $data['Anio'];

           echo "<tr>
                      <td width='150' class='center'>$Usuario</td>
                      <td width='50' class='center'>$Fecha_facturacion</td>
                      <td width='50' class='center'>$Fecha_vencimiento</td>
                      <td width='50' class='center'>$anio</td>
                      <td width='50' class='center'>$Mes</td>
                      <td width='50' class='center'>$dias</td>";
?>
              <td width="20" class="center">
               <a data-toggle="tooltip" data-placement="top" title="Imprimir Notificación" class="btn btn-warning btn-sm" 
                  href="modules/3/print.php?act=imprimir&CliCod=<?php echo $data['Codigo_Cliente']; ?>" target="_blank">
                  <i style="color:#000" class="fa fa-print"></i>
                </a>
              </td>  
     
 <?php
   echo " </tr>";
 }
 ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content
