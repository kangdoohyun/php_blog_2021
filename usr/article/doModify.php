<?php
$dbConn = mysqli_connect("127.0.0.1", "sbsst", "sbs123414", "php_blog_2021") or die("DB CONNECTION ERROR");
if ( isset($_GET['id']) == false ) {
  echo "id를 입력해주세요.";
  exit;
}
$id = intval($_GET["id"]);

$sql = "SELECT * FROM article WHERE id = $id";
$rs = mysqli_query($dbConn, $sql);
$article = mysqli_fetch_assoc($rs);
if ( $article == null ) {
  echo "${id}번 게시물은 존재하지 않습니다.";
  exit;
}
if ( empty($_GET['title'] ) == false ){
  $title = $_GET["title"];
}
else{
  $title = $article["title"];
}
if ( empty($_GET['body'] ) == false ){
  $body = $_GET["body"];
}
else{
  $body = $article["body"];
}
echo "title : $title <br>";
echo "body : $body <br>";
$sql = "UPDATE article SET updateDate = NOW(), title = '$title', body = '$body' WHERE id = '$id'";
mysqli_query($dbConn, $sql);

echo "${id}번 게시물이 수정되었습니다.";
?>
<div><a href="./list.php">게시물 리스트</a></div>

