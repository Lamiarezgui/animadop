<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

if(isset($_REQUEST['del']))
	{
$delid=intval($_GET['del']);
$sql = "delete from veterinaire  WHERE  id=:delid";
$query = $dbh->prepare($sql);
$query -> bindParam(':delid',$delid, PDO::PARAM_STR);
$query -> execute();
$msg="veterinaire record deleted successfully";
}


 ?>
 <!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	<title>Admin  |veterinaire </title>
	<link rel="stylesheet" href="../adminmag/css/font-awesome.min.css">
	<link rel="stylesheet" href="../adminmag/css/bootstrap.min.css">
	<link rel="stylesheet" href="../adminmag/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="../adminmag/css/bootstrap-social.css">
	<link rel="stylesheet" href="../adminmag/css/bootstrap-select.css">
	<link rel="stylesheet" href="../adminmag/css/fileinput.min.css">
	<link rel="stylesheet" href="../adminmag/css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="../adminmag/css/style.css">
  
	<style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
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
<?php include('includes/header.php');?>
    <div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Liste veterinaire</h2>
	<div class="panel panel-default">
		<div class="panel-heading">Veterinaire Details</div>
    <div class="panel-body">
    <?php if($error){?><div class="errorWrap" ><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap" ><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
			<tr>
				<th>#</th>
				<th>Nom</th>
				<th>Prenom </th>
                 <th>Mail</th>
                <th>Numero de Telephone</th>
				<th>adresse</th>
				<th>Action</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
			<th>#</th>
				<th>Nom</th>
				<th>Prenom </th>
                 <th>Mail</th>
                <th>Numero de Telephone</th>
				<th>adresse</th>
				<th>Action</th>
			</tr>
			
		</tfoot>
	    <tbody>

<?php $sql = "SELECT * from veterinaire";
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
				<td><?php echo htmlentities($result->nom);?></td>
	            <td><?php echo htmlentities($result->prenom);?></td>
                <td><?php echo htmlentities($result->mail);?></td>
                <td><?php echo htmlentities($result->num_telephone);?></td>
	            <td><?php echo htmlentities($result->adresse);?></td>
											
		        <td><a href="list-veto.php?del=<?php echo $result->id;?>" onclick="return confirm('Do you want to delete');"><i class="fa fa-close"></i></a></td>
			</tr>
			<?php $cnt=$cnt+1; }} ?>
										
		</tbody>
	</table>
	<a href="ajoutVeto.php"><i class="fa fa-plus-circle"></i> Ajouter</a>
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