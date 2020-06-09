<?php
ob_start();
include "inc/header.php";?>
<?php include "inc/sidebar.php" ;?> 
<?php include "../helpers/format.php" ;?>

<?php 

$fm = new Format();
?>

        <div class="grid_10">

            <div class="box round first grid">

                <h2>Update Category</h2>
             <?php 
                 if(isset($_GET['catid'])){
                    $id = $_GET['catid'];
                }
                if($_SERVER['REQUEST_METHOD'] == 'POST'){
                    $name = $fm->validate($_POST['name']);
                    if($name == ""){
                        echo "<span class='error'>field must not be empty!!! </span>";
                    }else{
                    $sql="UPDATE tbl_catagory SET name='$name' WHERE id='$id'";
                    $result =$db->conn->prepare($sql);
                    $value =$result->execute();

                    if($value == true){
                        echo "<span class='success'>Data updated successfully</span>";
                    }else{
                        echo "<span class='error'>Data not updated!!! </span>";
                    }

                }
            }
        
        ?>
               <div class="block copyblock"> 
    
                <?php 
                
                    
                    $query = "SELECT * FROM tbl_catagory where id='$id' order by id DESC";
                    $res=$db->conn->prepare($query);
                    $res->execute();
                    $val = $res->fetchAll();

                    foreach($val as $key){
                 
                 ?>		
                 <form action="" method="post">
                    <table class="form">	

                        <tr>
                            <td>
                                <input type="text" name="name" value="<?php echo $key['name'] ?>" class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                            
                        </tr>
                <?php } ;?> 
                    </table>
                    </form>
                  
                </div>
            </div>
        </div>
 <?php include "inc/footer.php";
 ob_end_flush();
 ?>  
