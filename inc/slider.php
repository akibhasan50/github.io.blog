	
<div class="slidersection templete clear">
        <div id="slider">
        <?php 
                $sql="SELECT * FROM tbl_slider limit 3";
				$post =$db->conn->prepare($sql);
                $post->execute();
                $value= $post->fetchAll();

                foreach  ($value as $key) {
  
        ?>
            <a href="#"><img src="admin/<?php echo $key['image'] ;?>" alt="nature 1" title="<?php echo $key['title'] ;?>" /></a>
           <?php } ;?>   
        </div>
          
</div>