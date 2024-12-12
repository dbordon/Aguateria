
<?php  

require_once "config/database.php";


$query = mysqli_query($mysqli, "SELECT USUNOM FROM usuario WHERE USUCOD='$_SESSION[USUCOD]'")
                                or die('error: '.mysqli_error($mysqli));


$data = mysqli_fetch_assoc($query);
?>

<li class="dropdown user user-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <img src="images/user/user-default.png" class="user-image" alt="User Image"/>
    <span class="hidden-xs"><?php echo $data['USUNOM']; ?> <i style="margin-left:5px" class="fa fa-angle-down"></i></span>
  </a>
  <ul class="dropdown-menu">

    <li class="user-header">

      <p>
        <?php echo $data['USUNOM']; ?>
      </p>
    </li>
    
    <!-- Menu Footer-->
    <li class="user-footer">
      <div class="pull-left">
        <a style="width:80px" href="?module=profile" class="btn btn-default btn-flat">Perfil</a>
      </div>

      <div class="pull-right">
        <a style="width:80px" data-toggle="modal" href="#logout" class="btn btn-default btn-flat">Salir</a>
      </div>
    </li>
  </ul>
</li>