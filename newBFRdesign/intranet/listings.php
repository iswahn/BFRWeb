<!DOCTYPE html>
<html>
<head>
<meta NAME="description" CONTENT= "Take a look at the exciting trails, events, and entertainment opportunities in our area.">
<link rel="stylesheet" type="text/css" href="../css/styles.css">
<link rel="stylesheet" type="text/css" href="../css/navigation_styles.css">
<?php $page="Area Info"?>
<?php $tagline="Area Information"?>
<title>Brown Family Realty - <?php echo $tagline?></title>
</head>

<body>
<?php include '../header.php'; ?>
	<div id="content">
<?PHP
     $REMOTE_ADDR = $_SERVER["REMOTE_ADDR"];
		$submit = isset($_REQUEST["submit"])    ? $_REQUEST["submit"]     : "";
		$desc_short = isset($_REQUEST["desc_short"])? $_REQUEST["desc_short"] : "";
		$desc_long = isset($_REQUEST["desc_long"]) ? $_REQUEST["desc_long"]  : "";
		$status = isset($_REQUEST["status"])    ? $_REQUEST["status"]     : "";
		$price = isset($_REQUEST["price"])     ? $_REQUEST["price"]      : "";
		$listing_id = isset($_REQUEST["listing_id"])? $_REQUEST["listing_id"] : "";
		$mls_id = isset($_REQUEST["mls_id"]) && $_REQUEST["mls_id"] != "" ? $_REQUEST["mls_id"] : 0;
		$street = isset($_REQUEST["street"])? $_REQUEST["street"] : "";
		$town = isset($_REQUEST["town"])? $_REQUEST["town"] : "";
		$state = isset($_REQUEST["state"])? $_REQUEST["state"] : "";
		$zipcode = isset($_REQUEST["zipcode"]) && $_REQUEST["zipcode"] != "" ? sprintf("%05d", $_REQUEST["zipcode"]) : 0;
		
  /* variables */
  $hostname   = "localhost";
  $dbName     = "brownfamilyrealty";
  $username   = "bfr";
  $password   = "smp2mm";
  $debug      = 0;

  /* make connection to database */
  MYSQL_CONNECT($hostname, $username, $password) OR DIE("Unable to connect to database");
  @mysql_select_db( $dbName ) or die( "Unable to select database");
  
  $submitImages = isset($_REQUEST["submitImages"])    ? $_REQUEST["submitImages"]     : "";
	include('SimpleImage.php');  
 	function createThumb($filename)
	{
		list($ignore1, $ignore2, $name, $extension) = split("\.", $filename, 4);
		$image = new SimpleImage(); 
		$image->load($filename); 
		$image->resize(250,150); 
		$fullFilePath = "..".$name."-sm.".$extension;
		$image->save($fullFilePath);
	}
	  

