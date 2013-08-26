function run(){
	var div = document.createElement('div');
	div.innerHTML = "Works";
	div.id = "askQ1";
	div.style.cssText = "color:#FFF;background-color:blue;";
	var element=document.getElementById("ask-canvas");
	element.appendChild(div);
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

