<html>
<head>
<meta NAME="description" CONTENT= "Brown Family Realty is a family owned, independent real estate agency looking to help you find your next home. We are located in the Warner, New Hampshire area.">
<meta NAME="keywords" CONTENT= "Real Estate, Warner NH, Realty, Warner, NH, NH Warner, MLS, Realtor, Warner Real Estate, Sutton Real Estate, Bradford Real Estate, Hopkinton Real Estate, Central NH Real Estate, homes, country, historic, NH, antique, property, residential, community, rural, Concord area, Warner, school, Kearsarge, older, cape, build, village">
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" type="text/css" href="css/navigation_styles.css">
<link rel="stylesheet" type="text/css" href="css/home_styles.css">
<script src="js/jquery-1.7.2.min.js" type="text/javascript"></script>
<script src="js/jquery.cycle.lite.js" type="text/javascript"></script>
<script type="text/javascript">$(document).ready(function(){$('.myslides').cycle({fit:1,timeout:4000});});</script>
<?php $page="Home"?>
<?php $tagline="Historic, Country Real Estate in Warner New Hamphire"?>
<title>Brown Family Realty - <?php echo $tagline?></title>
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
		
			<p>We are New Hampshire natives welcoming you to Warner and the surrounding areas. 
			We take great pride in bringing buyer and seller together to help you meet your goals.
	        <div id="welcome_subnote">From our family to yours, we welcome you.</div></p>
		
		
			<h3>Our Agents</h3>
			<center>
				<div id="agentProfile">
					<div>
						<center><table>
							<tr><td>Steve Brown</td></tr>
							<tr><td>Broker</td></tr>
							<tr><td><a href="mailto:steve@brownfamilyrealty.com">steve@brownfamilyrealty.com</a></td></tr>
							<!--<tr><td>Phone:</td><td>(603) ###-####</td></tr>--> 
						</table></center>
					</div>
				</div>
				<div id="agentProfile">
					<div>
						<center><table>
							<tr><td>Fran Brown</td></tr>
							<tr><td>Broker</td></tr>
							<tr><td><a href="mailto:fran@brownfamilyrealty.com">fran@brownfamilyrealty.com</a></td></tr>
							<!--<tr><td>Phone:</td><td>(603) ###-####</td></tr>-->
						</table></center>
					</div>
				</div>
				<div id="agentProfile">
					<div>
						<center><table>
							<tr><td>Kathy Brown Parker</td></tr>
							<tr><td>Office Manager, Sales</td></tr>
							<tr><td><a href="mailto:kathy@brownfamilyrealty.com">kathy@brownfamilyrealty.com</a></td></tr>
							<!--<tr><td>Phone:</td><td>(603) ###-####</td></tr>-->
						</table></center>
					</div>
				</div>
			</center>
			
		
		<h3>Search Listings</h3>
		<form action="listings.php?" method="POST" name="searchForm">
			<input type="hidden" name="property_search_action" value="search" />
			<input type="hidden" name="state" value="NH" />
			<input type="hidden" name="county" value="Merrimack" />
			<input type="hidden" name="order_by" value="price" />
			<input type="hidden" name="results_pp" value="10" />
			<table id="searchTable">
			<tr>
				<th>Towns</th>
				<th>Property Type</th>
				<th>Property Attributes</th>
			</tr>
				<tr>
					<td>
							<input type="checkbox" name="town[]" value="Bradford+NH">Bradford, NH<br />
							<input type="checkbox" name="town[]" value="Hopkinton+NH">Hopkinton, NH<br />
							<input type="checkbox" name="town[]" value="New+London+NH">New London, NH<br />
							<input type="checkbox" name="town[]" value="Newbury+NH">Newbury, NH<br />
							<input type="checkbox" name="town[]" value="Salisbury+NH">Salisbury, NH<br />
							<input type="checkbox" name="town[]" value="Sutton+NH">Sutton, NH<br />
							<input type="checkbox" name="town[]" value="Warner+NH">Warner, NH<br />
							<input type="checkbox" name="town[]" value="Webster+NH">Webster, NH<br />
					</td>
					<td>
							<input type="checkbox" name="PropertyType[]" value="644" />Boat Facility<br />
							<input type="checkbox" name="PropertyType[]" value="645" />Commercial/Industrial<br />
							<input type="checkbox" name="PropertyType[]" value="650" />Condo<br />
							<input type="checkbox" name="PropertyType[]" value="649" />Land<br />
							<input type="checkbox" name="PropertyType[]" value="654" />Mfg/Mobile<br />
							<input type="checkbox" name="PropertyType[]" value="652" />Multi-Family<br />
							<input type="checkbox" name="PropertyType[]" value="653" />Rental<br />
							<input type="checkbox" name="PropertyType[]" value="648" />Residential<br />
							<br />
					</td>
					<td>
						<table>
							<tr>
									<td>Price Range:</td><td><input type="text" name="ListingPriceMin" />&nbsp;to&nbsp;<input type="text" name="ListingPriceMax" />
							</tr>
							<tr>
									<td>Bathrooms:</td><td><input type="text" name="BathroomsMin"/>&nbsp;to&nbsp;<input type="text" name="BathroomsMax" /></td>
							</tr>
							<tr>
									<td>Bedrooms:</td><td><input type="text" name="BedroomsMin"/>&nbsp;to&nbsp;<input type="text" name="BedroomsMax" /></td>
							</tr>
							<tr>
									<td>Square Feet:</td><td><input type="text" name="SqFtTotalMin" />&nbsp;to&nbsp;<input type="text" name="SqFtTotalMax" /></td> 
							</tr>
							<tr>
									<td>Acreage:</td><td><input type="text" name="LotSizeAreaMin" />&nbsp;to&nbsp;<input type="text" name="LotSizeAreaMax" /></td> 
							</tr>
							<tr>
									<td>Keywords</td><td><input type="text" name="Keywords" /></td>
							</tr>
							<tr>
								<td>
									<input type="submit" name="search_button" id="search_button" value="Search" />
									<input type="button" name="clear_button" id="clear_button_bottom" value="Clear" />
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>

		</form>
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