<?php
require_once '../base/address.php';
$address = readAll();
$afterBootstrap = ' <link rel="stylesheet" type="text/css" href="assets/DataTables-1.10.3/media/css/jquery.dataTables.css">';
$afterjQuery = ' 
	<script>
    var table;
	$(document).ready( function () {
         table= displayTable();
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
		<div class="ajax-response"></div>
		<div class="oldInfo" style ="display: none;">
		</div>
		<div class="row">
         <?php if (empty($address)){ echo "Le tableau de données est vide"; }else { $i=0;?>    
		<table id="table_id" class="display">
				<thead>
					<tr>
				 <?php foreach ($address[0] as $key => $val) { if($key !== 'id') {echo "<th>".ucfirst($key)."</th>"; }} ?>
				<th>Actions</th>
					</tr>
				</thead>
				<tbody>
			 <?php foreach ($address as $val){ $i++;?>
				<tr id="tr-<?=$val['id']?>">
    			    <?php
    			    $id=$val['id'];
                echo "<td id='title-$id'>" . $val['title'] . "</td>";
                echo "<td id='description-$id'>" . $val['description'] . "</td>";
                echo "<td id='address-$id'>" . $val['address'] . "</td>";
                echo "<td id='link-$id'>" . $val['url'] . "</td>";
                ?>
                       
                     <td>
                      
                        <p id="editbox-button-<?= $val['id']?>" >
                         <span id="editbox-<?=$i;?>">
                            <button class="btn btn-danger delete" onclick="Delete(<?= $val['id']?>)">Supprimer</button>
						    <button class="btn btn-success edit-button" onclick="edit(<?= $val['id']?>)">Editer</button>
						 </span> 
						 </p>
						
					     <p id="editbox-commands-<?= $val['id']?>" style="display: none;">
                        <button class="btn btn-success" id="edit-book-validate-$id" onclick="Valide(<?= $val['id']?>)" >Valide</button> ou
                        <button class="btn btn-primary"  id="edit-book-cancel-$id" onclick="Cancel(<?= $val['id']?>)" >Cancle</button>
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



