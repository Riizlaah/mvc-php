<?php
  session_start();
  header("Content-Type: image/png");
  
  $imc = imagecreatetruecolor(110, 40);
  $bcl = imagecolorallocate($imc, 255, 30, 30);
  $tcl = imagecolorallocate($imc, 30, 255, 57);
  
  $bit = random_bytes(3);
  $enc = bin2hex($bit);
  $_SESSION['capt'] = $enc;
  $x = random_int(0, 58);
  $y = random_int(0, 28);
  $x2 = $x + random_int(30, 58);
  $y2 = $y + random_int(20, 28);
  $x1 = $x + random_int(-10, 6);
  $y1 = $y + random_int(-10, 6);
  imagefill($imc, 0, 0, $bcl);
  imagestring($imc, 16, $x, $y, $enc, $tcl);
  imageline($imc, $x1, $y1, $x2, $y2, $tcl);
  
  imagepng($imc);
  imagedestroy($imc);
  
  
?>