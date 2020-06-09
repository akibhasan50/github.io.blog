<?php 
	include "../lib/session.php";
	session::init();
?>

<?php include "../lib/database1.php" ;?>
<?php include "../helpers/format.php" ;?>
<?php 
$db = new Database();
$fm = new Format();
?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>

<div class="container">
	<section id="content">
		<?php 
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$name = $fm->validate($_POST['username']);
				$pass = $fm->validate($_POST['password']);
			if($name=="" || $pass == ""){
				echo "<span class='error'>field must not be empty!!! </span>";
			}else{	
				$sql="SELECT * FROM tbl_user WHERE username='$name' AND password='$pass'";
				$result = $db->conn->prepare($sql);
				$result->execute();
			
			
			if($result->rowCount() > 0){
					
				$key =$result->fetch();
				session::set("login",true);
				session::set("username",$key['username']);
				session::set("userid",$key['id']);
				session::set("userrole",$key['role']);
				 
				header("Location:index.php");
 				

			}else{
				
				echo "<span style='color:red;font-size:18px;'>data not found</span>";
			}

		}
		}

		?>
		<form action="login.php" method="post">
			<h1>Admin Login</h1>
			<div>
				<input type="text" placeholder="Username" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password"  name="password"/>
			</div>
			<div>
				<input type="submit" name="submit"  value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="forgetpass.php">Forget password</a>
		</div><!-- button -->
		<div class="button">
			<a href="#">Travel Freak BD</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>