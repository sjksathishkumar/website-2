<?php
if ($_FILES["file"]["error"] >0) {
  echo "Error: " . $_FILES["file"]["error"] . "<br>";
} else {


 $MY_FILE = $_FILES['file']['tmp_name'];

// To open the file and store its contents in $file_contents
$file = fopen($MY_FILE, 'r');
$file_contents = fread($file, filesize($MY_FILE));
fclose($file);
/* We need to escape some stcharacters that might appear in  file_contents,so do that now, before we begin the query.*/

$file_contents = addslashes($file_contents);

// To add the file in the database
mysql_connect('localhost', 'root', '') or die("Unable to connect to database.");
mysql_select_db('basspris') or die("Unable to select the DB.");
mysql_query("INSERT INTO enquiry SET file_data='$file_contents'")
or die("MySQL Query Error: " . mysql_error() . "<br><br>". "The SQL was: $SQL<br><br>");
mysql_close();
echo "File INSERTED into files table successfully.";
//- See more at: http://www.creativedev.in/2012/01/storing-a-file-in-database/#sthash.tGarEYL7.dpuf

}
?>
<script language="javascript">
alert('Thanks for watching us.Get back soon')
</script>




