<?php include "inc/header.php" ;?>
<style>
.error{
	color:red;
}
.success{
	color:green;
}
</style>
	<div class="contentsection contemplete clear">
		<div class="maincontent clear">
			<div class="about">
				<h2>Contact us</h2>


	<?php 
		  if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $firstname = $fm->validate($_POST['firstname']);
                $lastname  = $fm->validate($_POST['lastname']);
                $email 	   = $fm->validate($_POST['email']);
                $body      = $fm->validate($_POST['body']);
				
				if($firstname == "" || $lastname == "" || $email == "" || $body == ""){
                    echo "<span class='error'>Field must not be empty!!! </span>";
                }elseif(filter_var($email,FILTER_VALIDATE_EMAIL)==FALSE){
				 echo "<span class='error'>Enter valid email address!!! </span>";
				 }else{
				   $query = "INSERT INTO tbl_contact (firstname,lastname,email,body) 
					VALUES('$firstname','$lastname','$email','$body')";
					$result = $db->conn->prepare($query);
					$value = $result->execute();
					if ($value == true) {
						echo "<span class='success'>message sent Successfully.
						</span>";
					}else {
						echo "<span class='error' >message Not sent !</span>";
					}
		  }
		}
	?>
			<form action="" method="post">
				<table>
				<tr>
					<td>Your First Name:</td>
					<td>
					<input type="text" name="firstname" placeholder="Enter first name" />
					</td>
				</tr>
				<tr>
					<td>Your Last Name:</td>
					<td>
					<input type="text" name="lastname" placeholder="Enter Last name" />
					</td>
				</tr>
				
				<tr>
					<td>Your Email Address:</td>
					<td>
					<input type="email" name="email" placeholder="Enter Email Address" />
					</td>
				</tr>
				<tr>
					<td>Your Message:</td>
					<td>
					<textarea name="body"></textarea>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
					<input type="submit" name="submit" value="Submit"/>
					</td>
				</tr>
		</table>
	<form>				
 </div>

		</div>
	<?php include "inc/sidebar.php" ;?>		
<?php include "inc/footer.php" ;?>			