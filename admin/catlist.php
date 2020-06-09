


<?php include "../helpers/format.php" ;?>
<?php 

$fm = new Format();
?>


<?php include "inc/header.php" ;?>
 <?php include "inc/sidebar.php" ;?> 
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>

		<?php 
			 if(isset($_GET['delid'])){    
				$delid = $_GET['delid'];
				
				$sql = "DELETE  FROM tbl_catagory WHERE id='$delid'";
				$result = $db->conn->prepare($sql);
				$val = $result->execute();

				 if($val == true){
                        echo "<span class='success'>Data deleted successfully</span>";
                    }else{
                        echo "<span class='error'>Data not deleted!!! </span>";
                    }
            }
		
		
		?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$sql="SELECT * FROM tbl_catagory ORDER BY id DESC";
						$value = $db->conn->prepare($sql);
						$value->execute();
						$reault = $value->fetchAll();
						if($value){
							$i =0;
							foreach ($reault as $data) {
								$i++;
					?>
						<tr class="odd gradeX">
							<td><?php echo $i ;?></td>
							<td><?php echo $data['name'] ;?></td>
							<td><a href="editcat.php?catid=<?php echo $data['id'] ;?>">Edit</a> 
						<?php  if(session::get("userrole")== '0'){ ;?>	
							 ||<a  onclick="return confirm('Are you sure you want to delete this item?')" ; href="catlist.php?delid=<?php echo $data['id'] ;?>">Delete</a>
						<?php } ;?>  	 
							 </td>
						</tr>
					<?php }} ;?>
					</tbody>
					
				</table>
               </div>
            </div>
        </div>
   <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
			setSidebarHeight();


        });
    </script>    
  <?php include "inc/footer.php" ;?>  
  