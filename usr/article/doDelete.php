<?php
$dbConnect = mysqli_connect("127.0.0.1", "sbsst", "sbs123414", "php_blog_2021") or die("DB CONNECTION ERROR");
if(isset($_GET['id']) == false){
  echo "<h2>id를 입력해 주세요.<h2>";
  echo "<button onclick = \"location.href = './list.php' \">글 리스트</button>";
  exit;
}
$id = $_GET['id'];
$sql = "DELETE FROM article WHERE id = '$id'";
mysqli_query($dbConnect, $sql);
?>