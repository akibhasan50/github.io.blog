
<?php include "../helpers/format.php" ;?>
<?php 

$fm = new Format();
?>

<?php include "inc/header.php" ;?>
 <?php include "inc/sidebar.php" ;?> 
        <div class="grid_10">
<?php 
            if(session::get("userrole")!= '0'){
                echo "<script>window.location='userlist.php';</script>";
            }
?>		
            <div class="box round first grid">
                <h2>Add New user</h2>
               <div class="block copyblock"> 
        <?php 
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $username = $fm->validate($_POST['username']);
                $password = $fm->validate($_POST['password']);
                $role = $fm->validate($_POST['role']);
                $email = $fm->validate($_POST['email']);

                if($username == "" || $password == "" || $role == "" || $email == ""){
                    echo "<span class='error'>field must not be empty!!! </span>";
                }else{
                
                    $emlsql="SELECT * FROM tbl_user where email='$email'";
						$val = $db->conn->prepare($emlsql);
						$val->execute();
                        $reault = $val->fetchAll();
                        
                    if($val->rowCount() >0){
                        echo "<span class='error'>email  already exist!!! </span>";
                    }else{
                        $sql="INSERT INTO  tbl_user (username,password,email,role) VALUES('$username','$password',' $email','$role')";
                        $result =$db->conn->prepare($sql);
                        $value =$result->execute();

                        if($value == true){
                            echo "<span class='success'>user assigned successfully</span>";
                        }else{
                            echo "<span class='error'>user not assigned!!! </span>";
                        }

                    }

            }
         }
        
        ?>
                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>username</label>
                            </td>
                            <td>
                                <input type="text" name="username" placeholder="Enter username..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>password</label>
                            </td>
                            <td>
                                <input type="password" name="password" placeholder="Enter password..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>email</label>
                            </td>
                            <td>
                                <input type="text" name="email" placeholder="Enter email..." class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>user role</label>
                            </td>
                            <td>
                                <select name="role" id="select">
                                    <option >select user role</option>
                                    <option value="0">Admin</option>
                                    <option value="1">Authore</option>
                                    <option value="2">Editor</option>
                                </select>
                            </td>
                        </tr>
						<tr> 
                            <td>
                                
                            </td>
                            <td>
                                <input type="submit" name="submit" Value="create" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
 <?php include "inc/footer.php" ;?>  
