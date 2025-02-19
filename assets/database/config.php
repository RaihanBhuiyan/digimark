<?php
DEFINE('dbhost','localhost');
DEFINE('dbuser','u718747383_dgmark_test');
DEFINE('dbpass','uI1nbnz#');
DEFINE('dbname','u718747383_dgmark_test');

// DEFINE('dbhost','localhost');
// DEFINE('dbuser','root');
// DEFINE('dbpass','');
// DEFINE('dbname','digimark_db');
//DEFINE('dbname','dgmark_db_test');

$dbcon = mysqli_connect(dbhost,dbuser,dbpass,dbname);
//$dbcon2 = mysqli_connect(dbhost,dbuser,dbpass,dbname2);

if(!$dbcon){
die('Error connecting to mysql');
}
//echo 'you have connected successfully';
?> 