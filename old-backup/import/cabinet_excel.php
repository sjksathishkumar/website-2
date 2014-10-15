<?php
	//require_once ('../Models/Config/database.php');
	//require_once ('../Models/Config/config.php');
	//$dbConnect = new DatabaseConnect($dbConfig["hostName"],$dbConfig["userName"],$dbConfig["passWord"],$dbConfig["dataBase"]);
	//$dbConnect->connect();
	//require_once ('../Models/Config/cfg.constants.php');
	//require_once ('../admin/Views/var.php');
	//include('config/config.php');
	require_once('config/config.php');
	$readFileName = 'cabinet.xls';
	require_once('Excel/reader.php');
	
	
	$fileReader = new Spreadsheet_Excel_Reader();
	$fileReader->setUTFEncoder('iconv');
	$fileReader->setOutputEncoding('UTF-8');
	$fileReader->read($readFileName);
	$insert_string	=	'';
	
	$hospital_doc_id	=	'';
	//if(isset($_SESSION['user_type_manage']) && $_SESSION['user_type_manage'] == 2) { 
 	 $select_document	=	"SELECT * FROM document_id ";
  		$result	=	mysql_fetch_assoc(mysql_query($select_document));
	$hospital_doc_id	=	$result['document_id'];
	//}
	foreach($fileReader->sheets as $key=>$fileContent) {
				//echo "<pre>"; print_r($fileContent); echo "</pre>"; 
		if(isset($fileContent['cells']) && is_array($fileContent['cells'])) {
			$cellContent = $fileContent['cells'];
			foreach($cellContent as $keys=>$fileRows) {
				if($keys>1) {
				
					if(isset($fileRows[1]) && $fileRows[1]!='') $filename	=	$fileRows[1]; else  $filename	=	'';
					if(isset($fileRows[2]) && $fileRows[2]!='') $name		=	$fileRows[2]; else  $name	=	'';
					if(isset($fileRows[3]) && $fileRows[3]!='') $gender		=	$fileRows[3]; else  $gender	=	'';
					if(isset($fileRows[4]) && $fileRows[4]!='') $address	=	$fileRows[4]; else  $address	=	'';
					if(isset($fileRows[5]) && $fileRows[5]!='') $age		=	$fileRows[5]; else  $age	=	'';
					if(isset($fileRows[6]) && $fileRows[6]!='') $ref_by		=	$fileRows[6]; else  $ref_by	=	'';
					if(isset($fileRows[7]) && $fileRows[7]!='') $phone		=	$fileRows[7]; else  $phone	=	'';
					if(isset($fileRows[8]) && $fileRows[8]!='') $mobile		=	$fileRows[8]; else  $mobile	=	'';
					if(isset($fileRows[9]) && $fileRows[9]!='') $occupation	=	$fileRows[9]; else  $occupation	=	'';
					if(isset($fileRows[10]) && $fileRows[10]!='') $ip_number	=	$fileRows[10]; else  $ip_number	=	'';
					if(isset($fileRows[15]) && $fileRows[15]!='') $head			=	$fileRows[15]; else  $head	=	'';
					if(isset($fileRows[16]) && $fileRows[16]!='') $subhead		=	$fileRows[16]; else  $subhead	=	''; 
					
					
						
						$insert_file	=	"INSERT INTO `file_details` (`id`, `fk_head_id`, `fk_sub_id`, `filename`, `cellone`, `celltwo`, `cellthree`, `cellfour`, `cellfive`, `cellsix`, `cellseven`, `celleight`, `cellnine`, `created_dated`, `created_by`) VALUES ('', '".$head."', '".$subhead."', '".$filename."', '".$name."', '".$address."', '".$gender."', '".$ref_by."', '".$age."', '".$phone."', '".$mobile."', '".$occupation."', '".$ip_number."',  '', '1'); ";
						
					//echo $insert_file;
					mysql_query($insert_file);
					$insert_doc_id	=	mysql_insert_id();
					$user	=	"admin";
				
					$cur_date	=	date('Y-m-d H:i:s');
				
					$extension	=	"pdf";
            		
					$upload_file  = $insert_doc_id.".".$extension;
            		if(isset($fileRows[13]) && $fileRows[13]!='')  $create_on	=  $cur_date;  else  $create_on	=	'';
					if(isset($fileRows[14]) && $fileRows[14]!='') $create_by	=  $user; else  $create_by	=	'';
				
					
					$insert_document	=	"INSERT INTO `document_detail` (`id`, `fk_head_id`, `fk_sub_id`, `fk_file_id`, `document`, `created_dated`, `created_by`, `doc_upload`, `doc_status`, `opened_by`, `cell_10`, `doc_right`, `cell_11`, `cell_12`, `cell_13`,`cell_14`, `cell_15`, `cell_16`, `doc_ref_id`) VALUES ('', '".$head."', '".$subhead."', '".$insert_doc_id."', '".$filename."', '".$cur_date."', '".$create_by."', '', '', '', '', '', '', '',  '', '', '', '', '".$filename."'); ";
					
					
					mysql_query($insert_document);
					
					$get_insert_id	=	mysql_insert_id();
					$file_name		=	"pdf";
					
					$update_query	=	" update document_detail set doc_upload = '".$file_name."'   where id = '".$get_insert_id."' ";
					//echo "===>".$update_query;
					mysql_query($update_query);
				}
			}
		}
	}
	?>
	<script type="text/javascript">
	alert('Record Inserted successfully');
	location.href='home.php';
	//echo "Record inserted successfully...";
	</script>
	<?php
 ?>
