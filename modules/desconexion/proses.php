
<?php
session_start();


require_once "../../config/database.php";

if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}

else {
    if ($_GET['act']=='delete') {
        if (isset($_GET['id_forseminarios'])) {

                $usuario=$_SESSION['id_user'];
                 $codigo=$_GET['id_forseminarios'];
                 $certificacion='NO'; 
                 $costo='0';
                 $estado="ANULADO";
                $query = mysqli_query($mysqli, "UPDATE  forseminarios SET certificacion= '$certificacion',
                                                                    costo= $costo,
                                                                    estado= '$estado',
                                                                    id_user= $usuario
                                                              WHERE id_forseminarios = $codigo")
                                                or die('error: '.mysqli_error($mysqli));   
                if ($query) {
                    

                header("location: ../../main.php?module=imprimircertificadosseminarios&alert=3");
                }
                else{
                    header("location: ../../main.php?module=imprimircertificadosseminarios&alert=4");
                }         
            }
        }

        if ($_GET['act']=='update') {
            if (isset($_GET['id_forseminarios'])) {
    
                    $usuario=$_SESSION['id_user'];                   
                     $codigo=$_GET['id_forseminarios'];
                     $estado="PROCESADO";    
                    $query = mysqli_query($mysqli, "UPDATE  forseminarios SET estado= '$estado',
                                                                            id_user= $usuario
                                                                    WHERE id_forseminarios = $codigo")
                                                        or die('error: '.mysqli_error($mysqli));         
        
                    if ($query) {
                        header("location: http://www.utic.edu.py/webutic/modules/imprimircertificadosseminarios/diploma/diploma_ver_cert.php?&id=$codigo");
                        die();
                       
                    }
                    else{
                        header("location: ../../main.php?module=imprimircertificadosseminarios&alert=4");
                    }         
                }
            }
    
    }    
       
?>