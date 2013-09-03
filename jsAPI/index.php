<?php
error_reporting(-1);//error_reporting(0);
ini_set('display_errors', 'On');
Header("Content-Type: application/x-javascript; charset=UTF-8");
set_time_limit(3600);
if(!$_GET){
	echo "console.log(\"You need to fill in the URL with your API key, and question or question-roller ID. To get your API key, visit: blah.com\");";
}else{
	if ( isset( $_GET['apikey'] ) && !empty( $_GET['apikey'] ) ){
		$apikey = htmlspecialchars($_GET['apikey']);

	if($apikey == "blah"){ //this if statement will be replaces with a db lookup to confirm the API key

		if ( isset($_GET['question']) && !empty($_GET['question']) ){
			$question = htmlspecialchars($_GET['question']);
				//require 'dbconnection.php';
				//require 'questionLookup.php';
				//fix this shit
				require 'questionquery.php';
				
				require 'jsCompiler.php';
				jsCompiler(questionAndAnswer($question));
		}
		elseif( isset($_GET['question-roller']) && !empty($_GET['question-roller']) ){
			$question = htmlspecialchars($_GET['question-roller']);
				//stuff here
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