
<?php include "../helpers/format.php" ;?>
<?php 

$fm = new Format();
?>

<?php include "inc/header.php" ;?>
 <?php include "inc/sidebar.php" ;?> 
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
        <?php 
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $name = $fm->validate($_POST['name']);
                if($name == ""){
                    echo "<span class='error'>field must not be empty!!! </span>";
                }else{
                $sql="INSERT INTO tbl_catagory (name) VALUES('$name')";
                $result =$db->conn->prepare($sql);
                $value =$result->execute();

                if($value == true){
                    echo "<span class='success'>Data inserted successfully</span>";
                }else{
                    echo "<span class='error'>Data not inserted!!! </span>";
                }

            }
         }
        
        ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" name="name" placeholder="Enter Category Name..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
 <?php include "inc/footer.php" ;?>  
