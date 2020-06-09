
<?php include "inc/header.php" ;?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">

<?php 

    if(!isset($_POST['search']) || $_POST['search'] == NULL){
        header("Location: 404.php");
    }else{
        $search = $_POST['search'];
    }

?>
    <?php 
            $sql="SELECT * FROM tbl_post WHERE title LIKE '%$search%' OR body LIKE '%$search%'";
            $post =$db->conn->query($sql); 
           
            $post->execute();
            $result=$post->fetchAll();
   
            if($post->rowCount()){
                foreach ($result as $value) {
        
    ?>
                <div class="samepost clear">
                        <h2><a href="post.php?id=<?php echo $value['id'] ;?>"><?php echo $value['title'] ;?></a></h2>
                        <h4><?php echo $fm->dateFormat($value['date'] );?> By <a href="#"><?php echo $value['authore'] ;?></a></h4>
                        <a href="#"><img src="admin/<?php echo $value['image'] ;?>" alt="post image"/></a>
                        <p>
                            <?php echo $fm->textShorten($value['body']) ;?>
                        </p>
                        <div class="readmore clear">
                            <a href="post.php?id=<?php echo $value['id'] ;?>">Read More</a>
                        </div>
                </div>

                <?php }} else{?>	

                    <p>Search value dont found</p>
               <?php }?>	
	    </div>
   
<?php include "inc/sidebar.php" ;?>		
<?php include "inc/footer.php" ;?>		