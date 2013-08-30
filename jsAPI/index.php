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


function jsCompiler($answerw){
	//query, and count # answeres
	$numAnsweres = 4;
	echo "
		function run(){
		document.getElementById('ask-canvas').style.cssText = \"min-width:170px;min-height:40px;background-color:blue;\";
		var numansweres = ".$numAnsweres.";
		var width = document.getElementById(\"ask-canvas\").offsetWidth;
		var height = document.getElementById(\"ask-canvas\").offsetHeight;
		var elemwidth = (width - (10*".$numAnsweres.")) / numansweres;
		console.log(width);
		var question = document.createElement('div');
		question.id = \"question\";
		question.innerHTML = \"Coke or Pepsi?\";
		question.style.cssText = \"margin:5px;color:#FFF;\";
		document.getElementById(\"ask-canvas\").appendChild(question);
 
		";
	for ($i=0; $i < $numAnsweres; $i++) {
		//get width of ask-canvas
		echo "
		var div".$i." = document.createElement('div');
		div".$i.".innerHTML = \"".$answerw."\";
		div".$i.".id = \"askQ".$i."\";
		div".$i.".style.cssText = \"overflow:hidden;position:relative;float:left;margin:5px;width:\"+elemwidth+\"px;min-width:90px;min-height:30px;color:grey;background-color:#FFF;\";
		document.getElementById(\"ask-canvas\").appendChild(div".$i.");

		var ifrm = document.createElement('IFRAME');
		ifrm.setAttribute(\"src\", \"//www.youtube.com/embed/XFMrBldVk0s\");
		ifrm.style.width = elemwidth+\"px\"; 
		ifrm.style.height = elemwidth / 2 +\"px\";
		document.getElementById(\"askQ".$i."\").appendChild(ifrm);

		";
	}

	echo "}";

	echo "
		function throwErrorMsg(errMsg){
			console.log(errMsg);
			var div = document.createElement('div');
			div.innerHTML = errMsg;
			div.id = \"askErrMsg\";
			var element=document.getElementById(\"ask-canvas\");
			element.appendChild(div);
		}

		function load(){
			var checkExist = setInterval(function() {
		   if (document.getElementById(\"ask-canvas\") != null) {
		      clearInterval(checkExist);
		      run();
		   }

		}, 100); // check every 100ms for the ask-canvas element to be loaded
		} load();

		function randomFun(one, two, three, four){
			console.log(one);
			setTimeout(function(){console.log(two);},300);
			setTimeout(function(){console.log(three);},600);
			setTimeout(function(){console.log(four);},900);
		}
	";
}

?>