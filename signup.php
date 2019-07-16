<?php
if(!empty($_POST["submit"])) {
	$fullname = $_POST["fullname"];
	$email = $_POST["email"];
	$password = $_POST["password"];

	$conn = mysql_connect("localhost","root","");
	mysql_select_db("Users",$conn);
	mysql_query("INSERT INTO users (fullname, email, password) VALUES ('" . $fullname. "', '" . $email. "','" . $password. "')");
	$insert_id = mysql_insert_id();
	if(!empty($insert_id)) {
	$message = "Successfully Register.";
	}
}
?>

<!DOCTYPE html>

<html>

<head>
<title>Sign up</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>

<form name="signup" method="post" action="">

<div class="aler_message">
	<?php if(isset($message)) { echo $message; } ?></div>

<table border="0" cellpadding="10" cellspacing="1" width="500" align="center">
<tr class="tableheader">
<td colspan="2">Contact Form</td>
</tr>
<tr class="tablerow">
<td>Full Name<br/>  <input type="text" class="text_input" autofocus="autofocus" name="fullname"></td>
<td>Email<br/> <input type="text" class="text_input" autofocus="autofocus" name="email"></td>
</tr>
<tr class="tablerow">
<td colspan="2">Message<br/><textarea name="password" class="text_input" autofocus="autofocus"></textarea></td>
</tr>
<tr class="tableheader">
<td colspan="2"><input type="submit" class="btn_submit" name="submit" value="Submit"></td>
</tr>
</table>

</form>

<table style="border:2px red solid" class="table_data"  cellpadding="5">
	<tr>
		<th>
			Full Name
		</th>
		<th>
			Email
		</th>
		<th>
			password
		</th>
	</tr>
<?php
$conn = mysql_connect("localhost","root","", "kuncity");
mysql_select_db("users",$conn);
$result= mysql_query("select * from users order by user_id DESC ") or die (mysql_error());
while ($row= mysql_fetch_array ($result) ){
$id=$row['tbl_contact_id'];
?>
	<tr style="text-align:center;">
		<td style="width:200px;">
			<?php echo $row['fullname']; ?>
		</td>
		<td style="width:200px;">
			<?php echo $row['email']; ?>
		</td>
		<td style="width:200px; color:blue;">
			<?php echo $row['user_message']; ?>
		</td>
	</tr>
<?php } ?>
</table>

</body>

</html>
