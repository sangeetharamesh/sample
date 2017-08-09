<?php //session_start();

if(isset($_POST['submit_but'])) {
  // Insert you code for processing the form here, e.g emailing the submission, entering it into a database. 
  $name=stripslashes($_POST['name']);
  $email=stripslashes($_POST['email']);
   $number=stripslashes($_POST['number']);
   $register_one=stripslashes($_POST['register_one']);
   $register_two=stripslashes($_POST['register_two']);
   $register_three=stripslashes($_POST['register_three']);
    $p_scnt =$_POST['p_scnt'];
	
     $p_scnt_age=$_POST['p_scnt_age'];
	 $p_scnt_grate=$_POST['p_scnt_grate'];
	 
	 foreach( $p_scnt as $key => $n ) 
		 
	 
	 if($n !=''){
	?>
   <table style="border-collapse: collapse;  border: 1px solid black;"><thead>
     <tr  style="border-collapse: collapse;  border: 1px solid black;"><th style="border-collapse: collapse;  border: 1px solid black;">Name</th><th style="border-collapse: collapse;  border: 1px solid black;">Age</th><th style="border-collapse: collapse;  border: 1px solid black;">Grate</th></tr>
     </thead><tbody>
     <?php }
	 foreach( $p_scnt as $key => $n ) {
echo  "<tr><td  style='border-collapse: collapse;  border: 1px solid black;'>".$n."</td><td  style='border-collapse: collapse;  border: 1px solid black;'>".$p_scnt_age[$key].
        "</td><td  style='border-collapse: collapse;  border: 1px solid black;'>".$p_scnt_grate[$key]."</td></tr>";
}
 ?>
 </tbody></table>
 <?php
   $school=stripslashes($_POST['school']);
   $challenges=stripslashes($_POST['challenges']);
    $questions=stripslashes($_POST['questions']);





$to  ='test@gmail.com';

$subject ="Message from ".$name;
$message ="Name: ".$name."\r\n";
$message.="Email: ".$email."\r\n";
$message.="Phone Number: ".$number."\r\n";
if($register_one!=''){
$message.="How Many Youth Do You Have Attending Between the Ages of 6-9?: ".$register_one."\r\n";
}
if($register_two!=''){

$message.="How Many Youth Do You Have Attending Between the Ages of 10-12?: ".$register_two."\r\n";
}
if($register_three!=''){

$message.="How Many Youth Do You Have Attending Between the Ages of 13-18?: ".$register_three."\r\n";
}

if(($p_scnt!='')||($p_scnt_age!='')||($p_scnt_grate!='')){

$message.="LIST ALL YOUTH ATTENDING\r\n";

 $message .='<table><thead>
     <tr><td>Name</td><td>Age</td><td>Grate</td></tr>
     </thead><tbody>';
     
	 foreach( $p_scnt as $key => $n ) {
$message .=  "<tr><td>".$n."</td><td>".$p_scnt_age[$key].
        "</td><td>".$p_scnt_grate[$key]."</td></tr>";
}

   $message .= "</tbody></table>";
}


if($school!=''){

$message.=" Are “Back to School Supplies” Needed for The Youth?: ".$school."\r\n";
}
if($challenges!=''){

$message.="What challenges do you have as it pertains to parenting?: ".$challenges."\r\n";
}
if($questions!=''){

$message.="What questions would you like addressed during the Parent’s Workshop? : ".$questions."\r\n";
}

//$headers= "MIME-Version: 1.0\r\n";
//$headers.= "Content-Type: text/html; charset=ISO-8859-1\r\n";

//$headers.= 'From:'.$email."\r\n" . 'Reply-To:clatha@firesky.cc' . "\r\n".'X-Mailer: PHP/' . phpversion();

    $headers = "Content-type: text/plain; $charset" . "\r\n";
    $headers .= "From: $email" . "\r\n";
	$headers .= "Content-type: text/html\r\n";
    $headers .= "Reply-To: $email" . "\r\n";
    
    mail($to,$subject, $message, $headers);
	
echo "<script>";
echo "window.alert('Your Message has been sent Successfully.Thanks...')";
echo "</script>";




  

}
?>
