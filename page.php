<?php include "inc/header.php" ;?>
	
<div class="contentsection contemplete clear">

		<?php 

            if(isset($_GET['pageid']) ){    
                $pageid = $_GET['pageid'];
   
			}
			
		?>
		<div class="maincontent clear">
			<div class="about">
		  <?php 
                    $query = "SELECT * FROM tbl_page WHERE id='$pageid '";
                    $res=$db->conn->prepare($query);
                    $res->execute();
                    $val = $res->fetchAll();

                    foreach($val as $key){
                
                
        ?>
				<h2><?php echo $key['title'];?></h2>
	
				<p><?php echo $key['body'];?></p>
				
		</div>
					<?php } ;?>

</div>

<?php include "inc/sidebar.php" ;?>		
<?php include "inc/footer.php" ;?>			
	