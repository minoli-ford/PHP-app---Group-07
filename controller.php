<?php
$val=$_REQUEST['step'];
$country=$_POST["valueToSearch_1"];
$region=$_POST["valueToSearch_2"];
$income=$_POST["valueToSearch_3"];
switch ($val) {

  case '1':
        header("Location:result.php?v1=$country&v2=$region&v3=$income");
    break;
  
  default:
         header("Location:index.php");
    break;
}


?>