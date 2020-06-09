<?php include "inc/header.php" ;?>
 <?php include "inc/sidebar.php" ;?>  
<?php include "../helpers/format.php" ;?>
<?php 

$fm = new Format();
?>
<style>
.actiondel{
    border: 1px solid #ddd;
    color: #444;
    cursor: pointer;
    font-size: 20px;
    padding: 2px 10px;
    color:#444;
    margin-left:10px;
    background:#f0f0f0;
    font-weight:normal;


}

</style>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Edit  Pages</h2>
                <div class="block">
        	<?php 
			 if(isset($_GET['delpagid'])){    
                $delid = $_GET['delpagid'];
                
                echo $delid;
                /*
                
        $query = "SELECT * FROM tbl_page WHERE id='$delid'";
				$value = $db->conn->prepare($query);
				$value->execute();
				$data = $value->fetch();
				
				
					$sql = "DELETE  FROM tbl_post WHERE id='$delid'";
					$result = $db->conn->prepare($sql);
					$valu = $result->execute();

				 if($valu == true){
                        //echo "<span class='success'>post deleted successfully</span>";
                        header("Location:index.php");
                    }else{
                        echo "<span class='error'>post not deleted!!! </span>";
                        //header("Location:index.php");
                    }
                 */
				
	
            }
		
		
		?>
        
        <?php 

            if(isset($_GET['pageid']) ){    
                $pageid = $_GET['pageid'];
                
                
            }
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $title = $_POST['title'];
                $body = $_POST['body'];

                if($title == "" || $body == "" ){
                    echo "<span class='error'>Fieled must not be empty!!! </span>";
                } else{
                       
                       $upquery = "UPDATE tbl_page SET 
                        title='$title',
                        body='$body'
                        WHERE id='$pageid'"; 
                        
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
        ?>               
                 <form action="" method="POST" >

                <?php 
                    $query = "SELECT * FROM tbl_page WHERE id='$pageid '";
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
                                <input type="text" name="title" value ="<?php echo $key['title'];?>" class="medium" />
                            </td>
                        </tr>
  
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name="body" name="body" class="tinymce"><?php echo $key['body'];?></textarea>
                            </td>
                       
                        </tr>
                              

						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="create" />
                                <span class='actiondel'><a onclick="return confirm('Are you sure you want to delete this item?')";  href="delpage.php?delpagid=<?php echo $key['id'];?>">Delete</a></span>
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

