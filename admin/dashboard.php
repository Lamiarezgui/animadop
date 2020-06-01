<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
?>
<!doctype html>
<html >

<head>
<meta charset="UTF-8">
	
	
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="../adminmag/css/font-awesome.min.css">
	<link rel="stylesheet" href="../adminmag/css/bootstrap.min.css">
	<link rel="stylesheet" href="../adminmag/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="../adminmag/css/bootstrap-social.css">
	<link rel="stylesheet" href="../adminmag/css/bootstrap-select.css">
	<link rel="stylesheet" href="../adminmag/css/fileinput.min.css">
	<link rel="stylesheet" href="../adminmag/css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="../adminmag/css/style.css">
	
</head>

<body>
<?php include('includes/header.php');?>
<div class="ts-main-content">
<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Dashboard</h2>
						
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
<?php 
$sql1 ="SELECT id from article";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totalarticles=$query1->rowCount();
?>
<div class="stat-panel-number h1 "><?php echo htmlentities($totalarticles);?></div>
<div class="stat-panel-title text-uppercase">Listed Articles</div>
<a href="manage-article.php" class="block-anchor panel-footer "><i class="fa fa-arrow-right"></i>Full Detail &nbsp; </a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>

						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-success text-light">
												<div class="stat-panel text-center">
<?php 
$sql2="SELECT id from utilisateur";
$query2=$dbh -> prepare($sql2);
$query2->execute();
$res=$query2->fetchAll(PDO::FETCH_OBJ);
$totaluser=$query2->rowCount();
?>

<div class="stat-panel-number h1 "><?php echo htmlentities($totaluser);?></div>
<div class="stat-panel-title text-uppercase">Liste des Utilisateurs</div>
<a href="list-users.php" class="block-anchor panel-footer text-center"><i class="fa fa-arrow-right"></i>Full Detail &nbsp; </a>
</div>
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-warning text-light">
												<div class="stat-panel text-center">
<?php 
$sql3="SELECT id from admin_magasin";
$query3=$dbh -> prepare($sql3);
$query3->execute();
$res1=$query3->fetchAll(PDO::FETCH_OBJ);
$totaladminmag=$query3->rowCount();
?>

<div  class="stat-panel-number h1 "><?php echo htmlentities($totaladminmag);?></div>
<div class="stat-panel-title text-uppercase">Liste des  Admins Magasin</div>
<a href="list-admin.php" class="block-anchor panel-footer text-center"><i class="fa fa-arrow-right"></i>Full Detail &nbsp; </a>
</div>
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>
<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-info text-light">
												<div class="stat-panel text-center">
<?php 
$sql4="SELECT id from veterinaire";
$query4=$dbh -> prepare($sql4);
$query4->execute();
$res2=$query4->fetchAll(PDO::FETCH_OBJ);
$totalveto=$query4->rowCount();
?>

<div  class="stat-panel-number h1 "><?php echo htmlentities($totalveto);?></div>
<div class="stat-panel-title text-uppercase">Liste des  Veterinaires</div>
<a href="list-veto.php" class="block-anchor panel-footer"><i class="fa fa-arrow-right"></i>Full Detail &nbsp; </a>
</div>
											</div>
										</div>
									</div>
								</div>
							</div>	
						</div>
<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body bk-primary text-light">
												<div class="stat-panel text-center">
<?php 
$sql5="SELECT id from animal";
$query5=$dbh -> prepare($sql5);
$query5->execute();
$res3=$query5->fetchAll(PDO::FETCH_OBJ);
$totalanimal=$query5->rowCount();
?>
<div  class="stat-panel-number h1 ">
<?php echo htmlentities($totalanimal);?></div>
<div class="stat-panel-title text-uppercase">Liste des animaux</div>
<a href="list-animal.php" class="block-anchor panel-footer text-center"><i class="fa fa-arrow-right"></i>Full Detail &nbsp; </a>
</div>
									</div>
								
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		</div>
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
<?php } ?>
