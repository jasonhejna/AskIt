<?php
function jsCompiler($answerw){
	//query, and count # answeres
	$numAnsweres = 3;
	echo "
		function makeCSS(width){
		var style = document.createElement('style');
		style.type = 'text/css';
		style.innerHTML = '.deleteAnswerAnimate { animation: myfirst 2s; -webkit-animation: myfirst 2s; } @keyframes myfirst{ 0%{width:\"+width+\"px;} 100%{width:0px;margin:0px;} } @-webkit-keyframes myfirst{0% {width:\"+width+\"px;} 100% {width:0px;margin:0px;} }';
		document.getElementsByTagName('head')[0].appendChild(style);
		}

		function run(){
		document.getElementById('ask-canvas').style.cssText = \"overflow:hidden;min-width:170px;min-height:40px;background-color:#000;\";
		var numansweres = ".$numAnsweres.";

		var width = document.getElementById(\"ask-canvas\").offsetWidth;
		var height = document.getElementById(\"ask-canvas\").offsetHeight;
		if(numansweres > 4){var numansweres = 4;}
		var elemwidth = (width - (10*".$numAnsweres.")) / numansweres;
		makeCSS(width);

		var question = document.createElement('div');
		question.id = \"question\";
		question.innerHTML = \"Coke or Pepsi?\";
		question.style.cssText = \"margin:5px;color:blue;\";
		document.getElementById(\"ask-canvas\").appendChild(question);
 		
 		function removeById(id)
		{
		    return (elem=document.getElementById(id)).parentNode.removeChild(elem);
		}

		var answeresContainer = document.createElement('div');
		answeresContainer.id = \"answeresContainer\";
		answeresContainer.style.cssText = \"overflow:hidden;height:200px;width:1000px;\";
		document.getElementById(\"ask-canvas\").appendChild(answeresContainer);
		";
	for ($i=0; $i < $numAnsweres; $i++) {
		//get width of ask-canvas
		echo "
		var askQ".$i." = document.createElement('div');
		askQ".$i.".id = \"askQ".$i."\";
		var offsetWidth = ((elemwidth) * ".$i.");
		askQ".$i.".style.cssText = \"overflow:hidden;position:relative;float:left;width:\"+elemwidth+\"px;margin-left:5px;min-height:30px;color:grey;background-color:#FFF;\";
		document.getElementById(\"answeresContainer\").appendChild(askQ".$i.");

		var plus".$i." = document.createElement('div');
		plus".$i.".innerHTML = \"Vote Up\";
		plus".$i.".id = \"plus".$i."\";
		plus".$i.".style.cssText = \"cursor:pointer;text-align:center;width:\"+elemwidth+\"px;background-color:green;color:#FFF;\";
		document.getElementById(\"askQ".$i."\").appendChild(plus".$i.");

		var ifrm = document.createElement('IFRAME');
		ifrm.setAttribute(\"src\", \"//www.youtube.com/embed/XFMrBldVk0s\");
		ifrm.style.width = (elemwidth -2) +\"px\"; 
		document.getElementById(\"askQ".$i."\").appendChild(ifrm);


		var minus".$i." = document.createElement('div');
		minus".$i.".innerHTML = \"Vote Down\";
		minus".$i.".id = \"minus".$i."\";
		minus".$i.".style.cssText = \"cursor: pointer;text-align:center;width:\"+elemwidth+\"px;background-color:red;color:#FFF;\";
		document.getElementById(\"askQ".$i."\").appendChild(minus".$i.");

		document.getElementById('minus".$i."').onclick=function(){
			document.getElementById(\"askQ".$i."\").className = 'deleteAnswerAnimate';
			setTimeout(function(){
				removeById(\"askQ".$i."\");
			},2000);
		}

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