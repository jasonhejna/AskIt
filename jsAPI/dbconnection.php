<?php
//error_reporting(0);
try {
	$dbh = new PDO('mysql:host=localhost;dbname=askit', 'root', '');

	$stmt = $dbh->prepare("SELECT * FROM question where questionId = ?");
	if ($stmt->execute(array($_GET['answer']))) {
	  while ($row = $stmt->fetch()) {
	    echo $row['answerId'];
	  }
	}

$dbh = null;
} catch (PDOException $e) {
    error_log("SQL ERROR: " . $e->getMessage() );
    die();
}
?>