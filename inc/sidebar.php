
<div class="sidebar clear">

	
			<div class="samesidebar clear">
				<h2>Categories</h2>
					<ul>
						<?php 
							$sql="SELECT * FROM tbl_catagory ";
							$post =$db->conn->prepare($sql);
							$post->execute();
							$result=$post->fetchAll();
						if($post){
							foreach ($result as $value) {

						?>
						<li><a href="posts.php?catagory=<?php echo $value['id'] ;?>"><?php echo $value['name'] ;?></a></li>	
						<?php }}else{header("Location:404.php");};?>				
					</ul>
					
			</div>
			
			<div class="samesidebar clear">
				<h2>Latest articles</h2>
					<div class="popular clear">

					<?php 
							$query="SELECT * FROM tbl_post LIMIT 4";
							$post =$db->conn->prepare($query);
							$post->execute();
							$result=$post->fetchAll();
						if($post){
							foreach ($result as $value) {

						?>
						<h3><a href="post.php?id=<?php echo $value['id'] ;?>"><?php echo $value['title'] ;?> </h3>
						 <a href="#"><img src="admin/<?php echo $value['image'] ;?>" alt="post image"/></a>
						<p>

						<?php echo $fm->textShorten($value['body'],200) ;?>
						</p>	
						<?php }}else{ header("Location: 404.php");}?>	
					</div>
					
					
			</div>
			
		</div>