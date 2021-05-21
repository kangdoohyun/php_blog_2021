<?php
$dbConn = mysqli_connect("127.0.0.1", "sbsst", "sbs123414", "php_blog_2021") or die("DB CONNECTION ERROR");

$sql = "
SELECT *
FROM article AS A
ORDER BY A.id DESC
";
$rs = mysqli_query($dbConn, $sql);
$article5 = mysqli_fetch_assoc($rs);
$article4 = mysqli_fetch_assoc($rs);
$article3 = mysqli_fetch_assoc($rs);
$article2 = mysqli_fetch_assoc($rs);
$article1 = mysqli_fetch_assoc($rs);

$articles = [];
$articles[0] = $article5;
$articles[1] = $article4;
$articles[2] = $article3;
$articles[3] = $article2;
$articles[4] = $article1;
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
  <div>
    <?php foreach ( $articles as $article ) { ?>
      번호 : <?=$article['id']?><br>
      작성 : <?=$article['regDate']?><br>
      수정 : <?=$article['updateDate']?><br>
      제목 : <?=$article['title']?><br>
      <hr>
    <?php } ?>
  </div>
  
</body>
</html>