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
<html>

<head>
	
	
	
	<title>Admin  |Animal </title>
	<meta charset="UTF-8">
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

						<h2 class="page-title">Liste Animaux</h2>
	<div class="panel panel-default">
	<div class="panel-heading">Animal Details</div>
	<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
			<tr>
				<th>#</th>
				<th>Nom</th>
				<th>Sexe </th>
                <th>Famille</th>
                <th>Utilisateur</th>
				<th>Race</th>
				
			</tr>
		</thead>
		<tfoot>
			<tr>
			<th>#</th>
			<th>Nom</th>
			<th>Sexe </th>
            <th>Famille</th>
            <th>Utilisateur</th>
			<th>Race</th>	
			</tr>
			
		</tfoot>
	    <tbody>

<?php $sql = "SELECT * from animal,utilisateur where animal.id_user=utilisateur.id";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{?>	
			<tr>
				<td><?php echo htmlentities($cnt);?></td>
				<td><?php echo htmlentities($result->nome);?></td>
	            <td><?php echo htmlentities($result->sexe);?></td>
                <td><?php echo htmlentities($result->famille);?></td>
                <td><?php echo htmlentities($result->prenom);echo " " ;echo htmlentities($result->nom);?></td>
	            <td><?php echo htmlentities($result->race);?></td>
											
		       
			</tr>
			<?php $cnt=$cnt+1; }} ?>
										
		</tbody>
	</table>
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
<?php }?>