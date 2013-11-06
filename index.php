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
		
			<p>We are New Hampshire natives welcoming "new-comers" to Warner and the surrounding area. 
			We take great pride in placing families in suitable homes with emphasis on bringing buyer 
			and seller together, making the transition as stress-free as possible.
	        <div id="welcome_subnote">From our family to yours, we welcome you.</div></p>
		
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
							<input type="checkbox" name="town[]" value="Bradford, NH">Bradford, NH<br />
							<input type="checkbox" name="town[]" value="Hopkinton, NH">Hopkinton, NH<br />
							<input type="checkbox" name="town[]" value="New London, NH">New London, NH<br />
							<input type="checkbox" name="town[]" value="Newbury, NH">Newbury, NH<br />
							<input type="checkbox" name="town[]" value="Salisbury, NH">Salisbury, NH<br />
							<input type="checkbox" name="town[]" value="Sutton, NH">Sutton, NH<br />
							<input type="checkbox" name="town[]" value="Warner, NH">Warner, NH<br />
							<input type="checkbox" name="town[]" value="Webster, NH">Webster, NH<br />
					</td>
					<td>
							<input type="checkbox" name="PropertyType[]" value="Boat Facility" />Boat Facility<br />
							<input type="checkbox" name="PropertyType[]" value="Commercial/Industrial" />Commercial/Industrial<br />
							<input type="checkbox" name="PropertyType[]" value="Condo" />Condo<br />
							<input type="checkbox" name="PropertyType[]" value="Land" />Land<br />
							<input type="checkbox" name="PropertyType[]" value="Mfg/Mobile" />Mfg/Mobile<br />
							<input type="checkbox" name="PropertyType[]" value="Multi-Family" />Multi-Family<br />
							<input type="checkbox" name="PropertyType[]" value="Rental" />Rental<br />
							<input type="checkbox" name="PropertyType[]" value="Residential" />Residential<br />
							<br />
							<input type="checkbox" value="1" id="Waterfront" name="Waterfront"/>&nbsp;Water Front/Access ONLY<br />
					</td>
					<td>
						<table>
							<tr>
									<td>Price Range:</td><td><input type="text" name="ListingPriceMin" />&nbsp;to&nbsp;<input type="text" name="ListingPriceMax" />
							</tr>
							<tr>
									<td>Bathrooms:</td><td><input type="text" name="Bathrooms"/></td> 
							</tr>
							<tr>
									<td>Bedrooms:</td><td><input type="text" name="Bedrooms"/></td> 
							</tr>
							<tr>
									<td>Square Feet:</td><td><input type="text" name="SqFtTotalMin" />&nbsp;to&nbsp;<input type="text" name="SqFtTotalMax" /></td> 
							</tr>
							<tr>
									<td>Acreage:</td><td><input type="text" name="LotSizeAreaMin" />&nbsp;to&nbsp;<input type="text" name="LotSizeAreaMax" /></td> 
							</tr>
							<tr>
									<td>Units:</td><td><input type="text" name="TotalUnitsMin" />&nbsp;to&nbsp;<input type="text" name="TotalUnitsMax" /></td> 
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