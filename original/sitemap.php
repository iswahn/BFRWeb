<?php
#############################################
# XMLecho Sitemap Generator - Sitemap Proxy #
#############################################
# 
# This script, along with the client.php script,
# allows Google to collect content from your server
# without the content needing to actually exist
# on your server. Whenever Google (or anyone) asks
# for your sitemap, this script will collect your
# most recent sitemap from the XMLecho Sitemap
# server.

include "client.php";
$url = "/sitemap/get-sitemap.echo?id=VO+/vX3vv73vv71begDvv71BzZUGUDvvv70=";
$client = new HttpClient("sitemap.xmlecho.org",80);
header('Content-type: text/xml');
if ($_GET['test']=='yes') {$url = $url."&test=yes";}
$client->get($url);
if ($client->getStatus()!=200) {
  echo "<result type='connection-failure'/>";
} else {
  echo $client->getContent();
}
?>
        