<?php
  $dbh_bgg;
  require("lib_mysqlConnect.php");

  // for each game load xml
  $q = $dbh_bgg->prepare("SELECT name FROM games");
  $q->execute();

  while($row=$q->fetch())
  {
		$name = $row['name'];
		print "$name\n";
	}
