<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Featured Residential Properties</title>
<?PHP include("metatags.html"); ?>
<link rel="stylesheet" href="bfr.css" type="text/css">
</head>
<body link="#000080" vlink="#0000FF">
<div align="left">
<table border="0" width="1024" cellspacing="5" cellpadding="0">
  <tr>
    <td width="110" valign="top"><?PHP include("left.html"); ?></td>
    <td width="596" valign="top"><p align="center">
    <b><i><font size="7">Featured Residential Properties</font></i></b><br>
    <img src="images/magnify.gif" alt="magnify.gif (1631 bytes)" width="198" height="31">
    <br>
    <div align="center"><center>

    <table border="0" width="100%" cellspacing="7" cellpadding="0" width="100%">

<?PHP
  /* variables */
  $hostname   = "localhost";
  $dbName     = "brownfamilyrealty";
  $username   = "bfr";
  $password   = "smp2mm";
  $debug      = 0;

  if (0) { echo "The database server is currently undergoing maintenance and will be back up shortly<br>Notice Updated: 2007-08-12 10:04<br>\n"; }
else
 {
  /* make connection to database */
  MYSQL_CONNECT($hostname, $username, $password) OR DIE("Unable to connect to database");
  @mysql_select_db( $dbName ) or die( "Unable to select database");

  $select  = "SELECT * FROM properties WHERE `forsale` = '1' ORDER BY listing_id DESC";
  $result  = @mysql($dbName,$select);
  $numRows = @mysql_numrows($result);
  
  for ( $i = 0; $i < $numRows ; $i++ ) {
     /* while there are records to print, print this list of records */
     $myrow = mysql_fetch_array ($result) ;

     $listing_id = $myrow['listing_id'];
     $desc_short = $myrow['desc_short'];
     $desc_long  = $myrow['desc_long'];
     $status     = $myrow['status'];
     $is_land    = $myrow['is_land'];
     $town       = $myrow['town'];
     $price      = $myrow['price'];
     $forsale    = $myrow['forsale'];
  
     $display_price = number_format($price);
     if ($status == "Sold") $display_status = "- <i><font color='red'>$status</font></i>";
          else if ($status) $display_status = "- <i>$status</i>";
                       else $display_status = "";
  
     /* Display an HR between rows */
     if ($i) echo "
        <tr><td width=\"100%\"> <hr noshade color=\"000000\"></td></tr>
";

     /* See if there are any photos
      *   Photos are stored in images/ folder with a name
      *   that is formated as listing-#-#.jpg where the
      *   first # is the listing id and the second #
      *   is in the range 1-30.
      */

     /*
      * Let's count the number of images
      */
     $numImages = 0;
     for ( $j = 1; $j <= 30; $j++) {
       $fname   = "images/listing-${listing_id}-${j}.jpg";
       $fnamesm = "images/listing-${listing_id}-${j}-sm.jpg";
if (0) echo "<tr><td>Looking for [$fname]</td></tr>\n";
       if (file_exists ($fnamesm)) $numImages++;
       //else break;
     }
if (0) echo "<tr><td>numImages=[$numImages]</td></tr>\n";

     if      ($numImages > 14) $perLine = $numImages / 3;
     else if ($numImages >  6) $perLine = $numImages / 2;
     else                      $perLine = $numImages;
     if ($perLine > 7) $perLine = 7;
     $img_list = "";
     $onLine   = 0;
     if (0) echo "<tr><td>listing_id=[$listing_id] ; numImages=[$numImages] ; perLine=[$perLine]</td></tr>\n";

     for ( $j = 1; $j <= 30; $j++) {
       $fname   = "images/listing-${listing_id}-${j}.jpg";
       $fnamesm = "images/listing-${listing_id}-${j}-sm.jpg";
       if (file_exists ($fnamesm)) {
         if ($onLine >= $perLine) {
           $img_list .= "<br clear=all>";
           $onLine    = 0;
         }
         $onLine++;
         if (file_exists($fname)) {
           $img_list .= "<a href='$fname'><img src='$fnamesm' border='1' width='100' height='75' hspace='3' vspace='3'></a>";
         } else {
           $img_list .= "<img src='$fnamesm' border='1' width='100' height='75' hspace='3' vspace='3'>";
         }
       }
     }
     if ($img_list == "") $img_list  = "&nbsp;";
                     else $img_list .= "<br clear=all>";

     // else if ($listing_id == "139") $vtour = "http://www.wellcomemat.com/mlspopup/7133E1ACAC/";
     $vtour = "";
     if ($listing_id == "82")       $vtour = "http://www.parrotcreek.com/hometours/";
     else if ($listing_id == "86")  $vtour = "http://www.parrotcreek.com/hometours/bfr02.html";
     else if ($listing_id == "106") $vtour = "http://parrotcreek.com/hometours/bfr_ordway_house.html";
     else if ($listing_id == "124") $vtour = "http://parrotcreek.com/hometours/hometour-1C592278FA.html";
     else if ($listing_id == "126") $vtour = "http://parrotcreek.com/hometours/hometour-D1423D00AE.html";
     else if ($listing_id == "138") $vtour = "http://www.wellcomemat.com/mlspopup/7133E1ACAC/";
     else if ($listing_id == "139") $vtour = "http://www.parrotcreek.com/bfr-1-29-10/";
     else if ($listing_id == "145") $vtour = "http://parrotcreek.com/hometours/bfr_ordway_house.html";
     else if ($listing_id == "149") $vtour = "http://www.parrotcreek.com/bfr-8-6-10/";
     if ($vtour) $img_list .= "<H2><a href=\"" . $vtour . "\">Virtual Tour</a></H2>";

     $history = "";
     if ($listing_id == "126") $history = "history-126.html";
     if ($history) $img_list .= "<H2><a href=\"" . $history . "\">History</a></H2>";

     echo "
        <tr>
          <td width=\"70%\" valign=\"middle\">
            <div>
              <font color=\"#008000\"><b>$desc_short $display_status</b></font> -
              $desc_long \$$display_price
            </div>
          </td>
        </tr>
        <tr><td align='center'>$img_list</td></tr>
        <tr><td valign=\"top\"><font size=\"2\">Listing ID $listing_id</font></td></tr>
  ";
  }

}
?>
    </table>
    </center></div>
<?PHP include ("trailer.php"); ?>
    </td>
  </tr>
</table>
</div>
</body>
</html>
