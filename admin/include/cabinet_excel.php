<?php
error_reporting();
//include_once("config.php");
//include_once("functions.php");

if(isset($_POST['ButNewEmpExcel']) and $_SERVER['REQUEST_METHOD'] == "POST")
{
	//$url = $_GET['url'];
	
	if(!isset($_FILES['txtexcel']) || !is_uploaded_file($_FILES['txtexcel']['tmp_name']))
	{
			die('Something went wrong with Upload!'); // output error when above checks fail.
	}
	else
	{
		$acceptable_extensions[0] = "XLS";
		$acceptable_extensions[1] = "xls";
		$validated = 1;
			
		if($_FILES && $_FILES['txtexcel']['name'])
		{
			$file_info = pathinfo($_FILES['txtexcel']['name']);
			$acceptable_ext = 0;
	
			for($x = 0; $x < count($acceptable_extensions); $x++)
			{
				if($file_info['extension'] == $acceptable_extensions[$x])
				{
					$acceptable_ext = 1;
				}
			}
			if(!$acceptable_ext)
			{
				$validated = 0;
			}
		}
		else
		{
			$validated = 0;
		}
		
		if($validated)
		{
			 $file_info = pathinfo($_FILES['txtexcel']['name']);
			 $fileName = $_FILES['txtexcel']['name'];
			 
			$newname = "upload_excel_data/";
			$file_name = explode(".",$fileName);
			$extension1 = getExtension($fileName);
			$extension1 = strtolower($extension1);
			$newname1 = $newname.$file_name[0].".".$extension1;
			if(file_exists($newname1)) {
				$time = date("H-i-s");
				$newname1 = $newname.$file_name[0]."-".$time.".".$extension1;
			}
			//echo $newname1;
			$copied = copy($_FILES['txtexcel']['tmp_name'], $newname1);
			if (!$copied) 
			{
				echo '<h1>Copy unsuccessfull!</h1>';
				$errors=1;
			}
			$readFileName = $newname1;
			 
			require_once ("Excel/excel_reader2.php");
			$data = new Spreadsheet_Excel_Reader($readFileName);
			$data->setOutputEncoding('UTF8');
			
			$num_row = $data->rowcount($sheet_index=0);
			$index = 2 ;
			while($index != $num_row){
			
			$fname = $data->val($index, 'C');
			$gender = $data->val($index, 'D'); 
			$pwd = $data->val($index, 'E'); 
			$name = $data->val($index, 'B');
			$mail = $data->val($index, 'F'); 
			
			$desg = $data->val($index, 'G');
			$desg = GetDesignationCode($desg);
			
			$dept = $data->val($index, 'H'); 
			$dept = GetDepartmentCode($dept);
			//echo "<br />";
			$doj = $data->val($index, 'F');
			
			$doj = date('Y-m-d', strtotime($doj));
			$dob = $data->val($index, 'C'); 
			$dob = date('Y-m-d', strtotime($dob));
			
			$pf_no = $data->val($index, 'J'); 
			$esi_no = $data->val($index, 'K');
			
			$addr = $data->val($index, 'L'); 
			$hphone = $data->val($index, 'M'); 
			$mobile = $data->val($index, 'N'); 
			
			$bname = $data->val($index, 'O'); 
			$bacc = $data->val($index, 'P'); 
			$bbranch = $data->val($index, 'Q'); 
			
			//$id = $data->val($index, 'A');
			
			//$id = 'BTIP01'.$id;
			
			$nid = randomPrefix(3);
			$id = getEmployeIdPrefix().$nid;
			$check = checkrandom($id); 
			while ( $check == false ) 
			{			
				$nid = randomPrefix(3);
				$id = getEmployeIdPrefix().$nid;
				$check = checkrandom($id);
			}
			
			//echo $id;
			$query = "insert into emp_login (user_pwd, disp_name, user_name) values ('".encrypt_decrypt('encrypt', $pwd)."', '$name', '$id')";
			$result = executeStatement($query);
			echo mysql_error();
			
			$query2 = "insert into emp_details (emp_id, desig_code, dept_code, dob, doj, telephone, mobile, email_id, addr) values ('$id', '$desg', '$dept', '$dob', '$doj', '$hphone', '$mobile', '$mail', '$addr')";
			$result2 = executeStatement($query2);
			echo mysql_error();
			
			$query4 = "insert into emp_comp_details (emp_id, pf_no, esi_no, bank_name, bank_acc_no, bank_branch) values ('$id', '$pf_no', '$esi_no', '$bname', '$bacc', '$bbranch')";
			$result4 = executeStatement($query4);
			echo mysql_error();
			
			$index ++ ; 
			}
		}
	}
	$msg = 'Data Updated Successfully';
	//header("location:".$_GET['url']);
}
?>
<script type="text/javascript">
////alert('Record Inserted successfully');
//location.href='<?php //echo $_GET['url']; ?>';
//echo "Record inserted successfully...";
</script>