
<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['login'])==0)
  { 
header('location:index.php');
}
else{
if(isset($_POST['update']))
  {
$password=md5($_POST['password']);
$newpassword=md5($_POST['newpassword']);
$email=$_SESSION['login'];
  $sql ="SELECT password FROM utilisateur WHERE mail=:email and password=:password";
$query= $dbh -> prepare($sql);
$query-> bindParam(':email', $email, PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update utilisateur set password=:newpassword where mail=:email";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
$msg="Your Password succesfully changed";
}
else {
$error="Your current password is wrong";  
}
}

?>
  <!DOCTYPE HTML>
<html>
<head>


<script type="text/javascript">
function valid()
{
if(document.chngpwd.newpassword.value!= document.chngpwd.confirmpassword.value)
{
alert("New Password and Confirm Password Field do not match  !!");
document.chngpwd.confirmpassword.focus();
return false;
}
return true;
}
</script>
</head>
<body>

<?php include('includes/header.php');?>
<?php 
$useremail=$_SESSION['login'];
$sql = "SELECT * from utilisateur where mail=:useremail";
$query = $dbh -> prepare($sql);
$query -> bindParam(':useremail',$useremail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
<section>

          <?php }}?>
    
     
<form name="chngpwd" method="post" onSubmit="return valid();">
        
            
              <h6>Update password</h6>
     
             <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
         
              <label>Current Password</label>
              <input  id="password" name="password"  type="password" required>
        
         
              <label>Password</label>
              <input  id="newpassword" type="password" name="newpassword" required>
          
              <label >Confirm Password</label>
              <input  id="confirmpassword" type="password" name="confirmpassword"  required>
          
               <input type="submit" value="Update" name="update" id="submit" >
          
</section>
 

</body>
</html>
<?php } ?>