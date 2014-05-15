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
		$siteBase = "http://www.nneren.com/";
		$siteEnd = "nneren_frame/search.html";
		if(isset($_GET['mls'])) {
			$siteEnd = "listings?MLS_Number=".$_GET['mls'];
		} else {
		
			if(isset($_POST['property_search_action'])){
				$siteEnd = "listings/?";
			}
		
			if(isset($_POST['ListingPriceMin'])){
					$siteParams .= "List_Price[min]=".$_POST['ListingPriceMin'];
			}
			
			if(isset($_POST['ListingPriceMax'])){
					$siteParams .= "&List_Price[max]=".$_POST['ListingPriceMax'];
			}
			
			if(isset($_POST['BedroomsMin'])){
					$siteParams .= "&Bedrooms[min]=".$_POST['BedroomsMin'];
			}
			
			if(isset($_POST['BedroomsMax'])){
					$siteParams .= "&Bedrooms[max]=".$_POST['BedroomsMax'];
			}
			
			if(isset($_POST['BathroomsMin'])){
					$siteParams .= "&Bathroom[min]=".$_POST['BathroomsMin'];
			}
			
			if(isset($_POST['BathroomsMax'])){
					$siteParams .= "&Bathroom[max]=".$_POST['BathroomsMax'];
			}
			
			if(isset($_POST['LotSizeAreaMin'])){
					$siteParams .= "&Acreage[min]=".$_POST['LotSizeAreaMin'];
			}
			
			if(isset($_POST['LotSizeAreaMax'])){
					$siteParams .= "&Acreage[max]=".$_POST['LotSizeAreaMax'];
			}
			
			if(isset($_POST['SqFtTotalMin'])){
					$siteParams .= "&Square_Feet[min]=".$_POST['SqFtTotalMin'];
			}
			
			if(isset($_POST['SqFtTotalMax'])){
					$siteParams .= "&Square_Feet[max]=".$_POST['SqFtTotalMax'];
			}
			
			if(isset($_POST['Keywords'])){
					$siteParams .= "&Keyword=".$_POST['Keywords'];
			}
			
			if(is_array($_POST['PropertyType'])){
				$siteParams .= "&t=";
				$propertyType = 0;
				foreach($_POST['PropertyType'] as $arrayVal){
					if($propertyType > 0){
						$siteParams .= ",";
					}
					$propertyType++;
					$siteParams .= $arrayVal;
					
				}
			}
			
			if(is_array($_POST['town'])){
				$siteParams .= "&Town_State=";
				$towncount = 0;
				foreach($_POST['town'] as $arrayVal){
					if($towncount > 0){
						$siteParams .= ",";
					}
					$towncount++;
					$siteParams .= $arrayVal;
					
				}
			}			
		}
		
		$site = $siteBase.$siteEnd.$siteParams;
	?>
	<div id="content">
			<iframe name="main" src="<?php echo $site?>" width="100%" height="900px" scrolling="auto" frameborder=0 seamless="seamless"></iframe>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
