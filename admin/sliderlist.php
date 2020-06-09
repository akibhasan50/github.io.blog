<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>

<?php include "../helpers/format.php";?>
<?php 

$fm = new Format();
?>  
        <div class="grid_10">
            <div class="box round first grid">


	
                <h2>Slider List</h2>

			<?php 
			 if(isset($_GET['delid'])){    
				$delid = $_GET['delid'];

				$query = "SELECT * FROM tbl_slider WHERE id='$delid'";
				$value = $db->conn->prepare($query);
				$value->execute();
				$data = $value->fetch();
				
				if($value){
					$delimg = $data['image'];
					unlink($delimg);
				}
					$sql = "DELETE  FROM tbl_slider WHERE id='$delid'";
					$result = $db->conn->prepare($sql);
					$valu = $result->execute();

				 if($valu == true){
                        echo "<span class='success'>slider deleted successfully</span>";
                    }else{
                        echo "<span class='error'>slider not deleted!!! </span>";
                    }

				

				
            }
		
		
		?>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>NO</th>
							
							<th>Post Title</th>
							
							<th>Image</th>
							
							<th>Action</th>
							
						</tr>
					</thead>
					<tbody>
				<?php 
					$sql="SELECT * FROM tbl_slider";
					$value = $db->conn->prepare($sql);
					$value->execute();
					$reault = $value->fetchAll();
					if($value){	
						$i = 0;
						foreach ($reault as $data) {
							$i++;
				?>
						<tr class="odd gradeX">
							<td><?php echo $i ;?></td>
							<td><?php echo $data['title'] ;?></td>
							
							<td><img src ="<?php echo $data['image'] ;?>" height=40px, width=60px></td>
							<?php if( session::get("role")=='0'){?>	
							<td>
							<a href="editslider.php?sliderid=<?php echo $data['id'];?>">Edit</a>
								
							||<a  onclick="return confirm('Are you sure you want to delete this item?')" href="sliderlist.php?delid=<?php echo $data['id'];?>">Delete</a>
							
                            <?php } ;?>
						</tr>
						<?php } } ;?>	 
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
