<?php include "dbcon.php";
      include "score.php";
      include "head.html";
error_reporting(0);
$mode=$_GET['mode'];
$name=$_POST['name'];
$kor=$_POST['kor'];
$eng=$_POST['eng'];
$math=$_POST['math'];
$com=$_POST['com'];
$mus=$_POST['mus'];


if($mode=='insert'){
  $sum = $kor + $eng + $math + $com + $mus;
  $avg = $sum / 5;
  
  $sql = "insert into std_score(name,kor,eng,math,com,mus,sum,avg) values";
  $sql = $sql."('$name','$kor','$eng','$math','$com','$mus','$sum','$avg');";
  $result = mysqli_query($con,$sql);
}
?>
<h3 align=center>1)성적 입력 하기</h3>

<!-- 제목 목차 -->

<div class="container bg-light border border-dark">
<form method="post" action="score_list.php?mode=insert">
<table width="900" cellpadding="5" align=center  class="bg-secondary">
  <tr class="form-control rounded-pill border border-4 border border-dark"><td>이름: <input type="text" size="5" name="name">&nbsp;
  국어:<input type="text" size="5" name="kor">&nbsp;
  영어:<input type="text" size="5" name="eng">&nbsp;
  수학:<input type="text" size="5" name="math">&nbsp;
  컴퓨터:<input type="text" size="5" name="com">&nbsp;
  음악:<input type="text" size="5" name="mus">&nbsp;
</td>
<td align="center"><input type="submit" value="성적입력" class="btn btn-dark btn-outline-secondary text-white"></td></tr>
</table>
</form>
<div align=center>
<button type="submit" class="btn btn-secondary text-write" onclick="location.href='score_list.php?mode=big_first'">성적순 정렬</button>
<button type="submit" class="btn btn-secondary text-write" onclick="location.href='score_list.php?mode=small_first'">성적역순 정렬</button>
<button type="submit" class="btn btn-secondary text-write" onclick="location.href='score_list.php?mode=insert'">정렬 안함</button>
</div>

<table class=" rounded-pill border border-4 border border-dark mt-3" width = "900" border="1" cellpadding="5" align=center >
  <tr align="center" bgcolor="CEFBC9" >
    <td>번호</td>
    <td>이름</td>
    <td>국어</td>
    <td>영어</td>
    <td>수학</td>
    <td>컴퓨터</td>
    <td>음악</td>
    <td>합계</td>
    <td>평균</td>
    <td>학점</td>
    <td>삭제</td>
  </tr>

    <?php
if($mode == "big_first"){
  $sql = "SELECT * from std_score order by sum desc;";
}
else if($mode == "small_first"){
  $sql = "SELECT * from std_score order by sum asc;";
}
else{
  $sql = "SELECT * from std_score;";
}

    $result = mysqli_query($con,$sql);

    $count = 1; //화면 출력시
    

    while($row = mysqli_fetch_array($result)){
      $avg = round($row['avg'],1);
      $grade= grade($avg);

      $num = $row['num'];
      echo "<tr align=center>
      <td>$count</td>
      <td>$row[name]</td>
      <td>$row[kor]</td>
      <td>$row[eng]</td>
      <td>$row[math]</td>
      <td>$row[com]</td>
      <td>$row[mus]</td>
      <td>$row[sum]</td>
      <td>$avg</td>
      <td>$grade</td>
      <td><a href='score_delete.php?num=$num'>삭제</td
      </tr>";
      $count++;
    }
    ?>
    </table>
    </div>
    <style>
      a{text-decoration:none;}
      a{color:red;}
    </style>
    