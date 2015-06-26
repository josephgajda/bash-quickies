<?php
$to="aa0344@wayne.edu";
$subject="error db connect";
$body="check db";



//connect to the db

$db_username = "somename";
$db_password = "somepass";
$db_server = "someserver.somedomain.wayne.edu";
$db_database = "someDBname";

	$dbconnect = @msyql_connect($db_server, $db_username, $db_password);

// good nogood

if (!$dbconnect) {
          echo "problem";
          exit;
}
if ($dbconnect) {
          echo "no problemo";
          exit;
}



//mail($to,$subject,$body);

?>
