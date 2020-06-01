
<header>
   <?php  include('config.php');
   if(strlen($_SESSION['alogin'])==0)
	{	
?>
 <a href="#loginform"  data-toggle="modal" data-dismiss="modal">Login / Register</a> 
<?php }
else{ 
?>
    <a href="logout.php"  data-toggle="modal" data-dismiss="modal">Logout</a> 
    <?php
 } ?>
  <nav >
         <ul>
<?php 
$email=$_SESSION['login'];
$sql ="SELECT nom,prenom FROM utilisateur WHERE mail=:mail ";
$query= $dbh -> prepare($sql);
$query-> bindParam(':mail', $email, PDO::PARAM_STR);
$query-> execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($results as $result)
	{

	 echo htmlentities($result->Prenom); }}?></a>
              <ul >
           <?php if($_SESSION['login']){?>
            <li><a href="profile.php">Profile Settings</a></li>
              <li><a href="update-password.php">Update Password</a></li>
            <li><a href="anim.php">Mes animaux</a></li>
          <li><a href="panier.php">Mon Panier</a></li>
            <li><a href="logout.php">Sign Out</a></li>
            <?php } else { ?>
            <li></li>
            <?php } ?>
          </ul>
            </li>
          </ul>
        </div>
         

        <ul >
          <li><a href="home.php">Home</a>    </li>

        </ul>
  
  </nav>
  
  
</header>