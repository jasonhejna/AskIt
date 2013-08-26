<?php
Header("Content-Type: application/x-javascript; charset=UTF-8");
set_time_limit(3600);

$apikey = htmlspecialchars($_GET['apiKey']);
if($apikey == "blah"){ //this if statement will be replaces with a db lookup to confirm the API key
	$question = htmlspecialchars($_GET['question']);
	if($question != null){ //change from null to a db check
		//echo "document.write(\"<script src='http://localhost/AskIt/jsAPI/askitV0.js'> load(); </script>\")";
		echo "
			function run(){
				document.getElementById('ask-canvas').style.cssText = \"min-width:170px;min-height:40px;background-color:blue;\";
				var div = document.createElement('div');
				div.innerHTML = \"".$question."\";
				div.id = \"askQ1\";
				div.style.cssText = \"width:100%;height:100%;color:#FFF;background-color:blue;\";
				var element=document.getElementById(\"ask-canvas\");
				element.appendChild(div);
			}

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

			}, 100); // check every 100ms
			} load();

			function randomFun(one, two, three, four){
				console.log(one);
				setTimeout(function(){console.log(two);},300);
				setTimeout(function(){console.log(three);},600);
				setTimeout(function(){console.log(four);},900);
			}
		";
	}
	
}

?>