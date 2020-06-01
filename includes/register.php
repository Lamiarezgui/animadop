<?php
//error_reporting(0);
include("config.php");
if(isset($_POST['signup']))
{
$nom=$_POST['nom'];
$mail=$_POST['mail']; 
$prenom=$_POST['prenom'];
$num_telephone=$_POST['num_telephone'];
$password=md5($_POST['password']); 
$adresse=$_POST['adresse'];
$sql="INSERT INTO  utilisateur(nom,prenom,mail,num_telephone,password,adresse) VALUES(:nom,:prenom,:mail,:num_telephone,:password,:adresse)";
$query = $dbh->prepare($sql);
$query->bindParam(':nom',$nom,PDO::PARAM_STR);
$query->bindParam(':prenom',$prenom,PDO::PARAM_STR);
$query->bindParam(':mail',$mail,PDO::PARAM_STR);
$query->bindParam(':num_telephone',$num_telephone,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':adresse',$adresse,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Registration successfull. Now you can login');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}


?>

<script type="text/javascript">
function checkAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'mail='+$("#mail").val(),
type: "POST",
success:function(data){
$("#user-availability-status").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}

</script>
<script src="jquery-3.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
function valid()
{
if(document.signup.password.value!= document.signup.confirmpassword.value)
{
alert("Password and Confirm Password Field do not match  !!");
document.signup.confirmpassword.focus();
return false;
}
return true;
}
</script>

<script>
            $(document).ready(function(){

                $("#mail").keyup(function(){

                    var mail = $(this).val().trim();
            
                    if(mail != ''){
            
                       
            
                        $.ajax({
                            url: 'ajaxfile.php',
                            type: 'post',
                            data: {mail : mail},
                            success: function(response){
                
                                $('#user-availability-status').html(response);
                
                             }
                        });
                    }else{
                        $("#user-availability-status").html("");
                    }
            
                });

            });
        </script>
        <h3 >Sign Up</h3>
      
              <form  method="post" name="signup" onSubmit="return valid();">
               
                  <input type="text"  name="nom" placeholder="Nom" required="required">
                  <input type="text"  name="prenom" placeholder="Prenom" required="required">
                  <input type="text"  name="num_telephone" placeholder="Mobile Number" maxlength="8" required="required">
                 <div> <input type="email" name="mail" id="mail" onBlur="checkAvailability()" placeholder="Email Address" required="required">
                  <span id="user-availability-status" ></span> </div>
                  <input type="text"  name="adresse" placeholder="Adresse" required="required">
                  <input type="password"  name="password" placeholder="Password" required="required">
                  <input type="password"  name="confirmpassword" placeholder="Confirm Password" required="required">
                  <input type="checkbox" id="terms_agree" required="required" checked="">
                  <label for="terms_agree">I Agree with <a href="#">Terms and Conditions</a></label>
               
                  <input type="submit" value="Sign Up" name="signup" id="submit" >
            
              </form>
            
        <p>Already got an account? <a href="login.php" data-toggle="modal" data-dismiss="modal">Login Here</a></p>
    