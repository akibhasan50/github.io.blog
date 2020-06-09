<?php include "inc/header.php" ;?>
 <?php include "inc/sidebar.php" ;?> 
 <style>
 .leftside{
     float:left;
     width:70%;

 }
 .rightside{
     float:left;
     width:20%;
 }
 .rightside img{
     height:150px;
     width:170px;
 }
 </style>

<?php include "../helpers/format.php";?>
<?php 
    $db = new Database();
    $fm = new Format();

  
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Update Site Title and Description</h2>
                <div class="block sloginblock">
     
            <div class="leftside">
             <?php 

          if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $title = $_POST['title'];
                $slogan = $_POST['slogan'];

                $permited  = array('png');
                $file_name = $_FILES['logo']['name'];
                $file_size = $_FILES['logo']['size'];
                $file_temp = $_FILES['logo']['tmp_name'];

                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));
                $same_image = 'logo'.'.'.$file_ext;
                $uploaded_image = "upload/".$same_image;


        if($title == "" || $slogan == "" ){
            echo "<span class='error'>Fieled must not be empty!!! </span>";
        }else{
             if(!empty($file_name)){   
                if ($file_size >1048567) {
                     echo "<span class='error'>Image Size should be less then 1MB!</span>";
                } elseif(in_array($file_ext, $permited) === false) {
                    echo "<span class='error'>You can upload only:-".implode(', ', $permited)."</span>";
                } else{
                   
                        move_uploaded_file($file_temp, $uploaded_image);
                        $upquery = "UPDATE title_slogan SET 
                        title='$title',
                        slogan='$slogan',
                        logo='$uploaded_image'
                        WHERE id='1'"; 
                        
                        $upresult = $db->conn->prepare($upquery);
                        $upvalue = $upresult->execute();
                        if ($upvalue == true) {
                            echo "<span class='success'>Data updated Successfully.
                            </span>";
                        }else {
                            echo "<span class='error'>Data Not updated !</span>";
                        }
                }

            }else{
                 $upquery = "UPDATE title_slogan SET 
                        title='$title',
                        slogan='$slogan'
                        WHERE id='1'"; 
                         
                        
                        $upresult = $db->conn->prepare($upquery);
                        $upvalue = $upresult->execute();
                        if ($upvalue == true) {
                            echo "<span class='success'>Data updated Successfully.
                            </span>";
                        }else {
                            echo "<span class='error'>Data Not updated !</span>";
                        }


              }

          }
    }
        ?> 
            <?php 
                  
                    $query = "SELECT * FROM title_slogan WHERE id='1'";
                    $res=$db->conn->prepare($query);
                    $res->execute();
                    $val = $res->fetchAll();

                    foreach($val as $key){
            
            ?>
                      <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">					
                        <tr>
                            <td>
                                <label>Website Title</label>
                            </td>
                            <td>
                                <input type="text" value ="<?php echo $key['title'];?> "name="title" class="medium" />
                            </td>
                        </tr>
						 <tr>
                            <td>
                                <label>Website Slogan</label>
                            </td>
                            <td>
                                <input type="text" value ="<?php echo $key['slogan'];?>" name="slogan" class="medium" />
                            </td>
                        </tr>
                          <tr>
                            <td>
                                <label>logo Image</label>
                            </td>
                            <td>
                                <img src="<?php echo $key['logo'];?>"  width="50px",height="50px" >
                                <br>
                                <input name="logo" type="file" />
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
                    <?php } ;?>
                </div> 
            <div class="rightside">
                  <img src="upload/logo.png" alt="">
            </div>             
                
            </div>
            </div>
        </div>
  <?php include "inc/footer.php" ;?>      