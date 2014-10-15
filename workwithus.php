<?php
require 'db-connect.php';

$name  = $sql->real_escape_string($_POST['name']);
$email   =$sql->real_escape_string($_POST['email']);
$phone = $sql->real_escape_string($_POST['phone']);
$qualification = $sql->real_escape_string($_POST['qualification']);
$address1 = $sql->real_escape_string($_POST['address1']);
$address2 = $sql->real_escape_string($_POST['address2']);
$pincode = $sql->real_escape_string($_POST['pincode']);
$interested = $sql->real_escape_string($_POST['interested']);
$path = $_FILES['file']['name'];
$ext = pathinfo($path, PATHINFO_EXTENSION);
echo $ext;
echo $path;

 $newname = rand().".".$ext;
 $target = 'resume/'.$newname;
 move_uploaded_file( $_FILES['file']['tmp_name'], $target);
 /*
$country = $sql->real_escape_string($_POST['country']);
$postal_code = $sql->real_escape_string($_POST['postal_code']);
$requirements = $sql->real_escape_string($_POST['requirements']);
$description = $sql->real_escape_string($_POST['description']);

echo 'name-'.$name.'<br>';
echo 'email-'.$email.'<br>';
echo 'phone-'.$phone.'<br>';
echo 'companyname-'.$companyname.'<br>';
echo 'address1-'.$address1.'<br>';
echo 'address2-'.$address2.'<br>';
echo 'pincode-'.$pincode.'<br>';
echo 'message-'.$message.'<br>';

echo 'country-'.$country.'<br>';
echo 'postal_code-'.$postal_code.'<br>';
echo "requirements<br>";
    foreach($_POST['email'] as $check) {

            $email .= $check.",";

            //echo $check."<br>"; //echoes the value set in the HTML form for each checked checkbox.
                         //so, if I were to check 1, 3, and 5 it would echo value 1, value 3, value 5.
                         //in your case, it would echo whatever $row['Report ID'] is equivalent to.
    }


  //echo "requirements-group:".rtrim($requirements, ",")."<br>";

  //echo "<br>Decription";
//echo htmlspecialchars($_POST['description']);   */

$query ="INSERT INTO `workwithus` (`name`, `email`, `phone`, `qualification`, `address1`, `address2`, `pincode`, `interested`,`file`) VALUES ( '$name', '$email', '$phone', '$qualification', '$address1', '$address2 ', '$pincode ', '$interested','$target' );";

//$query = "INSERT INTO `sales_contact` (`id`, `first_name`, `last_name`, `company_name`, `mobile`, `email`, `city`, `country`, `postal_code`, `product_type`, `product_category`, `detail`) VALUES (NULL, '$f_name', '$l_name', '$company', '$mobile', '$email', '$city', '$country', '$postal_code', '$product_type', '$product_category', '$details');";

if ( !$sql->query($query) ) {
    echo "Error code ({$sql->errno}): {$sql->error}";
    //header('Location: ' . $_SERVER['HTTP_REFERER']);
} else {
    echo 'success';
    //header('Location: ' . $_SERVER['HTTP_REFERER']);
}

$sql->close();


?>
