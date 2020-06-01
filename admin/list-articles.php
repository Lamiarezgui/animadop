<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{

    $sql = "SELECT * from article";
    $query = $dbh -> prepare($sql);
    $query->execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    $cnt=1;
    if($query->rowCount() > 0)
    {
    foreach($results as $result)
    {


 ?>
 <!doctype html>
<html>

<head>
	
	<title>Admin |Articles </title>
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

						<h2 class="page-title">Liste Articles</h2>
						<div class="panel panel-default">
							<div class="panel-heading">Article Details</div>
							<div class="panel-body">

								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										<th>#</th>
											<th>Nom</th>
											<th>Prix </th>
											<th>Reference</th>
											<th>Categorie</th>
											
											
										</tr>
									</thead>
									<tfoot>
										<tr>
										<th>#</th>
										<th>Nom</th>
											<th>Prix </th>
											<th>Reference</th>
											<th>Categorie</th>
											
										</tr>
									</tfoot>
									<tbody>

	
										<tr>
											<td><?php echo htmlentities($cnt);?></td>
											<td><?php echo htmlentities($result->name);?></td>
											<td><?php echo htmlentities($result->prix);?></td>
											<td><?php echo htmlentities($result->reference);?></td>
											<td><?php echo htmlentities($result->categorie);?></td>

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
