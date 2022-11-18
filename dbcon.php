<?php

$con = mysqli_connect("localhost","root","123456","ai");
if(mysqli_connect_error()){
  echo "데이터베이스 접속실패";
  mysqli_connect_errno();
}
// else{
//   echo "접속성공";
// }
?>