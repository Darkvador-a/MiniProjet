<?php
require_once '../base/address.php';
$address = readAll();
$afterBootstrap = ' <link rel="stylesheet" type="text/css" href="assets/DataTables-1.10.3/media/css/jquery.dataTables.css">';
$afterjQuery = ' 
	<script>
    var table;
	$(document).ready( function () {
            console.log("doncument");
           table =$("#table_id").DataTable();
           console.log("document :"+table);
  });
    </script>';
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
                echo "<td id='title'>" . $val['title'] . "</td>";
                echo "<td>" . $val['description'] . "</td>";
                echo "<td>" . $val['address'] . "</td>";
                echo "<td>" . $val['url'] . "</td>";
                ?>
                       
                     <td>
                        <p id="editbox-button-<?= $val['id']?>" >
                            <button class="btn btn-danger delete" onclick="Delete(<?= $val['id']?>)">Supprimer</button>
						    <button class="btn btn-success edit-button" onclick="edit(<?= $val['id']?>)">Editer</button>
						 </p>
					     <p id="editbox-commands-<?= $val['id']?>" style="display: none;">
                        <button class="btn btn-success" id="edit-book-validate-1" >Valide</button> ou
                        <button class="btn btn-primary"  id="edit-book-cancel-1" >Cancle</button>
                    </p></td>	
					</tr>
			<?php }?>
				
			</tbody>
			</table>
		<?php }?>
        </div>
        <div id="result"></div>
	</div>
</section>



