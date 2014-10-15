<?php

include_once("include/config.php");
$month = $_POST['month'];
$year = $_POST['year'];
function get_file_extension($file_name) {
    return end(explode('.',$file_name));
}
 
function errors($error){
    if (!empty($error))
    {
            $i = 0;
            while ($i < count($error)){
            $showError.= '<div class="msg-error">'.$error[$i].'</div>';
            $i ++;}
            return $showError;
    }// close if empty errors
} // close function
 
 
if (isset($_POST['upfile'])){
// check feilds are not empty
 
if(get_file_extension($_FILES["uploaded"]["name"])!= 'csv')
{
$error[] = 'Only CSV files accepted!';
}
 
if (!$error){
 
$tot = 0;
$handle = fopen($_FILES["uploaded"]["tmp_name"], "r");
while (($data = fgetcsv($handle, 100000, ",")) !== FALSE) {
    for ($c=0; $c < 1; $c++) {
 
            //only run if the first column if not equal to firstname
             if($data[0] !='Emp.Code'){
             $empatt = mysql_query("REPLACE INTO emp_attendance(
`emp_id`,`emp_name`,`leave`,`lop`,`ot`,`holiday_wages`,`incent`,`pt`,`advance`,`month`,`year`
					)VALUES(
                    '".mysql_real_escape_string($data[0])."',
                    '".mysql_real_escape_string($data[1])."',
                    '".mysql_real_escape_string($data[2])."',
                    '".mysql_real_escape_string($data[3])."',
					'".mysql_real_escape_string($data[4])."',
					'".mysql_real_escape_string($data[5])."',
					'".mysql_real_escape_string($data[6])."',
					'".mysql_real_escape_string($data[7])."',
					'".mysql_real_escape_string($data[8])."',
					'".$month[0]."',
					'".$year[0]."'
                )")or die(mysql_error());
				
            }
			     if($data[0] !='Emp.Code'){
              $emid =  mysql_query("INSERT INTO uploadid(`emp_id`,`month`,`year`)VALUES('".mysql_real_escape_string($data[0])."','".$month[0]."','".$year[0]."')")or die(mysql_error());
	}


    $tot++;}

}
fclose($handle);
$content.= "<div class='success' id='message'> CSV File Imported, $tot records added </div>";

header('Location: http://www.basspris.com/pris/calc.php');
 
}// end no error
}//close if isset upfile
 
$er = errors($error);
$content.= <<<EOF
<h3>Import CSV Data</h3>
$er
EOF;
echo $content;

Header('Location:http://www.basspris.com/pris/calc.php');


?>				   









