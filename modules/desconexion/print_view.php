<?php 
    require_once "../../config/database.php";
    if($_GET['act']=='imprimir'){
        if(isset($_GET['CliCod'])){
            $codigo = $_GET['CliCod'];
            //Cabecera de compra
            $notificacion = mysqli_query($mysqli, "SELECT *FROM vista_imprimir_desconexion WHERE Codigo_Cliente=$codigo")
                                                    or die('Error'.mysqli_error($mysqli));
                                                    while($data = mysqli_fetch_assoc($notificacion)){
                                                        $Zona = $data['Zona'];
                                                        $Medidor = $data['Medidor'];
                                                        $DirCalle = $data['DirCalle'];
                                                        $DirCalle1 = $data['DirCalle1'];
                                                        $DirCalle2 = $data['DirCalle2'];
                                                        $Cuenta_Corriente = $data['Cuenta_Corriente'];
                                                        $Codigo_Cliente=$data['Codigo_Cliente'];
                                                        $Usuario = $data['Usuario'];
                                                        $Fecha_facturacion = $data['Fecha_facturacion'];
                                                        $Fecha_vencimiento = $data['Fecha_vencimiento'];
                                                        $hora = $data['dias'];                                                  
    }
    //Detalle de compra
    $total = mysqli_query($mysqli, "SELECT SUM(TipoCuoMnt) as Total FROM cuotas 
    WHERE CliCod=$codigo AND DATEDIFF(NOW(),CuoVen) BETWEEN 1 AND 1000")
    or die('Error'.mysqli_error($mysqli));
    while($data2 = mysqli_fetch_assoc($total)){
    $Total = $data2['Total'];}

}
    }
?> 
<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title> Notificación</title>
        <link rel="stylesheet" type="text/css" href="css/style.css">    
        </head>
    <body>
        <div align='center'>
            <div class=logo>
                <img class="imglogo" src="img/agua.png" alt="">
            </div>
        <div class="fecha">
            <?php 
            $diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
             
            echo "San Lorenzo, ". $diassemana[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ;
            ?>
        </div>
        <h1 align="center   ">NOTIFICACIÓN DE CORTE</h1>
        <div align="center" class="usuario">
        <strong>SEÑOR/RA: <?php echo $Usuario; ?></strong>
        <br><br><br>
        <strong>Código de Usuario: <?php echo $Codigo_Cliente; ?></strong>     
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <strong>Zona: <?php echo $Zona; ?></strong>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <strong>Medidor Nro: <?php echo $Medidor; ?></strong>
        </div>
        <div class="zona">
        <strong>Deuda Acumulada:Gs.  <?=number_format($Total,0,',','.');?>-</strong>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <strong>C.C.C.:  <?=$Cuenta_Corriente;?></strong>
        <br><br><br>
        Dirección:  <strong><?=$DirCalle.", ".$DirCalle1.", ".$DirCalle2;?></strong>
        </div>
        
        <div class="texto">
            <p>Cumplimos en notificarle, que en la fecha hemos procedido al corte del servicio de agua potable de su propiedad.</p>
            <p>Por tal motivo le invitamos a pasar a regularizar su situación, abonando su cuenta pendiente en cualquiera de los<br>
            puntos de cobranzas PractiPago, AquiPago o Pago Express.</p>
            <p> <strong>PARA PROCEDER A LA REPOSICIÓN DEL SERVICIO, INDEFECTIBLEMENTE DEBERA ABONAR <br>LA TASA DE CORTE Y RECONEXION</strong>.</p>
            <br>
            <br>
            </div>
            <p align=center>Atentamente,</p>
            <br>
            <img align=center src="img/firma_administracion.png" alt="">
            <p align=center><u>La Administración</u></p>

        </div>    
    </body>
</html>
<?php 
    $estado="PROCESADO";
    $actualizar_estado=mysqli_query($mysqli, "UPDATE cuotas SET Notificacion='$estado' WHERE CliCod=$codigo 
    AND DATEDIFF(NOW(),CuoVen) BETWEEN 120 AND 1000")
    or die('Error'.mysqli_error($mysqli));
?>