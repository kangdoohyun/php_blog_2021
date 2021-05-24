<?php
$dbConn = mysqli_connect("127.0.0.1", "sbsst", "sbs123414", "php_blog_2021") or die("DB CONNECTION ERROR");
if ( isset($_GET['id']) == false ) {
  echo "id를 입력해주세요.";
  exit;
}
$id = intval($_GET["id"]);

$sql = "SELECT * FROM article WHERE id = $id";
$rq = mysqli_query($dbConn, $sql);
$article = mysqli_fetch_assoc($rq);
if ( $article == null ) {
  echo "${id}번 게시물은 존재하지 않습니다.";
  exit;
}
$sql = "DELETE FROM article WHERE id = $id";
$rq = mysqli_query($dbConn, $sql);
echo "${id}번 게시물이 삭제되었습니다.";
?>
<div><a href="./list.php">게시물 리스트</a></div>