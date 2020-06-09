<?php include "inc/header.php" ;?>
 <?php include "inc/sidebar.php" ;?>  
<?php include "../helpers/format.php" ;?>
<?php 

$fm = new Format();
?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2>Add New Post</h2>
                <div class="block">
        <?php 
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $title = $_POST['title'];
                $body = $_POST['body'];

                if($title == "" || $body == "" ){
                    echo "<span class='error'>Fieled must not be empty!!! </span>";
                } else{
                       
                        $query = "INSERT INTO tbl_page  (title,body) 
                        VALUES('$title','$body')";
                        $result = $db->conn->prepare($query);
                        $value = $result->execute();
                        if ($value == true) {
                            echo "<span class='success'>page created Successfully.
                            </span>";
                        }else {
                            echo "<span class='error'>page  Not created Successfully !</span>";
                        }
                }
          }
        ?>               
                 <form action="addpage.php" method="POST" >
                    <table class="form">
                       
                        <tr>
                            <td>
                                <label>Title</label>
                            </td>
                            <td>
                                <input type="text" name="title" placeholder="Enter Post Title..." class="medium" />
                            </td>
                        </tr>
                    
                      
                   
 
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Content</label>
                            </td>
                            <td>
                                <textarea name="body" name="body" class="tinymce"></textarea>
                            </td>
                        </tr>
                              

						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="create" />
                                
                            </td>
                        </tr>
                    </table>
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

