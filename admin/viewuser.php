<?php include "inc/header.php";?>
 <?php include "inc/sidebar.php";?> 

<?php include "../helpers/format.php";?>
        
<?php 
    $fm = new Format();
    if(isset($_GET['viewid'])){
        $userid = $_GET['viewid'];
    }else{
       echo "<script>window.location='userlist.php';</script>";
    }
            
?>

        <div class="grid_10">
     
            <div class="box round first grid">
                <h2>user profile</h2>
        <?php 
         
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
             echo "<script>window.location='userlist.php';</script>";
            
         }
         
         
         ?>   
                <div class="block">
<form action="" method="POST" enctype="multipart/form-data">
        <?php 
            
           
            $query = "SELECT * FROM tbl_user WHERE id='$userid' ";
            $res=$db->conn->prepare($query);
            $res->execute();
            $val = $res->fetchAll();

            foreach($val as $key){
                 
         ?>

                    <table class="form">
             
           	          
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" readonly name="name"  value="<?php echo $key['name'];?>"  class="medium" />
                            </td>
                        </tr>
                    
                         <tr>
                            <td>
                                <label>Userame</label>
                            </td>
                            <td>
                                <input type="text" readonly name="username" value="<?php echo $key['username'];?>" class="medium" />
                            </td>
                        </tr>
                          <tr>
                            <td>
                                <label>Email</label>
                            </td>
                            <td>
                                <input type="text" readonly name="email" value="<?php echo $key['email'];?>" class="medium" />
                            </td>
                        </tr>
                         
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Details</label>
                            </td>
                            <td>
                                <textarea name="details"  readonly class="tinymce"><?php echo $key['details'];?></textarea>
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

