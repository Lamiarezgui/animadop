<?php
session_start();
error_reporting(0);
include('includes/config.php');

if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_POST['signup']))
{
$email=$_POST['mail']; 
$password=md5($_POST['password']); 
$nom=$_POST['nom']; 
$prenom=$_POST['prenom']; 
$adresse=$_POST['adresse']; 
$num_telephone=$_POST['num_telephone']; 
$sql="INSERT INTO  veterinaire (nom,prenom,mail,num_telephone,password,adresse) VALUES(:nom,:prenom,:mail,:num_telephone,:password,:adresse)";
$query = $dbh->prepare($sql);
$query->bindParam(':mail',$email,PDO::PARAM_STR);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':nom',$nom,PDO::PARAM_STR);
$query->bindParam(':prenom',$prenom,PDO::PARAM_STR);
$query->bindParam(':adresse',$adresse,PDO::PARAM_STR);
$query->bindParam(':num_telephone',$num_telephone,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
echo "<script>alert('Registration successfull. ');</script>";
}
else 
{
echo "<script>alert('Something went wrong. Please try again');</script>";
}
}

?>
<html>
    <head>	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	

	<link rel="stylesheet" href="../adminmag/css/font-awesome.min.css">
	<link rel="stylesheet" href="../adminmag/css/bootstrap.min.css">
	<link rel="stylesheet" href="../adminmag/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="../adminmag/css/bootstrap-social.css">
	<link rel="stylesheet" href="../adminmag/css/bootstrap-select.css">
	<link rel="stylesheet" href="../adminmag/css/fileinput.min.css">
	<link rel="stylesheet" href="../adminmag/css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="../adminmag/css/style.css"></head>
	<body>
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
<?php include('includes/header.php');?>
    <div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
        <div class="container-fluid">

<div class="row">
    <div class="col-md-12">

        <h3 class="page-title">Ajouter Veterinaire</h3>
    
      
        <form  method="post" name="signup" >
        <div class="form-group">
                  <input type="text" class="form-control" name="nom" placeholder="Nom" required="required">
        </div>
        <div class="form-group">
                  <input type="text" class="form-control" name="prenom" placeholder="Prenom" required="required">
        </div>
        <div class="form-group">
                  <input type="text" class="form-control" name="num_telephone" placeholder="Mobile Number" maxlength="8" required="required">
        </div>
                 <div class="form-group"> <input type="email" class="form-control" name="mail" id="mail" onBlur="checkAvailability()" placeholder="Email Address" required="required">
                  <span id="user-availability-status" ></span> </div>
                  <div class="form-group">
                  <input type="text"  name="adresse" class="form-control" placeholder="Adresse" required="required">
                  </div>
                  <div class="form-group">
                  <input type="password"  name="password" class="form-control"placeholder="Password" required="required">
                  </div>
                  <input type="submit" value="Sign Up" name="signup" id="submit" class="btn btn-block">
                
        </form>
    </div>
</div>
		</div></div>
		</div>
                  <!-- Loading Scripts -->
	<script src="../adminmag/js/jquery.min.js"></script>
	<script src="../adminmag/js/bootstrap-select.min.js"></script>
	<script src="../adminmag/js/bootstrap.min.js"></script>
	<script src="../adminmag/js/jquery.dataTables.min.js"></script>
	<script src="../adminmag/js/dataTables.bootstrap.min.js"></script>
	<script src="../adminmag/js/Chart.min.js"></script>
	<script src="../adminmag/js/fileinput.js"></script>
	<script src="../adminmag/js/chartData.js"></script>
	<script src="../adminmag/js/main.js"></script>
            
	</body>
</html>
<?php }?>