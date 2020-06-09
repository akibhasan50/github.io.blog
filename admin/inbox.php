<?php include "inc/header.php" ;?>
 <?php include "inc/sidebar.php" ;?>  
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
		  <?php 
			if(isset($_GET['seenid'])){
				$seenid =$_GET['seenid'];

				 $sql="UPDATE tbl_contact SET status='1' WHERE id='$seenid'";
                    $result =$db->conn->prepare($sql);
                    $value =$result->execute();
				 if($value == true){
                        echo "<span class='success'>message sent in seen box</span>";
                    }else{
                        echo "<span class='error'>message  not sent in seen box!!! </span>";
                    }
                    
				
			}
         
         
   		?>	
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>status</th>
							<th>Action</th>
							
						</tr>
					</thead>
					<tbody>
			<?php 
				$sql="SELECT * FROM tbl_contact where status='0' ORDER BY id DESC";
				$value = $db->conn->prepare($sql);
				$value->execute();
				$reault = $value->fetchAll();
				if($value){
					$i =0;
					foreach ($reault as $data) {
						$i++;
			?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $data['firstname'];?></td>
							<td><?php echo $data['email'] ;?></td>
							<td><?php echo $data['body'];?></td>
							<td><?php echo $data['date'];?></td>
							<td><?php echo $data['status'];?></td>
							<td>
								<a href="viewmsg.php?viewid=<?php echo $data['id'];?>">view</a> || 
								<a href="replymsg.php?viewid=<?php echo $data['id'];?>">Reply</a> || 
								<a href="?seenid=<?php echo $data['id'];?>">seen</a> 
								</td>
						</tr>
					<?php }} ;?>	
					</tbody>
				</table>
               </div>
            </div>

	  <div class="box round first grid">
                <h2>seen message</h2>
			<?php 
			 if(isset($_GET['delid'])){    
				$delid = $_GET['delid'];

					$sql = "DELETE  FROM tbl_contact WHERE id='$delid'";
					$result = $db->conn->prepare($sql);
					$valu = $result->execute();

				 if($valu == true){
                       
                        echo "<span class='error'>message  deleted!!! </span>";
                    }else{
                        echo "<span class='error'>post not deleted!!! </span>";
                        
                    }
	
            }
		
		
		?>
                <div class="block">        
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Name</th>
							<th>Email</th>
							<th>Message</th>
							<th>Date</th>
							<th>status</th>
							<th>Action</th>
							
						</tr>
					</thead>
					<tbody>
			<?php 
				$sql="SELECT * FROM tbl_contact where status='1' ORDER BY id DESC";
				$value = $db->conn->prepare($sql);
				$value->execute();
				$reault = $value->fetchAll();
				if($value){
					$i =0;
					foreach ($reault as $data) {
						$i++;
			?>
						<tr class="odd gradeX">
							<td><?php echo $i;?></td>
							<td><?php echo $data['firstname'];?></td>
							<td><?php echo $data['email'] ;?></td>
							<td><?php echo $data['body'];?></td>
							<td><?php echo $data['date'];?></td>
							<td><?php echo $data['status'];?></td>
							<td>
								<a onclick="return confirm('Are you sure you want to delete message?')" href="?delid=<?php echo $data['id'];?>">Delete</a>
								 
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