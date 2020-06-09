<?php include "inc/header.php" ;?>
 <?php include "inc/sidebar.php" ;?>  


<?php include "../helpers/format.php" ;?>
<?php 

$fm = new Format();
?>
   <?php 
         if(!isset($_GET['viewid'])){
            echo " <script>window.location =' inbox.php';</script>";
         }else{
             $viewid =$_GET['viewid'];
              
         }
         
         
         ?>  
        <div class="grid_10">
       	
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block">
     

          <?php 
	        if($_SERVER['REQUEST_METHOD'] == 'POST'){
             echo " <script>window.location = 'inbox.php';</script>";
            }
         ?>      
                 <form action="" method="POST" enctype="multipart/form-data">
                    <table class="form">
                 <?php 
                    
                    $query = "SELECT * FROM tbl_contact WHERE id='$viewid'";
                    $res=$db->conn->prepare($query);
                    $res->execute();
                    $val = $res->fetchAll();

                    foreach($val as $key){
                 
                 ?>	       
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" name="title" value="<?php echo $key['firstname'].' '.$key['lastname'];?>" class="medium" />
                            </td>
                        </tr>
                    
                        
                          <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" name="email" value="<?php echo $key['email'];?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Date</label>
                            </td>
                            <td>
                                <input type="text" name="date" value="<?php echo $fm->dateFormat($key['date']);?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea name="body" class="tinymce"><?php echo $key['body'];?></textarea>
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
 <?php include "inc/footer.php" ;?>  