if ($submitImages != "") {

	if(is_array($_POST['delete'])){
		foreach($_POST['delete'] as $thumbnailImage){
			unlink($thumbnailImage);
			$lgImageName = str_replace("-sm", "", $thumbnailImage);
			unlink($lgImageName);
		}
	}

	for($i=0;$i<count($_FILES["file"]["name"]);$i++) {
	try{
		$allowedExts = array("gif", "jpeg", "jpg", "png","GIF", "JPEG", "JPG", "PNG");
		$temp = explode(".", $_FILES["file"]["name"][$i]);
		$extension = end($temp);
		if ((($_FILES["file"]["type"][$i] == "image/gif")
		|| ($_FILES["file"]["type"][$i] == "image/jpeg")
		|| ($_FILES["file"]["type"][$i] == "image/jpg")
		|| ($_FILES["file"]["type"][$i] == "image/pjpeg")
		|| ($_FILES["file"]["type"][$i] == "image/x-png")
		|| ($_FILES["file"]["type"][$i] == "image/png"))
		&& in_array($extension, $allowedExts))
		  {
		  if ($_FILES["file"]["error"][$i] > 0)
			{
			echo "Return Code: " . $_FILES["file"]["error"][$i] . "<br>";
			}
		  else
			{
			$dir = "../images/listing_".$listing_id;
			$image = $dir."/". $_FILES["file"]["name"][$i];
			if (!file_exists($dir))
			  {
			  mkdir($dir);
			  }

			if (file_exists($image))
			  {
			  echo $_FILES["file"]["name"][$i] . " already exists. ";
			  }
			else
			  {
			  move_uploaded_file($_FILES["file"]["tmp_name"][$i], $image);
			  createThumb($image);
			  }
			}
		  }
		else
		  {
		  if($_FILES["file"]["name"][$i] != ""){
		  
		  if(!in_array($extension, $allowedExts) && $extenstion != ""){
			throw new Exception("Extension '". $extension ."' not allowed. ");
		  }
		  elseif (($_FILES["file"]["size"][$i]) == 0)
		  {
		  throw new Exception("File too large. File size must be under 2MB. ");
		  }
		  }
		  }
		  }
		  catch(Exception $e){
		  echo $_FILES["file"]["name"][$i]. " cannot be uploaded. ". $e->getMessage() . "<br>";
		  }
		  }
	  }
 
  
  if ($submit == "") {
?>
  <table border="0" width="100%" cellspacing="7" cellpadding="4">

<?PHP
    echo "
      <tr><td colspan=2 bgcolor='#BBBBBB'>Add New Listing:</td>
      <tr>
        <td width=\"70%\" valign=\"top\">
          <form method=\"get\">
            <font color=\"#004000\">
			<table>
			<tr><td>MLS ID:</td><td><input type=\"text\" maxlength=\"11\" name=\"mls_id\"></td></tr>
			<tr><td>Street:</td><td><input type=\"text\" maxlength=\"128\" name=\"street\"></td></tr>
			   <tr><td>City:</td><td><input type=\"text\" maxlength=\"64\" name=\"town\"></td></tr>
			   <tr><td>State:</td><td><input type=\"text\" maxlength=\"2\" name=\"state\"></td></tr>
			   <tr><td>Zipcode:</td><td><input type=\"text\" maxlength=\"5\" name=\"zipcode\"></td></tr>
            <tr><td>Short Description:</td><td><textarea rows=\"1\" cols=\"60\" name=\"desc_short\"></textarea></td></tr>
            <tr><td>Long Description:</td><td><textarea rows=\"6\" cols=\"60\" name=\"desc_long\"></textarea></td></tr>
            <tr><td>Status:</td><td><select name=\"status\">
              <option value=\"\" selected >-- No Status --</option>
              <option value=\"Pending\" >Pending</option>
              <option value=\"Sold\" >Sold</option>
            </select></td></tr>
            <tr><td>Price:</td><td><input name=\"price\" type=\"text\" size=\"10\" value=\"\"></td></tr>
          <tr><td colspan=\"4\"><input type=\"submit\" name=\"submit\" value=\"Add New Listing\"></td></tr>
		  </table>
          </form>
        </td>
      </tr>
";
    echo "<tr> <td width=\"100%\" valign=\"middle\" colspan=\"2\"> <hr noshade size=\"1\"> </td> </tr>\n";
    $select  = "SELECT * FROM properties WHERE `forsale` = '1' ORDER BY listing_id DESC";
    $result  = @mysql($dbName,$select);
    $numRows = @mysql_numrows($result);
  
    for ( $i = 0; $i < $numRows ; $i++ ) {
     /* while there are records to print, print this list of records */
     $myrow = mysql_fetch_row ($result) ;
  
     list ($listing_id, $desc_short, $desc_long, $status, $is_land, $town, $price, $forsale, $mls_id, $street, $state, $zipcode) = $myrow;
	 $zipcode = $zipcode != 0 ? sprintf("%05d", $zipcode) : "";
	 $mls_id = $mls_id != 0 ? $mls_id : "";
     $display_price = number_format($price);
     if ($status == "Sold") $display_status = "- <i><font color='red'>$status</font></i>";
          else if ($status) $display_status = "- <i>$status</i>";
                       else $display_status = "";
  
     /* Display an HR between rows */
     if ($i) echo "
        <tr> <td width=\"100%\" valign=\"middle\" colspan=\"2\"> <hr noshade size=\"1\"> </td> </tr>
";

     /* See if there are any photos
      *   Photos are stored in images/ folder with a name
      *   that is formated as listing-#-#.jpg where the
      *   first # is the listing id and the second #
      *   is in the rage 1-20.
      */
     /*
      * Let's count the number of images
      */
     $img_list = "<table><tr>";
	 $path = "../images/listing_".$listing_id;
	 $imgCount = 0;
    foreach (glob($path . "/*sm.*") as $filename)
	{
		if($imgCount%7 == 0){
			$img_list .= "</tr><tr>";
		}
		list($ignore1, $ignore2, $name, $extension) = split("\.", $filename, 4);
		list($baseDir, $imageDir, $listingImageDir, $imageName) = split("\/", $name, 4);
		$img_list .= '<td align=center><a href="'.substr("..".$name,0,-3).'.'.$extension.'">';
		$img_list .= '<img src="' . $filename . '" width=150px height=90px/>';
		$img_list .= '</a></br>';
		$img_list .= str_replace("-sm", "", $imageName) . '</br>';
		$img_list .= '<input type="checkbox" name="delete[]" value="'.$filename.'"></td>';
		$imgCount++;
	}
	$img_list .= "</tr></table>";

     echo "
        <tr><td colspan=2 bgcolor='#BBBBBB'>Listing #${listing_id} - $desc_short:</td>
        <tr>
          <td width=\"70%\" valign=\"top\">
            <form method=\"get\">
            <font color=\"#004000\">
			<table>
			  <tr><td>MLS ID:</td><td><input type=\"text\" maxlength=\"11\" name=\"mls_id\" value=\"$mls_id\"></td></tr>
			  <tr><td>Street:</td><td><input type=\"text\" maxlength=\"128\" name=\"street\" value=\"$street\"></td></tr>
			  <tr><td>City:</td><td><input type=\"text\" maxlength=\"64\" name=\"town\" value=\"$town\"></td></tr>
			  <tr><td>State:</td><td><input type=\"text\" maxlength=\"2\" name=\"state\" value=\"$state\"></td></tr>
			  <tr><td>Zipcode:</td><td><input type=\"text\" maxlength=\"5\" name=\"zipcode\" value=\"$zipcode\"></td></tr>
              <tr><td>Short Description:</td><td><textarea rows=\"1\" cols=\"60\" name=\"desc_short\">$desc_short</textarea></td></tr>
              <tr><td>Long Description:</td><td><textarea rows=\"6\" cols=\"60\" name=\"desc_long\">$desc_long</textarea></td></tr>
              <tr><td>Status:</td><td><select name=\"status\">
                <option value=\"$status\" selected>$status</option>
                <option value=\"Pending\" >Pending</option>
                <option value=\"Sold\" >Sold</option>
                <option value=\"\" >-- No Status --</option>
              </select></td></tr>
              <tr><td>Price:</td><td><input name=\"price\" type=\"text\" size=\"10\" value=\"$price\"></td></tr>
            <tr><td><input type=\"submit\" name=\"submit\" value=\"Update Listing $listing_id\"></td><td colspan=\"2\">
            <input type=\"submit\" name=\"submit\" value=\"Remove Listing\"></td></tr>
			</table>
            <input type=\"hidden\" name=\"listing_id\" value=\"$listing_id\">
            </form>
          </td>
        </tr>
        <tr>
		  <form method=\"post\" enctype=\"multipart/form-data\">
          <td>
			<table>
				<tr>
					<td>$img_list</td>
				</tr>
				<tr>
					<td>
						<input type=\"hidden\" name=\"listing_id\" value=\"$listing_id\" />
						<table>
							<tr><td><label for=\"file\">Upload New Images:</label></td>
								<td><input type=\"file\" name=\"file[]\" id=\"file\" multiple></td></tr>
							<tr><td></td><td><input type=\"submit\" name=\"submitImages\" value=\"Submit Image Changes\"></td></tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
		</form>
        </tr>
	</tr>
";
    }

    echo "<tr> <td width=\"100%\" valign=\"middle\" colspan=\"2\"></td> </tr>\n";
?>
  </table>
<?PHP
  } else if ($submit == "Remove Listing") {
    echo "Removing listing id # $listing_id<br>\n";
    if (!get_magic_quotes_gpc()) {
      $desc_short = addslashes($desc_short);
      $desc_long  = addslashes($desc_long);
      $status     = addslashes($status);
      $price      = addslashes($price);
    }
    $update  = "UPDATE `properties` SET `forsale` = '0' WHERE `listing_id` = '$listing_id'";
    $result  = @mysql($dbName,$update);
    $numRows = @mysql_numrows($result);
    if (mysql_errno()) {
      echo "Database update failed:<br>\n";
      echo "<b>" . mysql_errno() . ": " . mysql_error() . "</b><br>\n";
      echo "SQL=[$update]<br>\n";
    } else {
      echo "Database update completed.<br>\n";
    }
	
	$path = "../images/listing_".$listing_id;
    foreach (glob($path . "/*sm.*") as $thumbnailImage)
	{
			unlink($thumbnailImage);
			$lgImageName = str_replace("-sm", "", $thumbnailImage);
			unlink($lgImageName);
	}
	rmdir($path);
	
  } else if ($submit == "Add New Listing") {
    echo "Adding New Listing<br>\n";
    if (!get_magic_quotes_gpc()) {
	  $street 	  = addslashes($street);
      $desc_short = addslashes($desc_short);
      $desc_long  = addslashes($desc_long);
      $status     = addslashes($status);
      $price      = addslashes($price);
    }
    $update  = "INSERT INTO `properties` (`mls_id`,`street`, `town`, `state`,`zipcode`,`desc_short`, `desc_long`, `status`, `price`, `forsale`) VALUES ($mls_id,'$street','$town','$state',$zipcode,'$desc_short','$desc_long','$status','$price','1')";
    $result  = @mysql($dbName,$update);
    $numRows = @mysql_numrows($result);
    if (mysql_errno()) {
      echo "Database update failed:<br>\n";
      echo "<b>" . mysql_errno() . ": " . mysql_error() . "</b><br>\n";
      echo "SQL=[$update]<br>\n";
    } else {
      echo "Database update completed.<br>\n";
    }
  } else {
    /* Protect ourselves from special characters */
    if (!get_magic_quotes_gpc()) {
      $desc_short = addslashes($desc_short);
      $desc_long  = addslashes($desc_long);
      $status     = addslashes($status);
      $price      = addslashes($price);
      $listing_id = addslashes($listing_id);
    }

    echo "Updating listing id # $listing_id<br>\n";
    $update  = "UPDATE `properties` SET `mls_id` = '$mls_id', `street` = '$street', `town` = '$town', `state` = '$state', `zipcode` = '$zipcode', `desc_short` = '$desc_short', `desc_long` = '$desc_long', `status` = '$status', `price` = '$price' WHERE `listing_id` = '$listing_id'";
    $result  = @mysql($dbName,$update);
    $numRows = @mysql_numrows($result);
    if (mysql_errno()) {
      echo "Database update failed:<br>\n";
      echo "<b>" . mysql_errno() . ": " . mysql_error() . "</b><br>\n";
      echo "SQL=[$update]<br>\n";
    } else {
      echo "Database update completed.<br>\n";
    }
  }  
?>					
	
	</div>
</body>

</html>
