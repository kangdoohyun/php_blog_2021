<?php
$dbConn = mysqli_connect("127.0.0.1", "sbsst", "sbs123414", "php_blog_2021") or die("DB CONNECTION ERROR");
$sql = "SELECT * FROM article ORDER BY id DESC";
$rs = mysqli_query($dbConn, $sql);
$articles = [];
while( $article = mysqli_fetch_assoc($rs) ){
  $articles[] = $article;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>게시물 리스트</title>
</head>
<body>
  <h1>게시물 리스트</h1>
  <hr>
  <?php foreach( $articles as $article ){ ?>
    <?php $url = "./detail.php?id=${article["id"]}"?>
    번호 : <?=$article["id"]?><br>
    작성 날짜 : <?=$article["regDate"]?><br>
    수정 날짜 : <?=$article["updateDate"]?><br>
    제목 : <a href="<?=$url?>"><?=$article["title"]?><br></a>
    <hr>
  <?php } ?>
</body>
</html>
