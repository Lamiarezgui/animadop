<?php
session_start();
include('config.php');
if(isset($_POST['login']))
{
$mail=$_POST['mail'];
$password=md5($_POST['password']);
$sql ="SELECT * FROM utilisateur WHERE mail=:mail and password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':mail', $mail, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
$_SESSION['alogin']=$_POST['mail'];
echo "<script type='text/javascript'> document.location = '../profile.php' </script>";
} else{
  
  echo "<script>alert('Invalid Details');</script>";

}

}

?>
<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	
</head>

<body>
	

	<h1 >Sign in</h1>
	<form method="post" >
        <label for="" >Your Mail </label>
		<input type="text" placeholder="Email" name="mail" >
		<label for="" >Password</label>
		<input type="password" placeholder="Password" name="password">
		<button  name="login" type="submit">LOGIN</button>

</form>
						

</body>

</html>