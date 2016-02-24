function about() {
  alert("Korra Platform v1.0\nCreated by Charles Fries\n© 2016 Charles Fries");
}

document.onkeypress = function() {
  document.getElementById("query").focus();
}

function go() {
  if (event.keyCode == 13) analyze(document.getElementById("query").value);
}

if (annyang) {
  var commands = {
    "lights on": function() {
      analyze("lights on");
    },
    "lights off": function() {
      analyze("lights off");
    }
  };
  annyang.addCommands(commands);
  annyang.start();
  /*var commands = {
    "korra *tag": showFlickr
  };
  var showFlickr = function(tag) {
    analyze(tag);
  }*/
}

function analyze(query) {
  
  // Interface
  document.getElementById("query").value = query;
  
  var opts = {
    lines: 13,
    length: 28,
    width: 14,
    radius: 42,
    scale: 0.3,
    corners: 1,
    color: "#fff",
    opacity: 0.25,
    rotate: 0,
    direction: 1,
    speed: 1,
    trail: 60,
    fps: 20,
    zIndex: 2e9,
    className: "spinner",
    top: "50%",
    left: "50%",
    shadow: false,
    hwaccel: false,
    position: "relative"
  };
  var spinner = new Spinner(opts).spin(document.getElementById("loader"));
  
  var audio = new Audio("audio/blip.mp3");
  audio.play();
  
  // Processing
  var words = query.split(" ");
  
  if (words[0].toLowerCase() == "lights") {
    if (words[1].toLowerCase() == "on") {
      window.location = "?s=allOn&q="+query;
    } else if (words[1].toLowerCase() == "off") {
      window.location = "?s=allOff&q="+query;
    }
  } else {
    document.getElementById("response").innerHTML = "Sorry, I am incapable of answering that question.";
  }
}

/*

// Analyzer

if ($_GET["q"]) {
	$words = explode(" ", $_GET["q"]);
	
	// Lights
	if ($words[0] == strtolower("lights")) {
		
		// All Control
		if ($words[1] == strtolower("on"))
			$response = $deskLamp->turnAllOn();
		else if ($words[1] == strtolower("off"))
			$response = $deskLamp->turnAllOff();
		
		// Colors
		else if (array_key_exists(strtolower($words[1]), $colors)) {
			
			if (array_key_exists(strtolower($words[2]), $colors)) {
				$deskLamp->setColor($colors[strtolower($words[1])]);
				$tallLamp->setColor($colors[strtolower($words[2])]);
				$response = "Desk Lamp set to ".$words[1]." and Tall Lamp  set to ".$words[2].".";
			}
			else {
				$deskLamp->setColor($colors[strtolower($words[1])]);
				$tallLamp->setColor($colors[strtolower($words[1])]);
				$response = "All lights set to ".$words[1].".";
			}
		}
		
		else if (strtolower($words[1]) == "white") {
			if (is_numeric($words[2]) && ($words[2] >= 0 || $words[2] <= 100)) {
				$intensity = $words[2];
			} else {
				$intensity = 100;
			}
			$deskLamp->setIntensity($intensity);
			$tallLamp->setIntensity($intensity);
			$response = "All lights made white.";
		}
		
		// Intensity
		else if (is_numeric($words[1]) && ($words[1] >= 0 || $words[1] <= 100)) {
			
			if (is_numeric($words[2]) && ($words[2] >= 0 || $words[2] <= 100))
				$response = "Desk Lamp set to ".$words[1]."% and Tall Lamp  set to ".$words[2]."%.";
			else
				$response = "All lights set to ".$words[1]."% intensity.";
		}
		
		// Random
		else if ($words[1] == "random") 
			$response = "Lights set to random.";
		
		// Default
		else
			$response = "I don't know what to do with the lights.";
	}
	
	else {
		$response = "Sorry, I am incapable of answering that question.";
	}
}

*/