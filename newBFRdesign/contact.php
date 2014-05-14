<!DOCTYPE html>
<html>
<head>
<meta NAME="description" CONTENT= "Tell us more about yourself and what you're looking for so we can better serve your needs.">
<meta NAME="keywords" CONTENT= "Real Estate, Warner NH, Realty, Warner, NH, NH Warner, MLS, Realtor, Warner Real Estate, Sutton Real Estate, Bradford Real Estate, Hopkinton Real Estate, Central NH Real Estate, homes, country, historic, NH, antique, property, residential, community, rural, Concord area, Warner, school, Kearsarge, older, cape, build, village">
<link rel="stylesheet" type="text/css" href="css/styles.css">
<link rel="stylesheet" type="text/css" href="css/navigation_styles.css">
<link rel="stylesheet" type="text/css" href="css/contact_styles.css">
<?php $page="Contact Us"?>
<?php $tagline="Contact Us"?>
<title>Brown Family Realty - <?php echo $tagline?></title>
</head>
<body>
<?php include 'header.php'; ?>
<?php include 'navigation.php'; ?>
	<div id="content">
		
		<div id="sub_content">
		
		<p>Call us at 603-456-3000 to make an appointment or stop by our office at 8 East Main Street, Warner, NH 03278. <a href="https://www.google.com/maps?q=8+East+Main+Street,+Warner,+NH&hl=en&sll=43.281392,-71.81282&sspn=0.055674,0.111494&hnear=8+E+Main+St,+Warner,+New+Hampshire+03278&t=m&z=17" style="color:#0000FF;text-align:left" rel="nofollow">Click here to get directions using Google Maps</a>.</p>

		<p>In order for us to better serve your needs, please take a moment to provide us with the information below. Fields marked with a * are required</p>	
		
		<form name="contact_form" action="thanks.php" method="get" enctype="text/plain">
			<fieldset>
			<legend>About you</legend>
			<div id="contact_div">
				<table id="contact_table">
					<tr>
						<td id="table_heading"><label for="recipientName">Name:*</label></td>
						<td id="table_heading"><label for="email">Email:*</label></td>
					</tr>
					<tr>
						<td><input type="text" name="name" id="about_form" required="required"></input></td>
						<td><input type="email" name="email" id="about_form" required="required"></input></td>
					</tr>
					<tr>
						<td id="table_heading"><label for="address">Street Address:</label></td>
						<td id="table_heading"><label for="city">City:</label></td>
					</tr>
					<tr>
						<td><input type="text" name="address" id="about_form"></input></td>
						<td><input type="text" name="city" id="about_form"></input></td>
					</tr>
					<tr>
						<td id="table_heading"><label for="state">State/Province:</label></td>
						<td id="table_heading"><label for="zip">Zip/Postal Code:</label></td>
					</tr>
					<tr>
						<td><input type="text" name="state" id="about_form"></input></td>
						<td><input type="text" name="zip" id="about_form"></input></td>
					</tr>
					<tr>
						<td id="phone"><label for="recipientName">Phone:</label></td>
					</tr>
					<tr>
						<td><input type="text" name="phone" id="about_form"></input></td>
					</tr>
				</table>
			</div>
			</fieldset>
						
			<fieldset>
			<legend>What you're looking for</legend>
			<div id="contact_div">
				<table id="contact_table">
					<tr>
						<td id="table_heading"><label for="location">Location:</label></td>
						<td id="table_heading"><label for="min_range">Price Range:</label></td>
					</tr>
					<tr>
						<td><select name="location" id="dropdown">
						<option value="No Preference">No Preference</option>
							<option value="Bradford">Bradford NH</option>
							<option value="Contoocook">Contoocook NH</option>
							<option value="Hopkinton">Hopkinton NH</option>
							<option value="New London">New London NH</option>
							<option value="Newbury">Newbury NH</option>
							<option value="Salisbury">Salisbury NH</option>
							<option value="Sutton">Sutton NH</option>
							<option value="Warner">Warner NH</option>
							<option value="Webster">Webster NH</option>
						</select></td>
						<td><select name="min_range" id="dropdown_price">
						<option value="No Minimum">No Minimum</option>
							<option value="25,000" >$25,000</option>
							<option value="50,000" >$50,000</option>
							<option value="60,000" >$60,000</option>
							<option value="70,000" >$70,000</option>
							<option value="80,000" >$80,000</option>
							<option value="90,000" >$90,000</option>
							<option value="100,000" >$100,000</option>
							<option value="125,000" >$125,000</option>
							<option value="150,000" >$150,000</option>
							<option value="175,000" >$175,000</option>
							<option value="200,000" >$200,000</option>
							<option value="250,000" >$250,000</option>
							<option value="300,000" >$300,000</option>
							<option value="350,000" >$350,000</option>
							<option value="400,000" >$400,000</option>
							<option value="450,000" >$450,000</option>
							<option value="500,000" >$500,000</option>
							<option value="550,000" >$550,000</option>
							<option value="600,000" >$600,000</option>
							<option value="650,000" >$650,000</option>
							<option value="700,000" >$700,000</option>
							<option value="750,000" >$750,000</option>
							<option value="800,000" >$800,000</option>
							<option value="850,000" >$850,000</option>
							<option value="900,000" >$900,000</option>
							<option value="950,000" >$950,000</option>
							<option value="1,000,000" >$1,000,000</option>
							<option value="1,100,000" >$1,100,000</option>
							<option value="1,200,000" >$1,200,000</option>
							<option value="1,300,000" >$1,300,000</option>
							<option value="1,400,000" >$1,400,000</option>
							<option value="1,500,000" >$1,500,000</option>
							<option value="1,750,000" >$1,750,000</option>
							<option value="2,000,000" >$2,000,000</option>
							<option value="3,000,000" >$3,000,000</option>
							<option value="4,000,000" >$4,000,000</option>
							<option value="5,000,000" >$5,000,000</option>
							<option value="6,000,000" >$6,000,000</option>
							<option value="7,000,000" >$7,000,000</option>
							<option value="8,000,000" >$8,000,000</option>
							<option value="9,000,000" >$9,000,000</option>
							<option value="10,000,000" >$10,000,000</option>
						</select>
						TO 
						<select name="max_range" id="dropdown_price">
						<option value="No Maximum">No Maximum</option>
							<option value="25,000" >$25,000</option>
							<option value="50,000" >$50,000</option>
							<option value="60,000" >$60,000</option>
							<option value="70,000" >$70,000</option>
							<option value="80,000" >$80,000</option>
							<option value="90,000" >$90,000</option>
							<option value="100,000" >$100,000</option>
							<option value="125,000" >$125,000</option>
							<option value="150,000" >$150,000</option>
							<option value="175,000" >$175,000</option>
							<option value="200,000" >$200,000</option>
							<option value="250,000" >$250,000</option>
							<option value="300,000" >$300,000</option>
							<option value="350,000" >$350,000</option>
							<option value="400,000" >$400,000</option>
							<option value="450,000" >$450,000</option>
							<option value="500,000" >$500,000</option>
							<option value="550,000" >$550,000</option>
							<option value="600,000" >$600,000</option>
							<option value="650,000" >$650,000</option>
							<option value="700,000" >$700,000</option>
							<option value="750,000" >$750,000</option>
							<option value="800,000" >$800,000</option>
							<option value="850,000" >$850,000</option>
							<option value="900,000" >$900,000</option>
							<option value="950,000" >$950,000</option>
							<option value="1,000,000" >$1,000,000</option>
							<option value="1,100,000" >$1,100,000</option>
							<option value="1,200,000" >$1,200,000</option>
							<option value="1,300,000" >$1,300,000</option>
							<option value="1,400,000" >$1,400,000</option>
							<option value="1,500,000" >$1,500,000</option>
							<option value="1,750,000" >$1,750,000</option>
							<option value="2,000,000" >$2,000,000</option>
							<option value="3,000,000" >$3,000,000</option>
							<option value="4,000,000" >$4,000,000</option>
							<option value="5,000,000" >$5,000,000</option>
							<option value="6,000,000" >$6,000,000</option>
							<option value="7,000,000" >$7,000,000</option>
							<option value="8,000,000" >$8,000,000</option>
							<option value="9,000,000" >$9,000,000</option>
							<option value="10,000,000" >$10,000,000</option>
						</select></td>
					</tr>
					<tr>
						<td id="table_heading"><label for="rooms"># of Rooms:</label></td>
						<td id="table_heading"><label for="bedrooms"># of Bedrooms:</label></td>
					</tr>
					<tr>
						<td><select name="rooms" id="dropdown">
						<option value="No Preference">No Preference</option>
							<option value="1-4">1-4</option>
							<option value="5-7">5-7</option>
							<option value="8-10">8-10</option>
							<option value="11-13">11-13</option>
							<option value="14+">14+</option>
						</select></td>
						<td><select name="bedrooms" id="dropdown">
						<option value="No Preference">No Preference</option>
							<option value="1"  >1</option>
							<option value="2"  >2</option>
							<option value="3"  >3</option>
							<option value="4"  >4</option>
							<option value="5"  >5</option>
							<option value="6"  >6</option>
						</select></td>
					</tr>
					<tr>
						<td id="table_heading"><label for="bathrooms"># of Baths:</label></td>
						<td id="table_heading"><label for="acreage">Min. Acreage:</label></td>
					</tr>
					<tr>
						<td><select name="bathrooms" id="dropdown">
							<option value="No Preference">No Preference</option>
							<option value="1"  >1</option>
							<option value="2"  >2</option>
							<option value="3"  >3</option>
							<option value="4"  >4</option>
						</select></td>
						<td><select name="acreage" id="dropdown">
							<option value="No Preference">No Preference</option>
							<option value=".25" >1/4 Acre</option>
							<option value=".5" >1/2 Acre</option>
							<option value=".75" >3/4 Acre</option>
							<option value="1" >1 Acre</option>
							<option value="1.5" >1.5 Acres</option>
							<option value="2" >2 Acres</option>
							<option value="2.5" >2.5 Acres</option>
							<option value="3" >3 Acres</option>
							<option value="5" >5 Acres</option>
							<option value="10" >10 Acres</option>
							<option value="20" >20 Acres</option>
							<option value="50" >50 Acres</option>
							<option value="100" >100 Acres</option>
						</select></input></td>
					</tr>
					<tr>
						<td id="table_heading"><label for="style">House Style:</label></td>
					</tr>
					<tr>
						<td><input type="text" name="style" id="about_form"></input></td>
					</tr>
				</table>
			</div>
			
			<p style="clear: both"></p>
			<div id="comments">
			Comments:<br />
			<textarea name="comments" id="contact_comment"></textarea>
			</div>
			</fieldset>
			<br />
			<input type="submit" value="Submit Form" id="contact_submit">
			<input type="reset" value="Clear Form" id="contact_clear">
			
			</form>
		</div>
					
	
	</div>
<?php include 'footer.php'; ?>
</body>

</html>