<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:home.php');
}
else{
if(isset($_POST['updateprofile']))
  {
$mail=$_SESSION['alogin'];
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$num_telephone=$_POST['num_telephone'];
$adresse=$_POST['adresse'];
$img=$_FILES["img"]["name"];
move_uploaded_file($_FILES["img"]["tmp_name"],"img/users/".$_FILES["img"]["name"]);
$sql="update utilisateur set nom=:nom,prenom=:prenom,num_telephone=:num_telephone,adresse=:adresse,img=:img where mail=:mail";
$query = $dbh->prepare($sql);
$query->bindParam(':nom',$nom,PDO::PARAM_STR);
$query->bindParam(':prenom',$prenom,PDO::PARAM_STR);
$query->bindParam(':num_telephone',$num_telephone,PDO::PARAM_STR);
$query->bindParam(':adresse',$adresse,PDO::PARAM_STR);
$query->bindParam(':mail',$mail,PDO::PARAM_STR);
$query->bindParam(':img',$img,PDO::PARAM_STR);
$query->execute();
$msg="Profile Updated Successfully";
}

?>
  <!DOCTYPE HTML>
<html lang="en">
<head>
<style>
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>
</head>
<body>
        
<!--Header-->
<?php include('includes/header.php');?>


<?php 
$mail=$_SESSION['alogin'];
$sql = "SELECT * from utilisateur where mail=:mail";
$query = $dbh -> prepare($sql);
$query -> bindParam(':mail',$mail, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{ ?>
<section>
     
  
          <h5 >Genral Settings</h5>
          <?php  
         if($msg){?><div  class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> <?php }?></div>
          <form  method="post">
           
            
              <label >Nom</label>
              <input  name="nom" value="<?php echo htmlentities($result->nom);?>" type="text"  required>
              <label >Prenom</label>
              <input  name="prenom" value="<?php echo htmlentities($result->prenom);?>"  type="text"  required>
              <label >Email Address</label>
              <input  value="<?php echo htmlentities($result->mail);?>" name="mail"  type="email" required readonly>
            
              <label>Phone Number</label>
              <input  name="num_telephone" value="<?php echo htmlentities($result->num_telephone);?>"  type="text" required>
        
    
              <label>Your Address</label>
              <textarea  name="adresse" rows="4" ><?php echo htmlentities($result->adresse);?></textarea>
              <div >Image  <img src="img/users/<?php echo htmlentities($result->img);?>" width="300" height="200" style="border:solid 1px #000">
              <input type="file" name="img" ></div>		
            <?php }} ?>
           
           
              <button type="submit" name="updateprofile" >Save Changes </button>
            
          </form>
        
</section>



</body>
</html>
<?php } ?>