<?php
include "dbcon.php";
$num = $_GET['num'];

echo $num;

$sql = "DELETE from std_score where num=$num;";
$result = mysqli_query($con,$sql);
?>
<script>
  alert('삭제가 완료되었습니다');
</script>
<?Php
Header('location:score_list.php');
mysqli_close($con);
?>

