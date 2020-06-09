<?php include "inc/header.php" ;?>
 <?php include "inc/sidebar.php" ;?> 
 
<?php include "../helpers/format.php";?>
<?php 
    
    $fm = new Format();

  
?> 
        <div class="grid_10">

            <div class="box round first grid">
                <h2>Update Social Media</h2>
                <div class="block">
        <?php 
            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                    $fb = $fm->validate($_POST['fb']);
                    $tt = $fm->validate($_POST['tt']);
                    $ln = $fm->validate($_POST['ln']);
                    $gp = $fm->validate($_POST['gp']);

                    if($fb == "" || $tt == "" || $ln=="" || $gp==""){
                       echo "<span class='error'>field must not be empty!!! </span>";
                    }else{
                        $sql = "UPDATE social_tbl SET 
                        fb='$fb',
                        tt='$tt',
                        ln='$ln',
                        gp='$gp'
                        WHERE id='1'";
                         
                        
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
                    $query = "SELECT * FROM social_tbl WHERE id='1'";
                    $res=$db->conn->prepare($query);
                    $res->execute();
                    $val = $res->fetchAll();

                    foreach($val as $key){
        
        
                ?> 
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Facebook</label>
                            </td>
                            <td>
                                <input type="text" name="fb" value ="<?php echo $key['fb'];?>" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Twitter</label>
                            </td>
                            <td>
                                <input type="text" name="tt" value ="<?php echo $key['tt'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>LinkedIn</label>
                            </td>
                            <td>
                                <input type="text" name="ln" value ="<?php echo $key['ln'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td>
                                <label>Google Plus</label>
                            </td>
                            <td>
                                <input type="text" name="gp" value ="<?php echo $key['gp'];?>" class="medium" />
                            </td>
                        </tr>
						
						 <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" value="Update" />
                            </td>
                        </tr>
                    </table>
                    
                    </form>
                    <?php } ;?>
                </div>
            </div>
        </div>
      <?php include "inc/footer.php" ;?>  
