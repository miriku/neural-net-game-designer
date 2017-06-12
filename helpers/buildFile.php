<?php
  $dbh_bgg;
  require("lib_mysqlConnect.php");

  // for each game load xml
  $q = $dbh_bgg->prepare("SELECT xml, id FROM games LIMIT 10");
  $q->execute();

  while($row=$q->fetch())
  {
		$xml = $row['xml'];
		if(!preg_match("/description/", $xml)) continue;
		$xml = preg_replace("/.*<description>/s", "", $xml);
		$xml = preg_replace("/<\/description>.*/s", "", $xml);
		$xml = preg_replace("/&amp;#10;&amp;#10;/s", "", $xml);
		$xml = preg_replace("/&amp;/s", "&", $xml);
		$xml = preg_replace("/&ndash;/s", "--", $xml);
		print "$xml\n";
	}
