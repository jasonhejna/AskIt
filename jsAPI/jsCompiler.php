<?php
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
 		
 		function removeById(id)
		{
		    return (elem=document.getElementById(id)).parentNode.removeChild(elem);
		}
		";
	for ($i=0; $i < $numAnsweres; $i++) {
		//get width of ask-canvas
		echo "
		var div".$i." = document.createElement('div');
		div".$i.".id = \"askQ".$i."\";
		div".$i.".style.cssText = \"overflow:hidden;position:relative;float:left;margin:5px;width:\"+elemwidth+\"px;min-width:90px;min-height:30px;color:grey;background-color:#FFF;\";
		document.getElementById(\"ask-canvas\").appendChild(div".$i.");

		var plus".$i." = document.createElement('div');
		plus".$i.".innerHTML = \"Vote Up\";
		plus".$i.".id = \"plus".$i."\";
		plus".$i.".style.cssText = \"cursor: pointer;text-align:center;background-color:green;color:#FFF;\";
		document.getElementById(\"askQ".$i."\").appendChild(plus".$i.");

		var ifrm = document.createElement('IFRAME');
		ifrm.setAttribute(\"src\", \"//www.youtube.com/embed/XFMrBldVk0s\");
		ifrm.style.width = (elemwidth -4) +\"px\"; 
		
		document.getElementById(\"askQ".$i."\").appendChild(ifrm);


		var minus".$i." = document.createElement('div');
		minus".$i.".innerHTML = \"Vote Down\";
		minus".$i.".id = \"minus".$i."\";
		minus".$i.".style.cssText = \"cursor: pointer;text-align:center;background-color:red;color:#FFF;\";
		document.getElementById(\"askQ".$i."\").appendChild(minus".$i.");

		document.getElementById('minus".$i."').onclick=function(){
			removeById(\"askQ".$i."\");
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