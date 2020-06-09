 <?php
 //ob_start();
 include "inc/header.php";?>
 <?php include "inc/sidebar.php";?> 

<?php include "../helpers/format.php";?>
<?php 
  
    $fm = new Format();

  
?>

        <div class="grid_10">
         <?php 
         if(!isset($_GET['postid'])){
             echo "id is not set";
         }else{
             $id =$_GET['postid'];
              
         }
         
         
         ?>
            <div class="box round first grid">
                <h2>Update Post</h2>
                <div class="block">

        
        <?php 

          if($_SERVER['REQUEST_METHOD'] == 'POST'){
                echo "<script>window.location='postlist.php';</script>";

          }
           ?>	                  
                 <form action="" method="POST" enctype="multipart/form-data">


                <?php 
                    
                    $query = "SELECT * FROM tbl_post WHERE id='$id' ORDER BY id DESC";
                    $res=$db->conn->prepare($query);
                    $res->execute();
                    $val = $res->fetchAll();

                    foreach($val as $key){
                 
                 ?>	
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input readonly type="text" name="title" value="<?php echo $key['title'];?>" class="medium" />
                            </td>
                        </tr>
                    
                        <tr>
                            <td>
                                <label>Category</label>
                            </td>
                            <td>
                                <select  readonly id="select" name="cat">
                                    <option >select catagory</option>
                <?php 
						$sql="SELECT * FROM tbl_catagory ORDER BY id DESC";
						$value = $db->conn->prepare($sql);
						$value->execute();
						$reault = $value->fetchAll();
						if($value){	
							foreach ($reault as $data) {
				?> 
                                    <option 
                                        <?php if($data['id'] == $key['cat']){?>
                                            selected="selected";
                                        <?php } ;?>
                                    value="<?php echo $data['id'] ;?>"><?php echo $data['name'] ;?></option>

                                 <?php }} ;?> 
                                </select>
                            </td>
                        </tr>
                   
                    
                        <tr>
                            <td>
                                <label> Image</label>
                            </td>
                            <td>
                                <img src="<?php echo $key['image'];?>"  width="50px",height="50px">
                               
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea readonly name="body"  class="tinymce"><?php echo $key['body'];?></textarea>
                            </td>
                        </tr>
                          <tr>
                            <td>
                                <label>Tags</label>
                            </td>
                            <td>
                                <input readonly type="text" name="tags" value="<?php echo $key['tags'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Authore</label>
                            </td>
                            <td>
                                <input type="text" readonly name="authore" value="<?php echo $key['authore'];?>" class="medium" />
                                 

                            </td>
                        </tr>      

						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="OK" />
                            </td>
                        </tr>
                    </table>
                            <?php } ;?>
                    </form>
                </div>
            </div>
        </div>
 
         <!-- Load TinyMCE -->
    <script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            setupTinyMCE();
            setDatePicker('date-picker');
            $('input[type="checkbox"]').fancybutton();
            $('input[type="radio"]').fancybutton();
        });
    </script>
      <!-- Load TinyMCE -->
 <?php include "inc/footer.php";
 
 ob_end_flush();?>  

