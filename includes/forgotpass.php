<?php
if(isset($_POST['update']))
  {
$email=$_POST['mail'];
$newpassword=md5($_POST['newpassword']);
  $sql ="SELECT * FROM utilisateur WHERE mail=:mail ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':mail', $email, PDO::PARAM_STR);
$query-> execute();
$results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() > 0)
{
$con="update utilisateur set password=:newpassword where mail=:mail";
$chngpwd1 = $dbh->prepare($con);
$chngpwd1-> bindParam(':email', $email, PDO::PARAM_STR);
$chngpwd1-> bindParam(':newpassword', $newpassword, PDO::PARAM_STR);
$chngpwd1->execute();
echo "<script>alert('Your Password succesfully changed');</script>";
}
else {
echo "<script>alert('Email is invalid');</script>"; 
}
}

?>
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

        <h3 >Password Recovery</h3>
      
              <form name="chngpwd" method="post" onSubmit="return valid();">
      
                  <input type="email" name="mail"  placeholder="Your Email address" required="">
                  <input type="password" name="newpassword"  placeholder="New Password" required="">
                  <input type="password" name="confirmpassword"  placeholder="Confirm Password" required="">            
                  <input type="submit" value="Reset My Password" name="update" >
               
              </form>
                <p>For security reasons we don't store your password. Your password will be reset and a new one will be send.</p>
                <p><a href="#loginform" data-toggle="modal" data-dismiss="modal"> Back to Login</a></p>
      