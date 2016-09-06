<?php
include("dbconfig.php");
for ($rollno= 1; $rollno <=55; $rollno++)
	{
		$val = "Roll No " . strval($rollno);
		
		$sql = "INSERT INTO `logindata` (`username`) VALUES ('$val')";
		echo $sql;
			if (mysqli_query($conn, $sql)) {
    echo "";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


	}


mysqli_close($conn);
?>
