<?php
error_reporting();
include_once("include/config.php");
include("include/functions.php");

 
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
                mysql_query("REPLACE INTO emp_details(
emp_id,emp_name,branch_loc,doj,bank_ac,bank_branch, desig,dpt_name,repo_man,pf,esi,mail_id
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
					'".mysql_real_escape_string($data[19])."'
                )")or die(mysql_error());
				
            }
			if($data[0] !='Emp.Code'){
			mysql_query("REPLACE INTO test1(emp_id,val1,val2,val3,val4,val5,val6,val7,val8,desig,dpt_name,branch_loc,repo_man,mail_id)VALUES
				(	'".mysql_real_escape_string($data[0])."', 	
				 	'".mysql_real_escape_string($data[11])."',
					'".mysql_real_escape_string($data[12])."',
					'".mysql_real_escape_string($data[13])."',
					'".mysql_real_escape_string($data[14])."',
					'".mysql_real_escape_string($data[15])."',
					'".mysql_real_escape_string($data[16])."',
					'".mysql_real_escape_string($data[17])."',
					'".mysql_real_escape_string($data[18])."',
					'".mysql_real_escape_string($data[6])."',
					'".mysql_real_escape_string($data[7])."',
					'".mysql_real_escape_string($data[2])."',
					'".mysql_real_escape_string($data[8])."',
					'".mysql_real_escape_string($data[19])."')")or die(mysql_error());
				mysql_query("REPLACE INTO company_branch(branch_name)VALUES ('".mysql_real_escape_string($data[2])."')");
				mysql_query("REPLACE INTO company_dept(dept_name)VALUES ('".mysql_real_escape_string($data[7])."')");
				mysql_query("REPLACE INTO company_desg(des_name)VALUES ('".mysql_real_escape_string($data[6])."')");
			}
			
 
 
    $tot++;}
}
fclose($handle);

$content.= "<div class='success' id='message'> CSV File Imported, $tot records added </div>";
Header('Location:http://www.basspris.com/pris/CompanyEmployee.php');
 
}// end no error
}//close if isset upfile
 
$er = errors($error);
$content.= <<<EOF
<h3>Import CSV Data</h3>
$er
EOF;
echo $content;

//Header('Location:http://localhost/payroll_final/payroll_tester/CompanyEmployee.php');
Header('Location:http://www.basspris.com/pris/CompanyEmployee.php');



?>