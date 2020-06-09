<?php include "inc/header.php";?>
<?php include "inc/sidebar.php";?>

<?php include "../helpers/format.php";?>
<?php 

$fm = new Format();
?>  
        <div class="grid_10">
            <div class="box round first grid">


	
                <h2>Post List</h2>

			<?php 
			 if(isset($_GET['delid'])){    
				$delid = $_GET['delid'];

				$query = "SELECT * FROM tbl_post WHERE id='$delid'";
				$value = $db->conn->prepare($query);
				$value->execute();
				$data = $value->fetch();
				
				if($value){
					$delimg = $data['image'];
					unlink($delimg);
				}
					$sql = "DELETE  FROM tbl_post WHERE id='$delid'";
					$result = $db->conn->prepare($sql);
					$valu = $result->execute();

				 if($valu == true){
                        echo "<span class='success'>post deleted successfully</span>";
                    }else{
                        echo "<span class='error'>post not deleted!!! </span>";
                    }

				

				
            }
		
		
		?>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th  width ="5%">NO</th>
							<th  width ="8%">Category</th>
							<th  width ="15%">Post Title</th>
							<th  width ="20%">Body</th>
							<th  width ="7%">Image</th>
							<th  width ="10%">Authore</th>
							<th  width ="10%">Tags</th>
							<th  width ="10%">Date</th>
							<th  width ="15%">Action</th>
							
						</tr>
					</thead>
					<tbody>
				<?php 
					$sql = "SELECT tbl_post.*,tbl_catagory.name 
							FROM tbl_post 
							INNER JOIN tbl_catagory
							ON tbl_post.cat =tbl_catagory.id
							ORDER BY tbl_post.title DESC";
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
							<td><?php echo $data['cat'] ;?></td>
							<td><?php echo $data['title'] ;?></td>
							<td><?php echo $fm->textShorten($data['body'],50) ;?></td>
							<td><img src ="<?php echo $data['image'] ;?>" height=40px, width=40px></td>
							<td><?php echo $data['authore'] ;?></td>
							<td><?php echo $data['tags'] ;?></td>
							<td><?php echo  $fm->dateFormat($data['date']) ;?></td>
							<td>
							<a href="viewpost.php?postid=<?php echo $data['id'];?>">View</a>
							<?php if(session::get("userid") == $data['userid'] || session::get("role")=='0'){?>
								||<a href="editpost.php?postid=<?php echo $data['id'];?>">Edit</a>
								
								||<a  onclick="return confirm('Are you sure you want to delete this item?')" href="postlist.php?delid=<?php echo $data['id'] ;?>">Delete</a>
							<?php } ;?>	 
								 </td>
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
