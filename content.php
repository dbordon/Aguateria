<?php
require_once "config/database.php";
require_once "config/fungsi_tanggal.php";
require_once "config/fungsi_rupiah.php";


if (empty($_SESSION['USUNOM']) && empty($_SESSION['UsuPasswd'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
else {
	if ($_GET['module'] == 'start') {
		include "modules/start/view.php";
	}

		elseif ($_GET['module'] == '2') {
		include "modules/2/view.php";
	}

	elseif ($_GET['module'] == '2') {
		include "modules/2/form.php";
	}

	elseif ($_GET['module'] == '3') {
		include "modules/3/view.php";
	}
	
	elseif ($_GET['module'] == '3') {
		include "modules/3/form.php";
	}

	elseif ($_GET['module'] == 'desconexion') {
		include "modules/desconexion/view.php";
	}

	elseif ($_GET['module'] == 'desconexion') {
		include "modules/desconexion/form.php";
	}

}
?>
