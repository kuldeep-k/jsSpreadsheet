<?php

session_start();

if(!empty($_POST['submit']))
{
	$_SESSION['auth'] = array();
	$_SESSION['auth']['u'] = $_POST['username'];
	header('location: excel.php');
}

?>

<form method="post">
User Name : 
<input type="text" name="username" />
<br/>
Password : 
<input type="text" name="password" />

<input type="submit" name="submit" />
</form>
