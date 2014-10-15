<?php
define('DB_SERVER', 'localhost');
define('DB_USER', 'basspris_paysli');
define('DB_PASSWORD', 'Bass2013!');
define('DB_NAME', 'basspris_payroll_master');
 
@$conn = mysql_connect (DB_SERVER, DB_USER, DB_PASSWORD);
mysql_select_db (DB_NAME,$conn);
if(!$conn){
    die( "Sorry! There seems to be a problem connecting to our database.");
}
 
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
            if($data[0] !='emp_code'){
                mysql_query("INSERT INTO payslip(
                emp_code,
                emp_name,
                basic,
                hra,
				edu_allowance,
				utility_allowance,
				spl_allowance,
				working_days,
				gross,
				basic_da,
				house_on_rent,
				gedu_allowance,
				gutility_allowance,
				gspl_allowance,
				total,
				pf,
				esi,
				pt,
				total_ded,
				net,
				month
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
					'".mysql_real_escape_string($data[9])."',
					'".mysql_real_escape_string($data[10])."',
					'".mysql_real_escape_string($data[11])."',
					'".mysql_real_escape_string($data[12])."',
					'".mysql_real_escape_string($data[13])."',
					'".mysql_real_escape_string($data[14])."',
					'".mysql_real_escape_string($data[15])."',
					'".mysql_real_escape_string($data[16])."',
					'".mysql_real_escape_string($data[17])."',
					'".mysql_real_escape_string($data[18])."',
					'".mysql_real_escape_string($data[19])."',
					'".mysql_real_escape_string($data[20])."'
                )")or die(mysql_error());
            }
 
 
    $tot++;}
}
fclose($handle);
$content.= "<div class='success' id='message'> CSV File Imported, $tot records added </div>";
 
}// end no error
}//close if isset upfile
 
$er = errors($error);
$content.= <<<EOF
<h3>Import CSV Data</h3>
$er
<form enctype="multipart/form-data" action="" method="post">
    File:<input name="uploaded" type="file" maxlength="20" /><input type="submit" name="upfile" value="Upload File">
</form>
<a href="http://www.basspris.com/payslip/enterval.php">Enter ID</a>
EOF;
echo $content;
?>