<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" type="text/css" href="css/navigation_styles.css">
<link rel="stylesheet" type="text/css" href="css/featured_styles.css">

<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="js/jquery.cycle.lite.js" type="text/javascript"></script>
<script type="text/javascript">$(document).ready(function(){$('.myslides').cycle({fit:1,timeout:4000});});</script>
<?php $page="Featured Listings"?>
<title>Brown Family Realty - <?php echo $page?></title>
</head>
<body>
<?php include 'header.php'; ?>
	<div id="content">
		
		
		<div id="sub_content">
		<?php
			buildFeaturedListings('images');
		?>
		</div>					
	
	<?php
		function buildFeaturedListings($path)
		{
			echo '<hr></hr>';
			foreach (glob($path . "/listing*", GLOB_ONLYDIR) as $dirName)
			{	
				echo '<div id="featuredListing">';
				echo '<div class="myslides">';
				getImages($dirName);
				echo '</div>';
					
				echo '<div class="featuredDesc">';
				getDescription($dirName);
				echo '</div>';
				echo '<p style="clear: both"></p>';
				echo '</div>';
				echo '<hr></hr>';
			}
		}
		
		function getImages($path)
		{
			foreach (glob($path . "/*.jpg") as $filename)
			{
				echo '<img id="slideImg" src="' . $filename . '"/>';	   
			}
		}
		
		function getDescription($path)
		{
			foreach (glob($path . "/description.txt") as $filename)
			{
				echo file_get_contents($filename);	   
			}
		}
	?>
	</div>
	<?php include 'footer.php'; ?>
</body>

</html>