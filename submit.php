<?php
include 'connect.php';

	if(isset($_POST['name'])&&isset($_POST['enroll_no'])&&isset($_POST['in_username'])&&isset($_POST['git_username'])&&isset($_POST['enroll_no'])&&isset($_FILES['resume'])&&$_FILES['resume']['type']=="application/pdf"){
		// check if user is already there
		if(file_exists("Resume/".$_POST['enroll_no'].".pdf")){
			echo "User Already exists";
		}
		
		else{
				
				move_uploaded_file($_FILES['resume']['tmp_name'], "Resume/".$_POST['enroll_no'].".pdf");
				$sql = "INSERT INTO students(Name,Enroll_no,Linkedin,Github,Resume) VALUES('".trim($_POST['name'])."','".trim($_POST['enroll_no'])."','".trim($_POST['in_username'])."','".trim($_POST['git_username'])."','Resume/".trim($_POST['enroll_no']).".pdf')";
				if(mysqli_query($dbconnect,$sql)){
					echo "Hi ".$_POST['name'].", your details have been sucessfully recorded.";
				}
			}
	}

?>