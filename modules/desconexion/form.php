 <?php  
 
if ($_GET['form']=='add') { ?> 

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Agregar Evento Webinars
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=webinars"> Webinars </a></li>
      <li class="active"> Más </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal"  action="modules/webinars/proses.php?act=insert" method="POST" enctype="multipart/form-data">
            <div class="box-body">
              <?php  

      
              $query_id = mysqli_query($mysqli, "SELECT MAX(id_webinars) AS id FROM webinars")
                                                or die('error '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
            
                  $data_id = mysqli_fetch_assoc($query_id);
                  $codigo    = $data_id['id']+1;
              } else {
                  $codigo = 1;
              }


             /* $buat_id   = str_pad($codigo, 6, "0", STR_PAD_LEFT);
              $codigo = "$buat_id";*/
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">Codigo</label>
                <div class="col-sm-5">
                  <input type="numeric" class="form-control" name="codigo" value="<?php echo $codigo; ?>" readonly required>
                </div>
              </div>

          <!-- Hasta aqui el codigo -->

         <!--- Combo sedes-->      
          <div class="form-group">
          <label class="col-sm-2 control-label" for="sede">Sede</label>
          <div class="col-sm-5">
          <select name="sede"  class="form-control" required>
          <option value=""></option>
        <?php
          include '../../config/database.php';

            $query=mysqli_query($mysqli, "select *from sedes");             
            while($dato= mysqli_fetch_assoc($query))
            {                 
            echo "<option value='".$dato['id_sede']."'";
            if($_POST['sede']==$dato['id_sede'])
            echo "SELECTED";
            echo ">";
            echo utf8_encode($dato['descrip_sede']);
            echo "</option>";            
            }
        ?>
          </select>
          </div>
          </div>
      <!--- fin combo sedes-->

          <!--- Combo Carreras-->      
          <div class="form-group">
          <label class="col-sm-2 control-label" for="carrera">Organización</label>
          <div class="col-sm-5">
          <select name="organizacion"  class="form-control" required>
          <option value=""></option>
        <?php
          include '../../config/database.php';

            $query=mysqli_query($mysqli, "select *from organizacion_webinar");             
            while($dato= mysqli_fetch_assoc($query))
            {                 
            echo "<option value='".$dato['id_orga']."'";
            if($_POST['organizacion']==$dato['id_orga'])
            echo "SELECTED";
            echo ">";
            echo utf8_encode($dato['descrip_orga']);
            echo "</option>";            
            }
        ?>
          </select>
          </div>
          </div>
      <!--- fin combo sedes-->
      <div class="form-group">
                                <label class="col-sm-2 control-label"><strong>Fecha del evento</strong></label>
                                <div class="col-sm-5">
                                    <input type="date" class="form-control" name="fecha_publicacion" value="" autocomplete="off">
                                </div>
                            </div>

      <div class="form-group">
                                <label class="col-sm-2 control-label" for="hora"><strong>Hora</strong></label>
                                <div class="col-sm-5">
                                    <select name="hora"  class="form-control"  >              
                                       <option >     </option>
                                        <option value="08:00" >08:00 hs</option>
                                        <option value="09:00" >09:30 hs</option>
                                        <option value="10:00" >10:00 hs</option>
                                        <option value="11:30" >11:00 hs</option>
                                        <option value="12:00" >12:00 hs</option>
                                        <option value="13:30" >13:00 hs</option>
                                        <option value="14:00" >14:00 hs</option>
                                        <option value="15:00" >15:00 hs</option>
                                        <option value="16:00" >16:00 hs</option>
                                        <option value="17:00" >17:00 hs</option>
                                        <option value="18:30" >18:00 hs</option>
                                        <option value="19:00" >19:00 hs</option>
                                        <option value="20:00" >20:00 hs</option>                                    
                                    </select>  

                                    </div>
          </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">Tema</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="tema" placeholder="Título de la noticia" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Autores</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="autores" placeholder="Autor/res" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Costo General</label>
                <div class="col-sm-5">
                  <input type="numeric" class="form-control" name="costogeneral" placeholder="monto" autocomplete="of" >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Costo Alumnos</label>
                <div class="col-sm-5">
                  <input type="numeric" class="form-control" name="costoalumnos" placeholder="monto" autocomplete="of" >
                </div>
              </div>

              
             

              <div class="form-group">
                <label class="col-sm-2 control-label">Afiche</label>
                <div class="col-sm-5">
                <input type="file" class="form-control-file" name="foto"> 
                </div>
              </div>



            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="main.php?module=webinars" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}


elseif ($_GET['form']=='edit') { 
  if (isset($_GET['id'])) {

      $query = mysqli_query($mysqli, "SELECT *FROM v_webinars where id_webinars='$_GET[id]'") 
                                      or die('error: '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
    }
?>

  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Publicar en la Web Ciclo Webinars
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=start"><i class="fa fa-home"></i> Inicio </a></li>
      <li><a href="?module=webinars"> Noticias </a></li>
      <li class="active"> Webinars </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/webinars/proses.php?act=update" method="POST"  enctype="multipart/form-data">
            <div class="box-body">
              
              <div class="form-group">
                <div class="col-sm-1">
                  <input type="hidden" class="form-control" name="codigo" value="<?php echo $data['id_webinars']; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tema</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="tema"   value="<?php echo $data['tema'];?>"  >
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Autor/es</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="autores" autocomplete="off"   value="<?php echo $data['autores'];?>">
                </div>
              </div>    
            
              <div class="form-group">
                                <label class="col-sm-2 control-label"><strong>Fecha del evento</strong></label>
                                <div class="col-sm-5">
                                    <input type="date" class="form-control" name="fecha_publicacion" value="<?php echo $data['fecha_publicacion']?>" autocomplete="off">
                                </div>
                            </div>
     

            <div class="form-group">
                                <label class="col-sm-2 control-label" for="hora"><strong>Hora</strong></label>
                                <div class="col-sm-5">
                                    <select name="hora"  class="form-control">              
                                       <option value="<?php echo $data['hora'];?>">   <?php echo $data['hora'];?> </option>
                                        <option value="08:00" >08:00 hs</option>
                                        <option value="09:00" >09:30 hs</option>
                                        <option value="10:00" >10:00 hs</option>
                                        <option value="11:30" >11:00 hs</option>
                                        <option value="12:00" >12:00 hs</option>
                                        <option value="13:30" >13:00 hs</option>
                                        <option value="14:00" >14:00 hs</option>
                                        <option value="15:00" >15:00 hs</option>
                                        <option value="16:00" >16:00 hs</option>
                                        <option value="17:00" >17:00 hs</option>
                                        <option value="18:30" >18:00 hs</option>
                                        <option value="19:00" >19:00 hs</option>
                                        <option value="20:00" >20:00 hs</option>                                    
                                    </select>  

                                    </div>
          </div>
   
          <div class="form-group">
                <label class="col-sm-2 control-label">Afiche</label>
                <div class="col-sm-5">
                <img src="http://localhost/webnoticias/<?php echo $data['foto'];?>" alt="imagen de afiche" width="450px" >
                </div>
              </div>  

              <div class="form-group">
                <label class="col-sm-2 control-label">Insertar Video</label>
                <div class="col-sm-9">
                <textarea class="form-control" name="video" rows="10" ><?php echo $data['video']?></textarea>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Enlace de Facebook</label>
                <div class="col-sm-9">
                <textarea class="form-control" name="enlace" rows="10"><?php echo $data['enlace']?></textarea>
                </div>
              </div>
                

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                  <a href="main.php?module=webinars" class="btn btn-default btn-reset">Cancelar</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>

