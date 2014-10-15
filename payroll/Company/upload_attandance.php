
<?php
error_reporting();
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
			 
			require_once ("include/Excel/excel_reader2.php");
			$data = new Spreadsheet_Excel_Reader($readFileName);
	
			$num_row = $data->rowcount($sheet_index=0);
			$index = 2 ;
			while($index != $num_row){
			$month = $data->val($index, 'D'); 
			$name = $data->val($index, 'C'); 
			$id = $data->val($index, 'B'); 
			//$id = 'BTIP01'.$id;
			
			$wdays = $data->val($index, 'E'); 
			$pdays = $data->val($index, 'F'); 
			$adays = $data->val($index, 'G'); 
			
			$lop = $data->val($index, 'H'); 
			$yr = $data->val($index, 'I'); 
			
			$query = "insert into emp_attendance (emp_id, working_days, present_days, no_leave, month, year, lop_days) values ('$id', $wdays, $pdays, $adays, '$month', $yr, $lop)";
			//echo '<br />';
			$result = mysql_query($query);
			echo mysql_error();
			
			$index ++ ; 
			}
		}
	}
	$msg = 'Data Updated Successfully';
	//header("location:".$_GET['url']);
}
?>
