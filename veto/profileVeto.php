<?php
session_start();
error_reporting(0);
include('../includes/config.php');
if(strlen($_SESSION['alogin'])==0)
  { 
header('location:profileVeto.php');
}
else{
if(isset($_POST['alogin']))
  {
$nom=$_POST['nom'];
$prenom=$_POST['prenom'];
$num_telephone=$_POST['num_telephone'];
$adresse=$_POST['addresse'];
$mail=$_SESSION['alogin'];
$img1=$_FILES["img1"]["name"];
$img2=$_FILES["img2"]["name"];	
$img3=$_FILES["img3"]["name"];
$img4=$_FILES["img4"]["name"];
$img5=$_FILES["img5"]["name"];
move_uploaded_file($_FILES["img1"]["tmp_name"],"../img/veto/".$_FILES["img1"]["name"]);
move_uploaded_file($_FILES["img2"]["tmp_name"],"../img/veto/".$_FILES["img2"]["name"]);
move_uploaded_file($_FILES["img3"]["tmp_name"],"../img/veto/".$_FILES["img3"]["name"]);
move_uploaded_file($_FILES["img4"]["tmp_name"],"../img/veto/".$_FILES["img4"]["name"]);
move_uploaded_file($_FILES["img5"]["tmp_name"],"../img/veto/".$_FILES["img5"]["name"]);
$sql="update veterinaire set nom=:nom,prenom=:prenom,num_telephone=:num_telephone,adresse=:adresse where mail=:mail,img1=:img1,img2=:img2,img3=:img3,img4=:img4,img5=:img5";
$query = $dbh->prepare($sql);
$query->bindParam(':nom',$nom,PDO::PARAM_STR);
$query->bindParam(':prenom',$prenom,PDO::PARAM_STR);
$query->bindParam(':num_telephone',$num_telephone,PDO::PARAM_STR);
$query->bindParam(':adresse',$adresse,PDO::PARAM_STR);
$query->bindParam(':mail',$mail,PDO::PARAM_STR);
$query->bindParam(':img1',$img1,PDO::PARAM_STR);
$query->bindParam(':img2',$img2,PDO::PARAM_STR);
$query->bindParam(':img3',$img3,PDO::PARAM_STR);
$query->bindParam(':img4',$img4,PDO::PARAM_STR);
$query->bindParam(':img5',$img5,PDO::PARAM_STR);
$query->execute();
$msg="Profile updated Successfully";
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
<?php include('../includes/header.php');?>
<?php 
$mail=$_SESSION['alogin'];
$sql = "SELECT * from veterinaire where mail=:mail";
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
  if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
  <form  method="post">
  <label >Nom</label>
  <input  name="nom" value="<?php echo htmlentities($result->nom);?>"  type="text"  required>
  <label >Prenom</label>
  <input  name="nom" value="<?php echo htmlentities($result->prenom);?>"  type="text"  required>
  <label >Email Address</label>
  <input  value="<?php echo htmlentities($result->mail);?>" name="mail"  type="email" required readonly>
  <label>Phone Number</label>
  <input  name="num_telephone" value="<?php echo htmlentities($result->num_telephone);?>"  type="text" required>
  <label>Your Address</label>
  <textarea  name="adresse" rows="4" ><?php echo htmlentities($result->adresse);?></textarea>
<div >Image 1 <img src="../img/veto/<?php echo htmlentities($result->img1);?>" width="300" height="200" style="border:solid 1px #000">
<input type="file" name="img1" ></div>		
<div >Image 2<img src="../img/veto/<?php echo htmlentities($result->img2);?>" width="300" height="200" style="border:solid 1px #000">
<input type="file" name="img2" ></div>		
<div >Image 3<img src="img/veto/<?php echo htmlentities($result->img3);?>"width="300" height="200" style="border:solid 1px #000" >
<input type="file" name="img3" ></div>
<div>Image 4<img src="../img/veto/<?php echo htmlentities($result->img4);?>" width="300" height="200" style="border:solid 1px #000">
<input type="file" name="img4" ></div>				
<div >Image 5<img src="../img/veto/<?php echo htmlentities($result->img5);?>" width="300" height="200" style="border:solid 1px #000">
<input type="file" name="img5" ></div>		

<?php }} ?>     
           
  <button type="submit" name="updateprofile" >Save Changes </button>
            
  </form>
        
</section>




</body>
</html>
<?php } ?>