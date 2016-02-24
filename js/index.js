
function analyze(query) {
  var words = query.split(" ");
  
  // Lights
	if ($words[0].toLowerCase() == "lights") {
		
		// All Control
		if ($words[1].toLowerCase() == "on") {
      
    }
		else if ($words[1].toLowerCase() == "off") {
      
    }
		
		// Colors
		/*else if (array_key_exists(strtolower($words[1]), $colors)) {
			
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
	}*/
  
}