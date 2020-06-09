<?php include "inc/header.php" ;?>
 <?php include "inc/sidebar.php" ;?>  
<?php include "../helpers/format.php" ;?>
<?php 

$fm = new Format();
?>

			<?php 
			 if(isset($_GET['delpagid'])){    
				$delid = $_GET['delpagid'];

					$sql = "DELETE  FROM tbl_page WHERE id='$delid'";
					$result = $db->conn->prepare($sql);
					$valu = $result->execute();

				 if($valu == true){
                       
                        echo "<script>window.location='index.php';</script>";
                    }else{
                        echo "<span class='error'>post not deleted!!! </span>";
                         echo "<script>window.location='index.php';</script>";
                    }
	
            }
		
		
		?>
        
 <?php include "inc/footer.php" ;?>  

