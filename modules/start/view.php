


<section class="content-header">
  <h1>
    <i class="fa fa-home icon-title"></i> Inicio
  </h1>
  <ol class="breadcrumb">
    <li><a href="?module=start"><i class="fa fa-home"></i> Inicio</a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-12 col-xs-12">
      <div class="alert alert-info alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <p style="font-size:15px">
          <i class="icon fa fa-user"></i> Bienvenido/a <strong><?php echo $_SESSION['USUNOM']; ?></strong>
        </p>        
      </div>
    </div>  
  </div>

  
 
  <div class="row">
 
    <div class="col-lg-12 col-xs-6">    
   <!--5 -->
   <div class="col-lg-4 col-xs-4">
      <!-- small box -->
      <div style="background-color:#D7DF01;color:#fff" class="small-box">
        <div class="inner">
          <?php   
 
          $query = mysqli_query($mysqli, "SELECT COUNT( * ) AS numero FROM vista_imprimir_2
          WHERE Notificacion is null;")
                                          or die('Error '.mysqli_error($mysqli));
          $data = mysqli_fetch_assoc($query);
          ?>

          <h3><?php  echo $data['numero'];?></h3>
          <ul>
            <h3> Usuarios</h3>
            <h2> Morosidad </h2>
            <h2> de 2 meses  </h2>
          </ul>
        </div>
        <div class="icon">
          <i class="fa fa-file-pdf-o"></i>
        </div>
          <a href="?module=2" class="small-box-footer" title="Imprimir Notificación" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
        </div>
    </div>


    
   <!--5 -->
   <div class="col-lg-4 col-xs-4">
      <!-- small box -->
      <div style="background-color:#DF7401;color:#fff" class="small-box">
        <div class="inner">
          <?php   
 
          $query = mysqli_query($mysqli, "SELECT COUNT( * ) AS numero FROM vista_imprimir_3 
          WHERE Notificacion is null;")
                                          or die('Error '.mysqli_error($mysqli));
          $data = mysqli_fetch_assoc($query);
          ?>

          <h3><?php  echo $data['numero'];?></h3>
          <ul>
            <h3> Usuarios</h3>
            <h2> Morosidad </h2>
            <h2> de 3 meses  </h2>
          </ul>
        </div>
        <div class="icon">
          <i class="fa fa-file-pdf-o"></i>
        </div>
          <a href="?module=3" class="small-box-footer" title="Imprimir Notificación" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
        </div>

        </div>

        <div class="col-lg-4 col-xs-4">
      <!-- small box -->
      <div style="background-color:#DF0101;color:#fff" class="small-box">
        <div class="inner">
          <?php   
 
          $query = mysqli_query($mysqli, "SELECT COUNT( * ) AS numero FROM vista_imprimir_desconexion;")
                                          or die('Error '.mysqli_error($mysqli));
          $data = mysqli_fetch_assoc($query);
          ?>

          <h3><?php  echo $data['numero'];?></h3>
          <ul>
            <h3> Usuarios</h3>
            <h2> Morosidad </h2>
            <h2> Desconexión  </h2>
          </ul>
        </div>
        <div class="icon">
          <i class="fa fa-file-pdf-o"></i>
        </div>
          <a href="?module=desconexion" class="small-box-footer" title="Imprimir Notificación" data-toggle="tooltip"><i class="fa fa-plus"></i></a>
        </div>
<!-- Final-->

 <div class="row">
    <div class="col-lg-4 col-xs-6">
      </div>
      </div>
            <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
             <!--   <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                <div class="dropdown no-arrow">
                  <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                  </a>
                  <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                    <div class="dropdown-header">Dropdown Header:</div>
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Something else here</a>-->
                  </div>
                </div>
              </div>
    </div>
  </div><!-- /.row -->

</section><!-- /.content -->

