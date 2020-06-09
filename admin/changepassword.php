<?php include "inc/header.php" ;?>
 <?php include "inc/sidebar.php" ;?> 
        <div class="grid_10">
<?php 
$id= session::get("userid");

?>		
            <div class="box round first grid">
                <h2>Change Password</h2>

                <?php 
                        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                            $oldpass = $_POST['password'];
                            $newpass = $_POST['newpass'];

                        if($oldpass == "" || $newpass == ""){
                            echo "<span class='error'>field must not be empty!!! </span>";
                        }else{

                            $sql = "SELECT * from tbl_user where id ='$id' AND password='$oldpass'";
                            $value =$db->conn->prepare($sql);
                            $value->execute();
                            $data = $value->fetchAll();

                            if($value->rowCount() > 0){

                                    $upquery = "UPDATE tbl_user SET 
                                    password='$newpass'
                                    WHERE id='$id'"; 
                                    
                                    $upresult = $db->conn->prepare($upquery);
                                    $upvalue = $upresult->execute();
                                    if ($upvalue == true) {
                                        echo "<span class='success'>password updated Successfully.
                                        </span>";
                                    }else {
                                        echo "<span class='error'>password Not updated !</span>";
                                    }
                            }else{
                                 echo "<span class='error'>old password dont match!!! </span>";
                            }

                        }

                    }
                
                ;?>
                
                <div class="block">               
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Old Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter Old Password..."  name="password" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>New Password</label>
                            </td>
                            <td>
                                <input type="password" placeholder="Enter New Password..." name="newpass" class="medium" />
                            </td>
                        </tr>
						 
						
						 <tr>
                            <td>
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="Update" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
 <?php include "inc/footer.php" ;?>