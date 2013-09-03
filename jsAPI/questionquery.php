<?php
//error_reporting(0);

function questionAndAnswer($questionId){
	try {
		$dbh = new PDO('mysql:host=localhost;dbname=askit', 'root', '');

		$stmt = $dbh->prepare("SELECT * FROM questions where questionId = ?");
		if ($stmt->execute(array($questionId))) {
		  while ($row = $stmt->fetch()) {
		  	
		  	return $row['question'];

		  }
		}


	$dbh = null;
	} catch (PDOException $e) {
	    error_log("SQL ERROR: " . $e->getMessage() );
	    die();
	}
}
?>