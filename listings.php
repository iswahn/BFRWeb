<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<meta NAME="description" CONTENT= "Search for your dream home from listings posted in the Merrimack County area">
<meta NAME="keywords" CONTENT= "Real Estate, Warner NH, Realty, Warner, NH, NH Warner, MLS, Realtor, Warner Real Estate, Sutton Real Estate, Bradford Real Estate, Hopkinton Real Estate, Central NH Real Estate, homes, country, historic, NH, antique, property, residential, community, rural, Concord area, Warner, school, Kearsarge, older, cape, build, village">
<?php $page="Listings"?>
<?php $tagline="MLS Listing Search"?>
<title>Brown Family Realty - <?php echo $tagline?></title>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" type="text/css" href="css/navigation_styles.css">
</head>
<body>
	<?php include 'header.php'; ?>
	<?php include 'navigation.php'; ?>
	<?php
		$siteBase = "http://www.nneren.com/nneren_frame/";
		$siteEnd = "search.php?state=NH";
		if(isset($_GET['mls'])) {
			$siteEnd = "listing_detail.html?id=".$_GET['mls']."&return=1";
		}
		
		$site = $siteBase.$siteEnd;
		
	?>
	<div id="content">
		<div id="sub_content">
			<iframe name="main" src="<?php echo $site?>" width="100%" height="2200px" scrolling="auto" frameborder=0 seamless="seamless"></iframe>
		</div>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
