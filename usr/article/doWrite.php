<?php
$dbConn = mysqli_connect("127.0.0.1", "sbsst", "sbs123414", "php_blog_2021") or die("DB CONNECTION ERROR");
if ( isset($_GET["title"]) == false ) {
  echo "title을 입력해주세요.";
}
if ( isset($_GET["body"]) == false ) {
  echo "body를 입력해주세요.";
}
$title = $_GET["title"];
$body = $_GET["body"];
$sql = "INSERT INTO article SET regDate = NOW(), updateDate = NOW(), title = '${title}', `body` = '${body}'";
$rs = mysqli_query($dbConn, $sql);
$id = mysqli_insert_id($dbConn);
echo "${id}번 게시물이 등록되었습니다.";
?>
<div><a href="./list.php">게시물 리스트</a></div>
<div><a href="./detail.php?id=<?=$id?>"><?=$id?>번 게시물</a></div>