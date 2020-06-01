<?php 
session_start();
require_once('includes/config.php');
error_reporting(0);
?>

<!DOCTYPE HTML>
<html >
<head>
<meta charset="utf-8">

    <h5> Recently Listed Animaux</h5>
          
    <ul>

<?php $sql = "SELECT * from animal order by id desc limit 4";
$query = $dbh -> prepare($sql);
$query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>

              <li>
                 <a href="animal-details.php?vhid=<?php echo htmlentities($result->id);?>"><img src="img/animal/<?php echo htmlentities($result->img);?>" alt="image"></a> 
                 <?php echo htmlentities($result->nome);?> , <?php echo htmlentities($result->race);?>
                 <?php echo htmlentities($result->famille);?>
               
              </li>
              <?php }} ?>
              </ul>
              <h5> Recently Listed Articles</h5>
              <ul>
              <?php $sql1 = "SELECT * from article order by id desc limit 4";
         $query1 = $dbh -> prepare($sql1);
        $query1->bindParam(':aid',$aid, PDO::PARAM_STR);
        $query1->execute();
        $results1=$query1->fetchAll(PDO::FETCH_OBJ);
        
        if($query1->rowCount() > 0)
       {
       foreach($results1 as $result1)
            {  ?>

              <li>
                 <a href="article-details.php?aid=<?php echo htmlentities($result1->id);?>"><img src="adminmag/img/articles/<?php echo htmlentities($result1->img1);?>" alt="image"></a> 
                <?php echo htmlentities($result1->name);?> , <?php echo htmlentities($result1->categorie);?>
                
               
              </li>
              <?php }} ?>
              
              </ul>
</body>
</html>
