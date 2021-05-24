<?php
$dbConn = mysqli_connect("127.0.0.1", "sbsst", "sbs123414", "php_blog_2021") or die("DB CONNECTION ERROR");
$id = $_GET["id"];
$sql = "SELECT * FROM article WHERE id = '$id'";
$rs = mysqli_query($dbConn, $sql);
$article = mysqli_fetch_assoc($rs);
if( $article == null ){
  echo "${id}번 게시물은 존재하지 않습니다";
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$article["title"]?></title>
</head>
<body>
  <h1><?=$article["title"]?></h1>
  <hr>
  번호 : <?=$article["id"]?><br>
  작성 날짜 : <?=$article["regDate"]?><br>
  수정 날짜 : <?=$article["updateDate"]?><br>
  제목 : <?=$article["title"]?><br>
  내용 : <?=$article["body"]?><br>
  <hr>
  <nav>
    <div><a href="./list.php">게시물 리스트</a></div>
  </nav>
</body>
</html>