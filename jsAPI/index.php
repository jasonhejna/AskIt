<?php
error_reporting(-1);
ini_set('display_errors', 'On');
Header("Content-Type: application/x-javascript; charset=UTF-8");
set_time_limit(3600);
if(!$_GET){
	echo "console.log(\"You need to fill in the URL with your API key, and question or answer ID. To get your API key, visit: blah.com\");";
}else{
	if ( isset( $_GET['apikey'] ) && !empty( $_GET['apikey'] ) ){
		$apikey = htmlspecialchars($_GET['apikey']);

	if($apikey == "blah"){ //this if statement will be replaces with a db lookup to confirm the API key

		if ( isset($_GET['answer']) && !empty($_GET['answer']) ){
			$answer = htmlspecialchars($_GET['answer']);
			if($answer != null){ //change from null to a db check
				require 'jsCompiler.php';
				jsCompiler($answer);
			}
		}
		elseif( isset($_GET['question']) && !empty($_GET['question']) ){
			if($question != null){ //this if statement will be replaces with a db lookup to confirm the API key
				$question = htmlspecialchars($_GET['question']);
				//query question
			}
		}
		else{
			echo "console.log(\"Please add a second script tag with the appropriate query in your html.\");";
		}	
	}
	}else{
		echo "console.log(\"Api key failed\");";
	}
}

?>