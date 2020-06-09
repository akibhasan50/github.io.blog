<?php include "inc/header.php" ;?>
<?php 

	if(!isset($_GET['id']) || $_GET['id'] == NULL){
		header("Location: 404.php");
	}else{
		$id = $_GET['id'];
	}

	
?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
		<div class="about">
		<?php 
				$sql="SELECT * FROM tbl_post WHERE id='$id'";
				$post =$db->conn->prepare($sql);
				$post->execute();
		
		if($post->rowCount()){
			while ($value=$post->fetch()) {

		?>
				<h2><?php echo $value['title'] ;?></h2>
				<h4><?php echo $fm->dateFormat($value['date'] );?> By <a href="#"><?php echo $value['authore'] ;?></a></h4>
				<img src="admin/<?php echo $value['image'] ;?>" alt="post image"/>
				<p>
				<?php echo $value['body'] ;?>	
				</p>


				<div class="relatedpost clear">
					<h2>Related articles</h2>
								
				<?php 
				$catid =$value['cat'];
				$catsql="SELECT * FROM tbl_post WHERE cat='$catid' LIMIT 6";
				$catpost =$db->conn->prepare($catsql);
				$catpost->execute();
				$catresult=$catpost->fetchAll();
						if($catpost){
							foreach ($catresult as $key) {
				?>

					<a href="post.php?id=<?php echo $key['id'] ;?>"><img src="admin/<?php echo $key['image'] ;?>" alt="post image"/>
					</a>
				<?php } }else{ echo "no available post";};?>
				</div>
				<?php } }else{header("Location: 404.php");}?>
			</div>

	</div>

<?php include "inc/sidebar.php" ;?>		
<?php include "inc/footer.php" ;?>				