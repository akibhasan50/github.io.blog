
<?php include "inc/header.php" ;?>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">

<?php 

    if(!isset($_GET['catagory']) || $_GET['catagory'] == NULL){
        echo "NO data found in this catagory";
    }else{
        $id = $_GET['catagory'];
    }

?>
    <?php 
            $sql="SELECT * FROM tbl_post WHERE cat='$id'";
            $post =$db->conn->prepare($sql);
           
            $post->execute();
            $result=$post->fetchAll();
            
            if($post ){
                foreach ($result as $value) {
        
    ?>
                <div class="samepost clear">
                        <h2><a href="post.php?id=<?php echo $value['id'] ;?>"><?php echo $value['title'] ;?></a></h2>
                        <h4><?php echo $fm->dateFormat($value['date'] );?> By <a href="#"><?php echo $value['authore'] ;?></a></h4>
                        <a href="post.php?id=<?php echo $value['id'] ;?>"><img src="admin/<?php echo $value['image'] ;?>" alt="post image"/></a>
                        <p>
                            <?php echo $fm->textShorten($value['body']) ;?>
                        </p>
                        <div class="readmore clear">
                            <a href="post.php?id=<?php echo $value['id'] ;?>">Read More</a>
                        </div>
                </div>

                <?php }}else{echo "data not found";}?>	
	    </div>
   
<?php include "inc/sidebar.php" ;?>		
<?php include "inc/footer.php" ;?>		