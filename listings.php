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
		$siteEnd = "search.html?";
		if(isset($_GET['mls'])) {
			$siteEnd = "listing_detail.html?id=".$_GET['mls']."&return=1";
		} else {
			foreach($_POST as $key => $value) {
				if($siteParams != ""){
					$siteParams .= "&";
				}
				if(is_array($_POST[$key])){
					$count = 0;
					foreach($_POST[$key] as $arrayVal){
						if($count > 0){
							$siteParams .= "&";
						}
						$siteParams .= $key."[]=".$arrayVal;
						$count++;
					}
				}else{
					$siteParams .= $key."=".$value;
				}
			}
		}
		
		$sqrFtArray = array ("Commercial/Industrial","Condo","Mfg/Mobile","Multi-Family","Residential");
		if(isset($_POST['SqFtTotalMin']) || isset($_POST['SqFtTotalMax'])){
			if($_POST['SqFtTotalMin'] != "" || $_POST['SqFtTotalMax'] != "" ){
				if(is_array($_POST['PropertyType'])){
					//has values, check to make sure its the right ones
					$containsOne = false;
					foreach($_POST['PropertyType'] as $arrayVal){
						foreach($sqrFtArray as $value){
							if($arrayVal == $value){
								$containsOne = true;
							}
						}
					}
					
					if($containsOne == false){
						foreach($sqrFtArray as $value){
							$siteParams .= "&PropertyType[]=".$value;
						}
					}
				} else {
					foreach($sqrFtArray as $value){
						$siteParams .= "&PropertyType[]=".$value;
					}
				}
			}
		}
		
		$bed_bath = array ("Condo","Mfg/Mobile","Rental","Residential");
		if(isset($_POST['Bathrooms'],$_POST['Bedrooms'])){
			if($_POST['Bathrooms'] != "" || $_POST['Bedrooms'] != "" ){
				if(is_array($_POST['PropertyType'])){
					//has values, check to make sure its the right ones
					$containsOne = false;
					foreach($_POST['PropertyType'] as $arrayVal){
						foreach($bed_bath as $value){
							if($arrayVal == $value){
								$containsOne = true;
							}
						}
					}
					
					if($containsOne == false){
						foreach($bed_bath as $value){
							$siteParams .= "&PropertyType[]=".$value;
						}
					}
				} else {
					//has no values. Must add the right ones.
					foreach($bed_bath as $value){
						$siteParams .= "&PropertyType[]=".$value;
					}
				}
			}
		}
		
		$acreage = array ("Land","Mfg/Mobile","Multi-Family", "Residential");
		if(isset($_POST['LotSizeAreaMin'],$_POST['LotSizeAreaMax'])){
			if($_POST['LotSizeAreaMin'] != "" || $_POST['LotSizeAreaMax'] != "" ){
				if(is_array($_POST['PropertyType'])){
					//has values, check to make sure its the right ones
					$containsOne = false;
					foreach($_POST['PropertyType'] as $arrayVal){
						foreach($acreage as $value){
							if($arrayVal == $value){
								$containsOne = true;
							}
						}
					}
					
					if($containsOne == false){
						foreach($acreage as $value){
							$siteParams .= "&PropertyType[]=".$value;
						}
					}
				} else {
					//has no values. Must add the right ones.
					foreach($acreage as $value){
						$siteParams .= "&PropertyType[]=".$value;
					}
				}
			}
		}
		
		if(isset($_POST['TotalUnitsMin'],$_POST['TotalUnitsMax'])){
			if($_POST['TotalUnitsMin'] != "" || $_POST['TotalUnitsMax'] != "" ){
				if(is_array($_POST['PropertyType'])){
					//has values, check to make sure its the right ones
					$containsOne = false;
					foreach($_POST['PropertyType'] as $arrayVal){
							if($arrayVal == "Multi-Family"){
								$containsOne = true;
							}
					}
					
					if($containsOne == false){
						$siteParams .= "&PropertyType[]=Multi-Family";
					}
				} else {
					//has no values. Must add the right ones.
					$siteParams .= "&PropertyType[]=Multi-Family";
				}
			}
		}
		
		if($siteParams == ""){
			$siteParams = "property_search_action=search&state=NH&county=Merrimack";
		}
		
		$towns = array ("Bradford, NH","Hopkinton, NH", "New London, NH","Newbury, NH","Salisbury, NH","Sutton, NH","Warner, NH","Webster, NH");
		if(is_array($_POST['town'])){
			//at least one is set
		} else {
			foreach($towns as $value){
				$siteParams .= "&town[]=".$value;
			}
		}
		
		$site = $siteBase.$siteEnd.$siteParams;
		
	?>
	<div id="content">
		<div id="sub_content">
			<iframe name="main" src="<?php echo $site?>" width="100%" height="900px" scrolling="auto" frameborder=0 seamless="seamless"></iframe>
		</div>
	</div>
	<?php include 'footer.php'; ?>
</body>
</html>
