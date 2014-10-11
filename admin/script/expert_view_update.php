<?php
 
error_reporting();
include_once("../include/config.php");

//getting all input given from user

$qus_id = $sql->real_escape_string($_POST['qus_id']);
$question = $sql->real_escape_string($_POST['question']);
$description = $sql->real_escape_string($_POST['description']);
$answer = $sql->real_escape_string($_POST['answer']);
$ans_rply = $sql->real_escape_string($_POST['ans_rply']);

$sql->autocommit(FALSE); 

$query = "UPDATE `questions` SET `question` = '$question',`description` = '$description',`answer` = '$answer', `ans_rply` = '$ans_rply' WHERE `qus_id` = '$qus_id'";

$result = $sql->query($query);

if($result)
{
	echo 'success';	
	$sql->commit();
	$sql->close();
}	
else
{ 
    	echo 'error';
	$sql->rollback();
  	$sql->close();
}

?>
