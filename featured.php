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
<?php include 'navigation.php'; ?>
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
				
				echo '<div id="featuredDesc">';
				$mls = getDescription($dirName);
				echo '</div>';

				echo '<div class="myslides">';
				getImages($dirName, $mls);
				echo '</div>';
				echo "<div id='mlsNum'>Listing ID: ".$mls."</div>";
					
				echo '<p style="clear: both"></p>';
				echo '</div>';
				echo '<hr></hr>';
			}
		}
		
		function getImages($path, $mls)
		{
			foreach (glob($path . "/*.jpg") as $filename)
			{
				echo '<a href="listings.php?mls='.$mls.'">';
				echo '<img id="slideImg" src="' . $filename . '"/>';
				echo '</a>';	   
			}
		}
		
		function getDescription($path)
		{
			$return="";
			foreach (glob($path . "/description.txt") as $filename)
			{
				include $filename;
				$return = $mls;
			}
			return $return;
		}
	?>
	</div>
	<?php include 'footer.php'; ?>
</body>

</html>