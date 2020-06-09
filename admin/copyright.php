<?php include "inc/header.php" ;?>
 <?php include "inc/sidebar.php" ;?> 

<?php include "../helpers/format.php";?>
<?php 
    
    $fm = new Format();

  
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Copyright Text</h2>
                <div class="block copyblock"> 
       <?php 
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                    $copyright = $fm->validate($_POST['title']);
                   

                    if($copyright == "" ){
                       echo "<span class='error'>field must not be empty!!! </span>";
                    }else{
                        $sql = "UPDATE tbl_copyright SET  title='$copyright' WHERE id='1'";
                         
                        
                        $result = $db->conn->prepare($sql);
                        $value = $result->execute();
                        if ($value == true) {
                            echo "<span class='success'>Data updated Successfully.
                            </span>";
                        }else {
                            echo "<span class='error'>Data Not updated !</span>";
                        }
                    }
               
            }
        
        ?>  
          <form action="" method="POST" enctype="multipart/form-data">
        <?php 
               
                    $query = "SELECT * FROM tbl_copyright  WHERE id='1'";
                    $res=$db->conn->prepare($query);
                    $res->execute();
                    $val = $res->fetchAll();

                    foreach($val as $key){
    
        ?>
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="title" value ="<?php echo $key['title'];?>" name="copyright" class="large" />
                            </td>
                        </tr>
						
						 <tr> 
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    <?php } ;?>
                    </form>
                </div>
            </div>
        </div>
 <?php include "inc/footer.php" ;?>        