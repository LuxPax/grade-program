<?php
function grade($avg){
  if($avg>=90){
    $grade='A'; 
  }
  else if($avg>=80){
    $grade='B';
  }
  else if($avg>=80){
    $grade='C';
  }
  else if($avg>=80){
    $grade='D';
  }
  else if($avg>=80){
    $grade='F';
  }
  return $grade;
}
?>