<?php
include "dbcon.php";

$sql = "create table std_score(num int auto_increment primary key, name varchar(10),";
$sql = $sql."kor int(3), eng int(3), math int(3), com int(3), mus int(3),";
$sql = $sql."sum int(3), avg float)";

$result = mysqli_query($con,$sql);

// if($result){
//   echo "테이블 생성 성공";
// }
// else{
//   echo "테이블 접속 실패";
// }
mysqli_close();
?>