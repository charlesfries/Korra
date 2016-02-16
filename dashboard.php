<?php
require("controller.php");

require("lib/theme/system.php");
$system = new System;

function pingAddress($host) {
  exec("ping -c 4 ".$host,$output,$result);
  if ($result == 0) return "Good";
  else return "Bad";
}

function random_color_part() {
    return str_pad(dechex(mt_rand(0,255)),2,"0",STR_PAD_LEFT);
}

function random_color() {
    return random_color_part().random_color_part().random_color_part();
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Korra Dashboard</title>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    
    <link rel="apple-touch-icon" href="img/icon.png">
    <link rel="stylesheet" href="lib/theme/static/dark.css">
    <link rel="stylesheet" href="lib/sweetalert/sweetalert.css">
    <link rel="stylesheet" href="css/dashboard.css">
  </head>
  <body>
    <div id="container">
      
      <p><a href="/">&larr; Back to Home</a></p>
      
      <!-- Header -->
      <h1>
        <?php //echo $system->os->hostname; ?>
        <a href="dashboard.php">Korra Dashboard</a>
        <small id="uptime">Online for <?=$system->uptime->days?> days, <?=$system->uptime->hours?> hours, <?=$system->uptime->minutes?> minutes</small>
        <?php 
          if ($message) $message = '<small id="uptime">'.$message.'</small>';
        ?>
        <?=$message?>
      </h1>
      
      <!-- Desk Lamp -->
      <div class="component">
        <div class="header">Light: Desk Lamp</div>
        <div class="state red">Off</div>
        <div class="information">
          <ul>
            <li>
              <small>Power</small>
              <a href="?s=deskLampOn">On</a>
            </li>
            <li>
              <small>Power</small>
              <a href="?s=deskLampOff">Off</a>
            </li>
            <li>
              <small>Color</small>
              <form method="get">
                <input type="hidden" name="s" value="deskLampColor">
                <input class="jscolor" spellcheck="false" name="color" size="7" value="<?=random_color()?>">
              </form>
            </li>
            <li>
              <small>Int %</small>
              <form method="get">
                <input type="hidden" name="s" value="deskLampIntensity">
                <input class="int" value="100" type="text" spellcheck="false" name="intensity" size="4">
              </form>
            </li>
          </ul>
        </div>
      </div>
      
      <!-- Tall Lamp -->
      <div class="component">
        <div class="header">Light: Tall Lamp</div>
        <div class="state red">Off</div>
        <div class="information">
          <ul>
            <li>
              <small>Power</small>
              <a href="?s=tallLampOn">On</a>
            </li>
            <li>
              <small>Power</small>
              <a href="?s=tallLampOff">Off</a>
            </li>
            <li>
              <small>Color</small>
              <form method="get">
                <input type="hidden" name="s" value="tallLampColor">
                <input class="jscolor" spellcheck="false" name="color" size="7" value="<?=random_color()?>">
              </form>
            </li>
            <li>
              <small>Int %</small>
              <form method="get">
                <input type="hidden" name="s" value="tallLampIntensity">
                <input class="int" value="100" type="text" spellcheck="false" name="intensity" size="4">
              </form>
            </li>
          </ul>
        </div>
      </div>
      
      <!-- Services -->
      <div class="component">
        <div class="header">Services</div>
        <a href="http://10.46.1.179:9091">Transmission</a><br>
        Lights: <a href="?s=allOn">All On</a> / <a href="?s=allOff">All Off</a><br>
        Lights: <a href="?s=randomOn">Rand On</a> / <a href="?s=randomOff">Rand Off</a>
      </div>
      
      <!-- Devices -->
      <?php
      if ($_GET["p"]) {
        $deskLamp = pingAddress("10.46.1.61");
        $tallLamp = pingAddress("10.46.1.61");
        $macbook  = pingAddress("10.46.1.61");
        $iphone   = pingAddress("10.46.1.70");
        $ps4      = pingAddress("0.0.0.0");
      } else {
        $deskLamp = "?";
        $tallLamp = "?";
        $macbook  = "?";
        $iphone   = "?";
        $ps4      = "?";
      }
      ?>
      <div class="component">
        <div class="header">Devices</div>
        <a href="?p=true">Click to Ping</a><br>
        Lamp: <?=$deskLamp?> Tall Lamp: <?=$tallLamp?><br>
        MacBook Pro: <?=$macbook?><br>
        iPhone: <?=$iphone?><br>
        PlayStation 4: <?=$ps4?>
      </div>
      
      <!-- Environment -->
      <div class="component">
        <div class="header">Environment (Beta)</div>
        <div class="state yellow">65&deg;F</div>
        <div class="information">
          <ul>
            <li><small>Temperature</small>18&deg;C</li>
            <li><small>Humidity</small>55%</li>
          </ul>
        </div>
      </div>
      
      <!-- Server Stats -->
      <?php
      $directory = "lib/theme/widgets";
      $widgets = scandir($directory,  SCANDIR_SORT_ASCENDING);
      foreach ($widgets as $widget)
        if ($widget != "." && $widget != "..")
          include($directory."/".$widget);
      ?>
      
      <!-- Door -->
      <div class="component">
        <div class="header">Door (Beta)</div>
        <div class="state red">Locked</div>
        <div class="information">
          <ul>
            <li>
              <small>Bolt</small>
              <a href="?s=doorLock">Lock</a>
            </li>
            <li>
              <small>Bolt</small>
              <a href="?s=doorUnlock">Unlock</a>
            </li>
          </ul>
        </div>
      </div>
      
    </div>
    
    <script src="lib/jscolor/jscolor.js"></script>
  </body>
</html>