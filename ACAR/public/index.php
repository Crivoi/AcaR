
<?php
	require_once '../app/init.php';
	$app = new App;
  if ($_SERVER['REQUEST_URI'] == "/petrimonials/public/" ||
   $_SERVER['REQUEST_URI'] == "/petrimonials/public/index.php")
    require_once './welcome.php';
?>