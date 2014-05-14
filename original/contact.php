<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<?php
     $REMOTE_ADDR = $_SERVER["REMOTE_ADDR"];
          $submit = isset($_REQUEST["submit"])   ? $_REQUEST["submit"]   : "";
        $Realname = isset($_REQUEST["Realname"]) ? $_REQUEST["Realname"]     : "";
         $Address = isset($_REQUEST["Address"])  ? $_REQUEST["Address"]  : "";
            $City = isset($_REQUEST["City"])     ? $_REQUEST["City"]  : "";
           $State = isset($_REQUEST["State"])    ? $_REQUEST["State"]  : "";
             $Zip = isset($_REQUEST["Zip"])      ? $_REQUEST["Zip"]  : "";
          $E_mail = isset($_REQUEST["E_mail"])   ? $_REQUEST["E_mail"]    : "";
           $Phone = isset($_REQUEST["Phone"])    ? $_REQUEST["Phone"]    : "";
        $Comments = isset($_REQUEST["Comments"]) ? $_REQUEST["Comments"] : "";
        $Location = isset($_REQUEST["Location"]) ? $_REQUEST["Location"]    : "";
       $Price_low = isset($_REQUEST["Price_low"])? $_REQUEST["Price_low"]    : "";
      $Price_high = isset($_REQUEST["Price_high"])? $_REQUEST["Price_high"]    : "";
     $Total_rooms = isset($_REQUEST["Total_rooms"]) ? $_REQUEST["Total_rooms"]    : "";
        $Bedrooms = isset($_REQUEST["Bedrooms"]) ? $_REQUEST["Bedrooms"]    : "";
           $Baths = isset($_REQUEST["Baths"])    ? $_REQUEST["Baths"]    : "";
           $Acres = isset($_REQUEST["Acres"])    ? $_REQUEST["Acres"]    : "";
     $House_style = isset($_REQUEST["House_style"])? $_REQUEST["House_style"]    : "";

  if ($submit <> "Submit Form") {
    print ("<meta http-equiv=\"refresh\" content=\"0;url=contact.html\">");
  } else {

    $SubmitDate = date ("Y-M-d H:i:s");
    $msg = "
Web Contact Request:

  Name:            $Realname
  Address:         $Address, $City, $State $Zip
  Phone:           $Phone
  E-Mail:          $E_mail
  Submission Date: $SubmitDate
  Remote IP Addr:  $REMOTE_ADDR

  Location:        $Location
  Price Range:     $Price_low - $Price_high
  Total Rooms:     $Total_rooms
  Bedrooms:        $Bedrooms
  Baths:           $Baths
  Acres:           $Acres
  House Style:     $House_style

  Comments:
    $Comments

";

  // mail("to address", "subject", "message", "additional headers")
  mail("info@brownfamilyrealty.com", "(WEB) Contact Request", "$msg", "From: info@brownfamilyrealty.com");

  print ("<meta http-equiv=\"refresh\" content=\"0;url=thanks.html\">");
  }
?>
