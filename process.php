<?php

include("dbconfig.php");

$rollno=$_POST['rno'];
$fname=$_POST['firstname'];
$lname=$_POST['lastname'];
$country=$_POST['country'];
$city=$_POST['city'];
$email=$_POST['email'];
$marital=$_POST['marital'];
$kids=$_POST['kids'];
$degree=$_POST['degree'];
$cert=$_POST['cert'];
$jobtype=$_POST['jobtype'];
$company=$_POST['cname'];
$expertise=$_POST['expertise'];
$volunteer=$_POST['volunteer'];
$spare=$_POST['spare'];
$gender=$_POST['gender'];
$investment=$_POST['investment'];
$message=$_POST['message'];
$message=str_replace("'", "\'", $message);

// INSERT INTO `userinfo`.`userdata` (`rollno`, `fname`, `lname`, `country`, `city`, `email`, `marital`, `kids`, `degree`, `certification`, `jobtype`, `company`, `expertise`, `volunteer`, `spare`, `gender`, `investment`, `message`) VALUES ('', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

// $sql = "INSERT INTO `userdata` (`rollno`,`fname`, `lname`, `country`, `city`, `email`, `marital`, `kids`, `degree`, `certification`, `jobtype`, `company`, `expertise`, `volunteer`, `spare`, `gender`, `investment`, `message`) 
		
// 		VALUES ('".$rollno."','".$fname."','".$lname."','".$country."','".$city."','".$email."','".$marital."','".$kids."','".$degree."','".$cert."','".$jobtype."','".$company."','".$expertise."','".$volunteer."','".$spare."','".$gender."','".$investment."','".$message."')";

$sql = "UPDATE `userdata` SET 
fname='$fname'"  ."," .
"lname='$lname'" ."," .
"country='$country'" ."," .
"city='$city'" ."," .
"email='$email'" ."," .
"marital='$marital'" ."," .
"kids='$kids'" ."," .
"degree='$degree'" ."," .
"certification='$cert'" ."," .
"jobtype='$jobtype'" ."," .
"company='$company'" ."," .
"expertise='$expertise'" ."," .
"volunteer='$volunteer'" ."," .
"spare='$spare'" ."," .
"gender='$gender'" ."," .
"investment='$investment'" ."," .
"message='$message'" ." " .

"WHERE rollno = '$rollno'"
;



if (mysqli_query($conn, $sql)) {
    echo "";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


$row = mysqli_query($conn, "SELECT * FROM userdata WHERE rollno = '$rollno'");
$record= mysqli_fetch_array($row, MYSQLI_ASSOC);
//echo $record['fname'];
if (
    ($record['fname'] == $fname) && 
    ($record['lname'] == $lname) &&
    ($record['country'] == $country) &&
    ($record['city'] == $city) && 
    ($record['email'] == $email) && 
    ($record['marital'] == $marital) && 
    ($record['kids'] == $kids) && 
    ($record['degree'] == $degree) && 
    ($record['certification'] == $cert) && 
    ($record['jobtype'] == $jobtype) && 
    ($record['company'] == $company) && 
    ($record['expertise'] == $expertise) && 
    ($record['volunteer'] == $volunteer) && 
    ($record['spare'] == $spare) && 
    ($record['gender'] == $gender) && 
    ($record['investment'] == $investment) && 
    ($record['message'] == $message) 

)

    { 
       $totalRegistered = getTotalRegisteredUsers($conn);
       $email_msg = "<html>";
       $email_msg .= "<h3>Total Registered users : " . $totalRegistered . "</h3><br>";
       $email_msg .=  $rollno  ." Registered Successfully" . "<br>";
       $email_msg .=  "First name: " . $fname . "<br>";
       $email_msg .=  "Last name: " . $lname . "<br>";
       $email_msg .=  "Country: " . $country . "<br>";
       $email_msg .=  "City: " . $city . "<br>";
       $email_msg .=  "Email: " . $email . "<br>";
       $email_msg .=  "Marital Status: " . $marital . "<br>";
       $email_msg .=  "Kids: " . $kids . "<br>";
       $email_msg .=  "Degree: " . $degree . "<br>";
       $email_msg .=  "Certification: " . $cert . "<br>";
       $email_msg .=  "Job: " . $jobtype . "<br>";
       $email_msg .=  "Company: " . $company . "<br>";
       $email_msg .=  "Expertise: " . $expertise . "<br>";
       $email_msg .=  "Volunteer: " . $volunteer . "<br>";
       $email_msg .=  "Spare Time: " . $spare . "<br>";
       $email_msg .=  "Gender: " . $gender . "<br>";
       $email_msg .=  "Investment: " . $investment . "<br>";
       $email_msg .=  "Message: " . $message . "<br><br>";

       $email_msg .= "</html>";

       $email_subject .= $rollno  ." Registered Successfully";
       SendHtmlEmail("shoby42@hotmail.com", "farazahmed@gmail.com", "test@test.com", $email_subject, $email_msg);
       //SendHtmlEmail("shoby42@hotmail.com", "umair.aley@gmail.com", "admin@ssuet96.dx.am", $email_subject, $email_msg);
      echo "";}
else{
  echo "Error updating database";
}
mysqli_close($conn);



function getTotalRegisteredUsers($conn){

  $results = mysqli_query($conn, "SELECT * FROM userdata WHERE fname <> ''");
  $count = mysqli_num_rows($results);
  return $count;
 
}


function SendHtmlEmail($to, $cc , $from, $subject, $message)
{
    
    //$to = "shoaib@wipath.com.au";
    //$subject = "Test email";
    //$message = "This is a test email";
    $from = "admin@ssuet96.dx.am";  
    
    // To send HTML mail, the Content-type header must be set
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Additional headers
    //$headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
    $headers .= 'From:' . $from . "\r\n";
    $headers .= 'Cc:' . $cc . "\r\n";
    //$headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";


    if(!filter_var($from, FILTER_VALIDATE_EMAIL)){
      die('Invalid email address.');  
    }
    
    if (mail($to,$subject,$message,$headers)){
      // Success
      echo '';
    }
    else{
      // Error
      echo '';
    }
}
?>

