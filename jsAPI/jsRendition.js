function run(){
	document.getElementById('ask-canvas').style.cssText = "min-width:170px;min-height:40px;background-color:blue;";
	var num-answeres = "";
	var width = document.getElementById('ask-canvas').style.width;
	var elem-width = width / num-answeres;
	var height = document.getElementById('ask-canvas').style.height;
	var div1 = document.createElement('div');
	div1.innerHTML = "Works";
	div1.id = "askQ1";
	div1.style.cssText = "width:100%;height:100%;color:#FFF;background-color:blue;";
	document.getElementById("ask-canvas").appendChild(div1);
}

function throwErrorMsg(errMsg){
	console.log(errMsg);
	var div = document.createElement('div');
	div.innerHTML = errMsg;
	div.id = "askErrMsg";
	var element=document.getElementById("ask-canvas");
	element.appendChild(div);
}

function load(){
	var checkExist = setInterval(function() {
   if (document.getElementById("ask-canvas") != null) {
      clearInterval(checkExist);
      run();
   }

}, 100); // check every 100ms
} load();

function randomFun(one, two, three, four){

	console.log(one);
	setTimeout(function(){console.log(two);},300);
	setTimeout(function(){console.log(three);},300);
	setTimeout(function(){console.log(four);},300);
}