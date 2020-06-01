<h3>Panier Details</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th >Nom d'article</th>
						<th>Quantite</th>
						<th >Prix</th>
						<th >Total</th>
						<th >Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["nom"]; ?></td>
						<td><?php echo $values["quantite"]; ?></td>
						<td> <?php echo $values["prix"]; ?></td>
						<td><?php echo number_format($values["quantite"] * $values["prix"], 2);?></td>
						<td><a href="panier.php?action=delete&id=<?php echo $values["id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["quantite"] * $values["prix"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td ><?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<?php
					}
					?>
						
				</table>
			</div>