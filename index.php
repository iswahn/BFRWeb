<html>
<head>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" type="text/css" href="css/navigation_styles.css">
<link rel="stylesheet" type="text/css" href="css/home_styles.css">
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="js/jquery.cycle.lite.js" type="text/javascript"></script>
<script type="text/javascript">$(document).ready(function(){$('.myslides').cycle({fit:1,timeout:4000});});</script>
<?php $page="Home"?>
<title>Brown Family Realty - <?php echo $page?></title>
</head>
<body>
	<?php include 'header.php'; ?>
	<?php include 'navigation.php'; ?>
	<div id="content">
		<div id="sub_content">
			<?php
				echo '<div class="myslides">';
				getImages("images/home_slideshow");
				echo '</div>';
			?>
		
			<p>We are New Hampshire natives welcoming "new-comers" to Warner and the surrounding area. 
			We take great pride in placing families in suitable homes with emphasis on bringing buyer 
			and seller together, making the transition as stress-free as possible.
	        <div id="welcome_subnote">From our family to yours, we welcome you.</div></p>
		<h2>Our Agents</h2>
			<center>
				<div id="agentProfile">
					<div>
						<center><img id="profileImg" src="images/portrait.jpg"/></center>
					</div>
					<div>
						<center><table>
							<tr><td>Name:</td><td>Steve Brown</td></tr>
							<tr><td>Title:</td><td>Broker</td></tr>
							<tr><td>Email:</td><td>steve@brownfamilyrealty.com</td></tr>
							<tr><td>Phone:</td><td>(603) ###-####</td></tr>
						</table></center>
					</div>
				</div>
				<div id="agentProfile">
					<div>
						<center><img id="profileImg" src="images/portrait.jpg"/></center>
					</div>
					<div>
						<center><table>
							<tr><td>Name:</td><td>Fran Brown</td></tr>
							<tr><td>Title:</td><td>Broker</td></tr>
							<tr><td>Email:</td><td>fran@brownfamilyrealty.com</td></tr>
							<tr><td>Phone:</td><td>(603) ###-####</td></tr>
						</table></center>
					</div>
				</div>
				<div id="agentProfile">
					<div>
						<center><img id="profileImg" src="images/portrait.jpg"/></center>
					</div>
					<div>
						<center><table>
							<tr><td>Name:</td><td>Kathy Brown Parker</td></tr>
							<tr><td>Title:</td><td>Office Manager, Sales</td></tr>
							<tr><td>Email:</td><td>kathy@brownfamilyrealty.com</td></tr>
							<tr><td>Phone:</td><td>(603) ###-####</td></tr>
						</table></center>
					</div>
				</div>
			</center>
		</div>
	</div>
	<?php include 'footer.php'; ?>
	<?php 
			function getImages($path)
		{
			foreach (glob($path . "/*.jpg") as $filename)
			{
				echo '<img id="slideImg" src="' . $filename . '"/>';	   
			}
		}
	?>
</body>

</html>