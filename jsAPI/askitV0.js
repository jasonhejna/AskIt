function load(){
	var checkExist = setInterval(function() {
   if (document.getElementById("ask-canvas") != null) {
      console.log("Exists!");
      run();
      clearInterval(checkExist);
   }
}, 100); // check every 100ms


}

function run(){
	var div = document.createElement('div');
	div.innerHTML = "super sayen";
	var element=document.getElementById("ask-canvas");
	element.appendChild(div);
}