


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
			 if(isset($_GET['deluser'])){    
				$deluser = $_GET['deluser'];
				
				$sql = "DELETE  FROM tbl_user WHERE id='$deluser'";
				$result = $db->conn->prepare($sql);
				$val = $result->execute();

				 if($val == true){
                        echo "<span class='success'>user deleted successfully</span>";
                    }else{
                        echo "<span class='error'>user not deleted!!! </span>";
                    }
            }
		
		
		?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Username</th>
                            <th>email</th>
                            <th>Details</th>
                            <th>Role</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
                   <?php 
						$sql="SELECT * FROM tbl_user ORDER BY id DESC";
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
                            <td><?php echo $data['username'] ;?></td>
                            <td><?php echo $data['email'] ;?></td>
                            <td><?php echo $data['details'] ;?></td>
                            <td>
                                <?php 
                                    if($data['role']== '0'){
                                        echo "Admin";
                                    }elseif($data['role']== '1'){
                                        echo "Authore";
                                    }elseif($data['role']== '2'){
                                         echo "Editor";
                                    }
                                
                                
                                ?>
                            
                            </td>
							<td>
                                    <a href="viewuser.php?viewid=<?php echo $data['id'] ;?>">View</a>
                                    
                                   
                        <?php  if(session::get("userrole")== '0'){ ;?>
                                || <a  onclick="return confirm('Are you sure you want to delete this item?')" ; href="userlist.php?deluser=<?php echo $data['id'] ;?>">Delete</a>
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
  