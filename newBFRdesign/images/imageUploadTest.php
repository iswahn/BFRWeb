<html>
<head>
<link rel="stylesheet" type="text/css" href="css/styles.css">
<title>Brown Family Realty</title>
</head>
<body>
<?php
$img = file_get_contents("http://chart.apis.google.com/chart?cht=lc&chs=250x100&chds=0,20");
file_put_contents("listing_240/test.png", $img);

?> 
</body>

</html>