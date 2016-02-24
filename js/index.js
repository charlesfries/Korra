
function analyze(query) {
  document.getElementById("query").value = query;
  
  var words = query.split(" ");
  
  // Lights
	if ($words[0].toLowerCase() == "lights") {
		
		if ($words[1].toLowerCase() == "on") {
      window.location = "?s=allOn";
    }
    
		else if ($words[1].toLowerCase() == "off") {
      window.location = "?s=allOff";
    }
		
    else {
      document.getElementById("query").innerHTML = "Sorry, I am incapable of answering that question.";
  	}
  
}