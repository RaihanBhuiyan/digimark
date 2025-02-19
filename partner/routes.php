<?php
//print_r($_SERVER);
//echo "http://" . $_SERVER['SERVER_NAME'];

// echo $_SERVER['REQUEST_URI'];
$baseUrl = 'https://www.digimarkbd.com/partner/';
$path = trim($_SERVER['REQUEST_URI']);
$path = parse_url($path, PHP_URL_PATH);
$litePath = explode('/', $path);
// echo $litePath[0]."--".$litePath[1]."--".$litePath[2]."--".$litePath[3]."--".$litePath[4]."--".$litePath[5];
$routes = [
  '' => 'index.php',
  'Dashboard' => 'index.php',
  'pricelist' => 'pricelist.php',
  'software' => 'software.php',
  'usermanual' => 'usermanual.php',
  'tutorial' => 'tutorial.php',
  'Credentials' => 'changeCredentials.php',
  'Logout' => 'logout.php'
];
if (array_key_exists($litePath[2], $routes)) {
  require $routes[$litePath[2]];
}else {
  require 'error.php';
}
?>