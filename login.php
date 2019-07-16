<?php
//A product of the R.0.Garma98
//creation date 2018
//Start session
	session_start();

	//Connect to mysql
	require "db.php";

	//Function to sanitize values received from the form.
  //Prevent sql injection
	function clean($str) {
		$str = @trim($str);
		if(get_magic_quotes_gpc()) {
			$str = stripslashes($str);
		}
		return mysql_real_escape_string($str);
	}

	//Sanitizing POST values
	$login = clean($_POST['username']);
	$password = clean($_POST['password']);

	//query
	$qry="SELECT * FROM admin WHERE username='$login' AND password='$password'";
	$result=mysql_query($qry);

	if($result) {
		if(mysql_num_rows($result) > 0) {
			//Login Successful
			session_regenerate_id();
			$member = mysql_fetch_assoc($result);
			$_SESSION['SESS_MEMBER_ID'] = $member['id'];
			$_SESSION['SESS_FIRST_NAME'] = $member['username'];
			session_write_close();

			header("location: admin/dashboard.php");
			exit();
		}else {
			//Login failed
			header("location: failed.php")
			exit();
		}
	}else {
		die("Query failed");
	}
?>
