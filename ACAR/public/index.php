
<?php
	require_once '../app/init.php';
	$app = new App;
  if ($_SERVER['REQUEST_URI'] == "/ACAR/public/" ||
   $_SERVER['REQUEST_URI'] == "/ACAR/public/index.php")
    require_once './welcome.php';
?>