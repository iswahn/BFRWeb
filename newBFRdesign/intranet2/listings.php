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
		
		<div id="sub_content">
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
  
  if ($submit == "") {
?>
  <table border="0" width="850" cellspacing="7" cellpadding="4">

<?PHP
    echo "
      <tr><td colspan=2 bgcolor='#BBBBBB'>Add New Listing:</td>
      <tr>
        <td width=\"70%\" valign=\"top\">
          <form method=\"get\">
            <font color=\"#004000\">
			<table>
			<tr><td>MLS ID:</td><td><input type=\"text\" maxlength=\"11\" name=\"mls_id\"></td></tr>
			<tr><td>Street:</td><td><input type=\"text\" maxlength=\"128\" name=\"street\"></td><td>
			   City:</td><td><input type=\"text\" maxlength=\"64\" name=\"town\"></td></tr>
			   <tr><td>State:</td><td><input type=\"text\" maxlength=\"2\" name=\"state\"></td><td>
			   Zipcode:</td><td><input type=\"text\" maxlength=\"5\" name=\"zipcode\"></td></tr>
            <tr><td colspan=\"4\">Short Description: <textarea rows=\"1\" cols=\"60\" name=\"desc_short\"></textarea></td></tr>
            <tr><td colspan=\"4\">Long Description: <textarea rows=\"6\" cols=\"60\" name=\"desc_long\"></textarea></td></tr>
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
        <td width=\"30%\" valign=\"middle\" align=\"center\" >
        &nbsp;
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
     $numImages = 0;
     for ( $j = 1; $j <= 20; $j++) {
       $fname   = "../images/listing-${listing_id}-${j}.jpg";
       $fnamesm = "../images/listing-${listing_id}-${j}-sm.jpg";
       if (file_exists ($fname)) $numImages++;
       else break;
     }

     if      ($numImages > 14) $perLine = $numImages / 3;
     else if ($numImages >  6) $perLine = $numImages / 2;
     else                      $perLine = $numImages;
     $img_list = "";
     $onLine   = 0;
     if (0) echo "<tr><td colspan=2>listing_id=[$listing_id] ; numImages=[$numImages] ; perLine=[$perLine]</td></tr>\n";

     for ( $j = 1; $j <= 20; $j++) {
       $fname   = "../images/listing-${listing_id}-${j}.jpg";
       $fnamesm = "../images/listing-${listing_id}-${j}-sm.jpg";
       if (file_exists ($fname)) {
         if ($onLine >= $perLine) {
           $img_list .= "<br clear=all>";
           $onLine    = 0;
         }
         $onLine++;
         $img_list .= "<a href='$fname'><img src='$fnamesm' border='1' width='100' height='75'></a>";
       }
     }
     if ($img_list == "") $img_list  = "&nbsp;";
                     else $img_list .= "<br clear=all>";

     echo "
        <tr><td colspan=2 bgcolor='#BBBBBB'>Listing #${listing_id} - $desc_short:</td>
        <tr>
          <td width=\"70%\" valign=\"top\">
            <form method=\"get\">
            <font color=\"#004000\">
			<table>
			  <tr><td>MLS ID:</td><td><input type=\"text\" maxlength=\"11\" name=\"mls_id\" value=\"$mls_id\"></td></tr>
			  <tr><td>Street:</td><td><input type=\"text\" maxlength=\"128\" name=\"street\" value=\"$street\"></td><td>
			  City:</td><td><input type=\"text\" maxlength=\"64\" name=\"town\" value=\"$town\"></td></tr>
			  <tr><td>State:</td><td><input type=\"text\" maxlength=\"2\" name=\"state\" value=\"$state\"></td><td>
			  Zipcode:</td><td><input type=\"text\" maxlength=\"5\" name=\"zipcode\" value=\"$zipcode\"></td></tr>
              <tr><td colspan=\"4\">Short Description:<textarea rows=\"1\" cols=\"60\" name=\"desc_short\">$desc_short</textarea></td></tr>
              <tr><td colspan=\"4\">Long Description:<textarea rows=\"6\" cols=\"60\" name=\"desc_long\">$desc_long</textarea></td></tr>
              <tr><td>Status:</td><td><select name=\"status\">
                <option value=\"$status\" selected>$status</option>
                <option value=\"Pending\" >Pending</option>
                <option value=\"Sold\" >Sold</option>
                <option value=\"\" >-- No Status --</option>
              </select></td></tr>
              <tr><td>Price:</td><td><input name=\"price\" type=\"text\" size=\"10\" value=\"$price\"></td></tr>
            <tr><td colspan=\"2\"><input type=\"submit\" name=\"submit\" value=\"Update Listing $listing_id\"></td><td colspan=\"2\">
            <input type=\"submit\" name=\"submit\" value=\"Remove Listing\"></td></tr>
			<table>
            <input type=\"hidden\" name=\"listing_id\" value=\"$listing_id\">
            </form>
          </td>
          <td width=\"30%\" valign=\"middle\" align=\"center\" >
          &nbsp;
          </td>
        </tr>
        <tr>
          <td colspan=2>$img_list</td>
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
					
	
	</div>
</body>

</html>
