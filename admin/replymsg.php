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
                <h2>Reply to messages</h2>
                <div class="block">
     

          <?php 
	        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $to      = $fm->validate($_POST['toemail']);
                $from    =  $fm->validate($_POST['fromemail']);
                $subject =  $fm->validate($_POST['subject']);
                $message =  $fm->validate($_POST['body']);

                $sendmail = mail($to,$subject,$message,$from);

                if($sendmail ){
                    echo "<span class='success'>message sent successfully!!! </span>";
                }else{
                    echo "<span class='error'>message not sent !!! </span>";
                }
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
                                <label>To</label>
                            </td>
                            <td>
                                <input type="text" readonly name="toemail" value="<?php echo $key['email'];?>" class="medium" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input type="text" name="fromemail" placeholder="enter your email address" class="medium" />
                            </td>
                        </tr>
                         </tr>
                         <tr>
                            <td>
                                <label>subject</label>
                            </td>
                            <td>
                                <input type="text" name="subject" placeholder="enter your subject" class="medium" />
                            </td>
                        </tr>
                        <tr>
                        
                         <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea name="body" class="tinymce"></textarea>
                            </td>
                        </tr> 

						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="REPLY " />
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

