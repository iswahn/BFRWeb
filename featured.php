<!DOCTYPE html>
<html>
<head>
<meta NAME="description" CONTENT= "Take a look at our hand-picked featured properties. These listings are sure to peak your interest.">
<meta NAME="keywords" CONTENT= "Real Estate, Warner NH, Realty, Warner, NH, NH Warner, MLS, Realtor, Warner Real Estate, Sutton Real Estate, Bradford Real Estate, Hopkinton Real Estate, Central NH Real Estate, homes, country, historic, NH, antique, property, residential, community, rural, Concord area, Warner, school, Kearsarge, older, cape, build, village">
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" type="text/css" href="css/navigation_styles.css">
<link rel="stylesheet" type="text/css" href="css/featured_styles.css">

<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="js/jquery.cycle.lite.js" type="text/javascript"></script>
<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="js/jquery.mousewheel.pack.js?v=3.1.3"></script>
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="js//jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css?v=2.1.5" media="screen" />
<!-- Add Thumbnail helper (this is optional) -->
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox-thumbs.css?v=1.0.7" />
<script type="text/javascript" src="js/jquery.fancybox-thumbs.js?v=1.0.7"></script>

<script type="text/javascript">
$(document).ready(function(){$('.myslides').cycle({fit:1,timeout:4000});});

$('.fancybox-thumbs1').fancybox({prevEffect:'fade',nextEffect:'fade',closeBtn:true,arrows:true,nextClick:true,helpers:{thumbs:{width:50,height:50}}});
$('.fancybox-thumbs2').fancybox({prevEffect:'fade',nextEffect:'fade',closeBtn:true,arrows:true,nextClick:true,helpers:{thumbs:{width:50,height:50}}});
$('.fancybox-thumbs3').fancybox({prevEffect:'fade',nextEffect:'fade',closeBtn:true,arrows:true,nextClick:true,helpers:{thumbs:{width:50,height:50}}});
$('.fancybox-thumbs4').fancybox({prevEffect:'fade',nextEffect:'fade',closeBtn:true,arrows:true,nextClick:true,helpers:{thumbs:{width:50,height:50}}});
$('.fancybox-thumbs5').fancybox({prevEffect:'fade',nextEffect:'fade',closeBtn:true,arrows:true,nextClick:true,helpers:{thumbs:{width:50,height:50}}});
$('.fancybox-thumbs6').fancybox({prevEffect:'fade',nextEffect:'fade',closeBtn:true,arrows:true,nextClick:true,helpers:{thumbs:{width:50,height:50}}});
$('.fancybox-thumbs7').fancybox({prevEffect:'fade',nextEffect:'fade',closeBtn:true,arrows:true,nextClick:true,helpers:{thumbs:{width:50,height:50}}});
$('.fancybox-thumbs8').fancybox({prevEffect:'fade',nextEffect:'fade',closeBtn:true,arrows:true,nextClick:true,helpers:{thumbs:{width:50,height:50}}});
$('.fancybox-thumbs9').fancybox({prevEffect:'fade',nextEffect:'fade',closeBtn:true,arrows:true,nextClick:true,helpers:{thumbs:{width:50,height:50}}});
$('.fancybox-thumbs10').fancybox({prevEffect:'fade',nextEffect:'fade',closeBtn:true,arrows:true,nextClick:true,helpers:{thumbs:{width:50,height:50}}});
$('.fancybox-thumbs11').fancybox({prevEffect:'fade',nextEffect:'fade',closeBtn:true,arrows:true,nextClick:true,helpers:{thumbs:{width:50,height:50}}});
$('.fancybox-thumbs12').fancybox({prevEffect:'fade',nextEffect:'fade',closeBtn:true,arrows:true,nextClick:true,helpers:{thumbs:{width:50,height:50}}});
$('.fancybox-thumbs13').fancybox({prevEffect:'fade',nextEffect:'fade',closeBtn:true,arrows:true,nextClick:true,helpers:{thumbs:{width:50,height:50}}});
$('.fancybox-thumbs14').fancybox({prevEffect:'fade',nextEffect:'fade',closeBtn:true,arrows:true,nextClick:true,helpers:{thumbs:{width:50,height:50}}});
$('.fancybox-thumbs15').fancybox({prevEffect:'fade',nextEffect:'fade',closeBtn:true,arrows:true,nextClick:true,helpers:{thumbs:{width:50,height:50}}});
</script>
<?php $page="Featured Listings"?>
<?php $tagline="Featured Residential Properties"?>
<title>Brown Family Realty - <?php echo $tagline?></title>
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
			echo "<center><img src='images/magnify.jpg'></img></center>";
			echo "<hr />";
		
			$count = 0;
			foreach (glob($path . "/listing*", GLOB_ONLYDIR) as $dirName)
			{	
				$count++;
				echo '<div id="featuredListing">';
				
				echo '<div id="featuredDesc">';
				$mls = getDescription($dirName);
				echo '</div>';

				echo '<div class="myslides">';
				getImages($dirName, $count);
				echo '</div>';
				echo "<div id='mlsNum'>";
				echo '<a id="viewLink" href="listings.php?mls='.$mls.'"><div id="viewButton">View Listing</div></a><br />';
				echo "Listing ID: ".$mls;
				echo "</div>";
					
				echo '<p style="clear: both"></p>';
				echo '</div>';
				echo '<hr />';
			}
		}
		
		function getImages($path, $count)
		{
			foreach (glob($path . "/*sm.jpg") as $filename)
			{
				echo '<a class="fancybox-thumbs'.$count.'" data-fancybox-group="thumb" href="'.substr($filename,0,-7).'.jpg'.'">';
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