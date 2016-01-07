<?php
$servername="localhost";
$username="root";
$password="";
$databasename="ethagec_db";

$connect=mysql_connect($servername,$username,$password) or die("Unable to connect to The Server");
$select_db=mysql_select_db($databasename)or die("Unable to connect to The Server");
// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }

$id=$_POST['id']	
$name = $_POST['name'];
$email= $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];
$msg="INSERT into contacte_tbl(id,name,email,phone,message) values('$id','$name','$email','$phone','$message')";
$result=mysql_query($msg);
header('location:try.php');
	
// Create the email and send the message
$to = 'ethagecsprl@yahoo.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
$email_subject = "Website Contact Form:  $name";
$email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email\n\nPhone: $phone\n\nMessage:\n$message";
$headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>