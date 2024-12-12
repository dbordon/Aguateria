<?php 
    require_once "../../config/database.php";
    if($_GET['act']=='imprimir'){
        if(isset($_GET['CliCod'])){
            $codigo = $_GET['CliCod'];
            //Cabecera de compra
            $notificacion = mysqli_query($mysqli, "SELECT *FROM vista_imprimir_2 WHERE Codigo_Cliente=$codigo")
                                                    or die('Error'.mysqli_error($mysqli));
                                                    while($data = mysqli_fetch_assoc($notificacion)){
                                                        $Zona = $data['Zona'];
                                                        $Codigo_Cliente=$data['Codigo_Cliente'];
                                                        $Usuario = $data['Usuario'];
                                                        $Fecha_facturacion = $data['Fecha_facturacion'];
                                                        $Fecha_vencimiento = $data['Fecha_vencimiento'];
                                                        $hora = $data['dias'];                                                  
    }
    //Detalle de compra
    $total = mysqli_query($mysqli, "SELECT SUM(TipoCuoMnt) as Total FROM cuotas 
    WHERE CliCod=$codigo AND DATEDIFF(NOW(),CuoVen) BETWEEN 1 AND 89 ")
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
        <title> Factura de compra</title>
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
        <div align="center" class="usuario">
        Estimado/a: <?php echo $Usuario; ?>
        </div>
        <div class="zona">
        Zona: <?php echo $Zona;  ?>
        </div>
        <div class="texto">
            <p>De nuestra consideración</p>
            <p>Nuestros informes indican que usted adeuda un pago por la suma de Gs.<strong><?=number_format($Total,0,',','.');?></strong></p>
            <p> Si ya canceló esta deuda, no tenga en cuenta la presente notificación. Si todavía no </p>
            <p> realizó el pago, le sugerimos pase por cualquier local de PractiPago con su </p>
            <p> Código Nro. de usuario: <strong><?=$Codigo_Cliente;?> </strong></p>
            <br>
            <p>Si tuviera algún problema con su factura, sírvase llamarnos al número que figura a</p>
            <p>continuación <strong>0981 386 356</strong>.</p>
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
    AND DATEDIFF(NOW(),CuoVen) BETWEEN 60 AND 89")
    or die('Error'.mysqli_error($mysqli));
   
?>