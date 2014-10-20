<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'basspris_prisadm');
define('DB_PASSWORD', 'Bass1987$');
define('DB_DATABASE', 'basspris_bassadmin');
$connection = @mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
$base_url='http://www.basspris.com/mail-verification/';
?>
