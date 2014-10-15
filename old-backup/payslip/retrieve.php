<?php 

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'payslip');
 
@$conn = mysql_connect (DB_SERVER, DB_USER, DB_PASSWORD);
mysql_select_db (DB_NAME,$conn);
if(!$conn){
    die( "Sorry! There seems to be a problem connecting to our database.");
}
$month = time();
$query = "SELECT * FROM contacts WHERE id=".$_REQUEST['id'];
$result = mysql_query($query);

while($row = mysql_fetch_assoc($result)){

    foreach($row as $key => $val){
        echo $key . ": " . $val . "<BR />";
		
		}
	//file_put_contents("folder/type.html", $row);
	  
}
?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>

</body>
</html>
