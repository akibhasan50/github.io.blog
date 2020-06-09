
<?php include "inc/header.php" ;?>
<?php include "inc/slider.php" ;?>


	<div class="contentsection contemplete clear">
		<div class="maincontent clear">

<?php 
	$per_page = 3;

	if(isset($_GET["page"])){
		$page = $_GET["page"];
	}else{
		$page  = 1;
	}
	$current_page = ($page-1)*$per_page;

		$sql="SELECT * FROM tbl_post LIMIT $current_page ,$per_page ";
		$post =$db->conn->prepare($sql);
		$post->execute();
	
		
	if($post->rowCount()){
		while ($value=$post->fetch()) {

?>

			<div class="samepost clear">
				<h2><a href="post.php?id=<?php echo $value['id'] ;?>"><?php echo $value['title'] ;?></a></h2>
				<h4><?php echo $fm->dateFormat($value['date'] );?> By <a href="#"><?php echo $value['authore'] ;?></a></h4>
				 <a href="post.php?id=<?php echo $value['id'] ;?>"><img src="admin/<?php echo $value['image'];?>" alt="post image"/></a>
				<p>
					<?php echo $fm->textShorten($value['body']) ;?>
				</p>
				<div class="readmore clear">
					<a href="post.php?id=<?php echo $value['id'] ;?>">Read More</a>
				</div>
			</div>
	<?php } ;?>	<!--end loop-->	
	<!--pagination-->

<?php 
		$sql="SELECT * FROM tbl_post ";
		$post =$db->conn->prepare($sql);
		$post->execute();
		$column = $post->rowCount();

		$totalPage = ceil($column/$per_page );

		echo "<span class='pagination'><a href='index.php?page=1'>".'First page'."</a>";
		for ($i=1; $i < $totalPage ; $i++) { 
			echo "<a href='index.php?page=".$i."'> ".$i." </a>";
		}

		echo "<a href='index.php?page=$totalPage '>".'Last page'."</a></span>" ;?>
			<!--pagination-->

<?php }else{ header("Location: 404.php");}?>	

	</div>
<?php include "inc/sidebar.php" ;?>		
<?php include "inc/footer.php" ;?>		