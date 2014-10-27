<?php
require_once '../base/address.php';
$address = readAll();
$afterBootstrap = ' <link rel="stylesheet" type="text/css" href="assets/DataTables-1.10.3/media/css/jquery.dataTables.css">';
$afterjQuery = '<!-- DataTables -->
	<script type="text/javascript" charset="utf8"
		src="assets/DataTables-1.10.3/media/js/jquery.dataTables.js"></script>
	<script>
    $(document).ready( function () {
        $("#table_id").DataTable();
    } );</script> ';

?>


<!-- List of address Section -->
<section id="listAddress">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 text-center">
				<h2>List of address</h2>
				<hr class="star-primary">
			</div>
		</div>
		<div class="row">
         <?php if (empty($address)){ echo "Le tableau de données est vide"; }else {?>    
		<table id="table_id" class="display">
				<thead>
					<tr>
				 <?php foreach ($address[0] as $key => $val) { if($key !== 'id') {echo "<th>".ucfirst($key)."</th>"; }} ?>
				<th>Actions</th>
					</tr>
				</thead>
				<tbody>
			 <?php foreach ($address as $val){?>
				<tr>
				<?php
                echo "<td>" . $val['title'] . "</td>";
                echo "<td>" . $val['description'] . "</td>";
                echo "<td>" . $val['address'] . "</td>";
                echo "<td>" . $val['url'] . "</td>";
                ?>
                <td><a href="delete.php?id=<?=$val['id']?>&type=article"><button
									class="btn btn-danger">Supprimer</button> </a> <a
							href="edit_article.php?id=<?=$val['id']?>&type=article"><button
									class="btn btn-success">Editer</button> </a></td>
					</tr>
			<?php }?>
				
			</tbody>
			</table>
		<?php }?>
        </div>
	</div>
</section>

