<title>Free VPN - IP, Username and Password</title>
<?php
libxml_use_internal_errors(true);

$vpn_s1 = "https://freevpn.me/accounts/";
$vpn_s2 = "https://freevpn.se/accounts/";
$vpn_s3 = "https://freevpn.im/accounts/";
$vpn_s4 = "https://freevpn.it/accounts/";
$vpn_s5 = "https://freevpn.be/accounts/";
$vpn_s6 = "https://freevpn.co.uk/accounts/";


get_login($vpn_s1);
get_login($vpn_s2);
get_login($vpn_s3);
get_login($vpn_s4);
get_login($vpn_s5);
get_login($vpn_s6);




function get_login($url){
  echo "<b>".parse_url($url, PHP_URL_HOST)."</b> - ";
  $source = file_get_contents($url);

  $doc = new \DOMDocument();
  $doc->loadHTML($source);

  $xpath = new \DOMXpath($doc);
  $item = $xpath->query('//div[@class="plan"]/ul/li');

  for($i=0;$i<=3;$i++){
    echo str_replace(" (adsbygoogle=window.adsbygoogle||[]).push({});","",$item->item($i)->nodeValue) . "<br>";
  }
  echo "<br><br>";
}

?>
