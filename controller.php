<?php
$colors = [
  "red"    => "#ff0000",
  "orange" => "#ff8000",
  "yellow" => "#ffff00",
  "green"  => "#40ff00",
  "blue"   => "#0080ff",
  "purple" => "#bf00ff",
  "white"  => "#ffffff",
  "pink"   => "#ff00bf"
];

function hex2rgb($hex) {
  $hex = str_replace("#", "", $hex);

  if (strlen($hex) == 3) {
    $r = hexdec(substr($hex,0,1).substr($hex,0,1));
    $g = hexdec(substr($hex,1,1).substr($hex,1,1));
    $b = hexdec(substr($hex,2,1).substr($hex,2,1));
  } else {
    $r = hexdec(substr($hex,0,2));
    $g = hexdec(substr($hex,2,2));
    $b = hexdec(substr($hex,4,2));
  }
  $rgb = array($r, $g, $b);
  return implode(",", $rgb);
}

// Light ////////////////////////////////////////////////////////////////////////////////
class Light { 
  var $ip;
  
  function setIP($value){
    $this->ip = $value;
  }
  
  function turnOn() { 
    $command = escapeshellcmd("/var/www/html/lib/flux_led/flux_led.py ".$this->ip." --on");
    $output = shell_exec($command);
    return "Desk Lamp turned on.";
  } 
      
  function turnOff() { 
    $command = escapeshellcmd("/var/www/html/lib/flux_led/flux_led.py ".$this->ip." --off");
    $output = shell_exec($command);
    return "Desk Lamp turned off.";
  }
  
  function setColor($color) { 
    $command = escapeshellcmd("/var/www/html/lib/flux_led/flux_led.py ".$this->ip." -c ".hex2rgb($color));
    $output = shell_exec($command);
    return "Desk Lamp color changed to #".$color.".";
  }
  
  function setIntensity($intensity) { 
    $command = escapeshellcmd("/var/www/html/lib/flux_led/flux_led.py ".$this->ip."  -w ".$intensity." -0");
    $output = shell_exec($command);
    return "Desk Lamp intensity changed to ".$intensity."%.";
  }
  
  function turnAllOn() {
    $command = escapeshellcmd("/var/www/html/lib/flux_led/flux_led.py -sS --on");
    $output = shell_exec($command);
    return "All lights turned on.";
  }
  
  function turnAllOff() {
    $command = escapeshellcmd("/var/www/html/lib/flux_led/flux_led.py -sS --off");
    $output = shell_exec($command);
    return "All lights turned off.";
  }
}

$deskLamp = new Light;
$tallLamp = new Light;

$deskLamp->setIP("10.46.1.243");
$tallLamp->setIP("10.46.1.242");

// Desk Lamp ////////////////////////////////////////////////////////////////////////////////
if ($_GET["s"] == "deskLampOn")
  $message = $deskLamp->turnOn();
else if ($_GET["s"] == "deskLampOff")
  $message = $deskLamp->turnOff();
else if ($_GET["s"] == "deskLampColor")
  $message = $deskLamp->setColor($_GET["color"]);
else if ($_GET["s"] == "deskLampIntensity")
  $message = $deskLamp->setIntensity($_GET["intensity"]);

// Tall Lamp ////////////////////////////////////////////////////////////////////////////////
else if ($_GET["s"] == "tallLampOn")
  $message = $tallLamp->turnOn();
else if ($_GET["s"] == "tallLampOff")
  $message = $tallLamp->turnOff();
else if ($_GET["s"] == "tallLampColor")
  $message = $tallLamp->setColor($_GET["color"]);
else if ($_GET["s"] == "tallLampIntensity")
  $message = $tallLamp->setIntensity($_GET["intensity"]);

// All Lights ////////////////////////////////////////////////////////////////////////////////
else if ($_GET["s"] == "allOn")
  $message = $deskLamp->turnAllOn();
else if ($_GET["s"] == "allOff")
  $message = $deskLamp->turnAllOff();
else if ($_GET["s"] == "randomOn")
  $message = "Random lighting turned on.";
else if ($_GET["s"] == "randomOff")
  $message = "Random lighting turned off.";
  
// Door ////////////////////////////////////////////////////////////////////////////////
else if ($_GET["s"] == "doorLock") {
  
  $message = "Door has been locked.";
  
  
  $buf_size = 1024;
  $socket = stream_socket_server("udp://10.46.1.240:8888", $errno, $errstr, STREAM_SERVER_BIND);
  $str = stream_socket_recvfrom($socket, $buf_size, 0, $peer); 
  $str = "abc";
  stream_socket_sendto($socket, $str, strlen($str), 0, $peer);
   
 
 
 
}
  
else if ($_GET["s"] == "doorUnlock")
  $message = "Door has been unlocked.";

// Service Cutoff ////////////////////////////////////////////////////////////////////////////////
if ($_GET["e"] == "true")
  exit;
?>