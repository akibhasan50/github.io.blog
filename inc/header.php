
<?php include "lib/database1.php" ;?>
<?php include "helpers/format.php" ;?>
<?php 
$db = new Database();
$fm = new Format();
define("Title","travel freak");
define("keyword","this is travel freak");
?>
<!DOCTYPE html>
<html>
<head>
  <?php 

  if(isset($_GET['pageid'])){
	  $pagetitle =$_GET['pageid'];
	  $sql="SELECT * FROM tbl_page where id='$pagetitle'";
		$value = $db->conn->prepare($sql);
		$value->execute();
		$reault = $value->fetchAll();
		foreach ($reault as $data) {?>
			<title><?php echo $data['title'];?> - <?php echo Title ;?></title>

		<?php } }elseif(isset($_GET['id'])){
				$posteid =$_GET['id'];
				$sql="SELECT * FROM tbl_post where id='$posteid'";
				$value = $db->conn->prepare($sql);
				$value->execute();
				$reault = $value->fetchAll();
				foreach ($reault as $data) {?>
					<title><?php echo $data['title'];?> - <?php echo Title ;?></title>

		<?php } }else{?>
			<title><?php echo $fm->title();?> - <?php echo Title ;?></title>

		<?php } ?>
	<title><?php echo Title ;?></title>
	<meta name="language" content="English">
	<meta name="description" content="It is a website about education">

	<?php 
		if(isset($_GET['id'])){
	    $kid =$_GET['id'];
		$query = "SELECT * FROM tbl_post WHERE id='$kid '";
		$res=$db->conn->prepare($query);
		$res->execute();
		$val = $res->fetchAll();

		foreach($val as $key){?>
	<meta name="keywords" content="<?php echo $key['tags'];?>">
	
		<?php }}else{	?>
	<meta name="keywords" content="<?php echo keyword;?>">
	<?php }?>
	<meta name="author" content="Akib">
	<link rel="stylesheet" href="font-awesome-4.5.0/css/font-awesome.css">	
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="style.css">
	<script src="js/jquery.js" type="text/javascript"></script>
	<script src="js/jquery.nivo.slider.js" type="text/javascript"></script>

<script type="text/javascript">
$(window).load(function() {
	$('#slider').nivoSlider({
		effect:'random',
		slices:10,
		animSpeed:500,
		pauseTime:5000,
		startSlide:0, //Set starting Slide (0 index)
		directionNav:false,
		directionNavHide:false, //Only show on hover
		controlNav:false, //1,2,3...
		controlNavThumbs:false, //Use thumbnails for Control Nav
		pauseOnHover:true, //Stop animation while hovering
		manualAdvance:false, //Force manual transitions
		captionOpacity:0.8, //Universal caption opacity
		beforeChange: function(){},
		afterChange: function(){},
		slideshowEnd: function(){} //Triggers after all slides have been shown
	});
});
</script>
</head>

<body>
	<div class="headersection templete clear">
		<a  href="index.php">
			<div class="logo">
	<?php 
				$sql="SELECT * FROM title_slogan WHERE id='1'";
				$post =$db->conn->prepare($sql);
				$post->execute();
				$value=$post->fetchAll();
				foreach ($value as $key ) {
			
			?>
				<img src="admin/<?php echo $key['logo'] ;?>" alt="Logo"/>
				<h2><?php echo $key['title'] ;?></h2>
				<p><?php echo $key['slogan'] ;?></p>
			</div>
	<?php } ;?>
		</a>
		<div class="social clear">
			<?php 
                    $query = "SELECT * FROM social_tbl WHERE id='1'";
                    $res=$db->conn->prepare($query);
                    $res->execute();
                    $val = $res->fetchAll();

                    foreach($val as $key){
        
        
                ?> 
			<div class="icon clear">
				<a href="<?php echo $key['fb'];?>" target="_blank"><i class="fa fa-facebook"></i></a>
				<a href="<?php echo $key['tt'];?>" target="_blank"><i class="fa fa-twitter"></i></a>
				<a href="<?php echo $key['ln'];?>" target="_blank"><i class="fa fa-linkedin"></i></a>
				<a href="<?php echo $key['gp'];?>" target="_blank"><i class="fa fa-google-plus"></i></a>
			</div>
		<?php } ;?>
			<div class="searchbtn clear">
			<form action="search.php" method="post">
				<input type="text" name="search" placeholder="Search keyword..."/>
				<input type="submit" name="submit" value="Search"/>
			</form>
			</div>
		</div>
	</div>
<div class="navsection templete">
	<ul>
		<li><a 
			<?php 
				$path=$_SERVER['SCRIPT_FILENAME'];
         		$title = basename($path,'.php');
				if($title =='index'){
					echo 'id="active"';
				}
			?>
		
		
		
		 href="index.php">Home</a></li>
		  <?php 
			$sql="SELECT * FROM tbl_page";
			$value = $db->conn->prepare($sql);
			$value->execute();
			$reault = $value->fetchAll();
			if($value){	
				foreach ($reault as $data) {
		?>
			<li><a
			 <?php 

				if(isset($_GET['pageid']) && ($_GET['pageid']== $data['id']) ){
					echo 'id="active"';
				}
			?>
			 href="page.php?pageid=<?php echo $data['id'];?>"> <?php echo $data['title'];?></a></li>
	
		<?php }} ;?>  
		<li><a 
		
		<?php 
				$path=$_SERVER['SCRIPT_FILENAME'];
         		$title = basename($path,'.php');
				if($title =='contact'){
					echo 'id="active"';
				}
			?>
		
		href="contact.php">contract us</a></li>
	</ul>
</div>
