<?php
$dbConnect = mysqli_connect("127.0.0.1", "sbsst", "sbs123414", "php_blog_2021") or die("DB CONNECTION ERROR");
$sql = "SELECT * FROM article ORDER BY id DESC";
$resultset = mysqli_query($dbConnect, $sql);
$articles = [];
while($article = mysqli_fetch_assoc($resultset)) {
  $articles[] = $article;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>글 리스트</title>
</head>
<body>
  <h1>글 리스트</h1>
  <hr>
  <button onclick = "location.href = './write.php' ">글 작성</button>
  <hr>
  <div>
    <?php foreach( $articles as $article ) { ?>
      번호 : <?=$article['id']?><br>
      작성 날짜 : <?=$article['regDate']?><br>
      수정 날짜 : <?=$article['updateDate']?><br>
      제목 : <a href="./detail.php?id=<?=$article['id']?>"><?=$article['title']?></a><br>
      <hr>
    <?php } ?>
  </div>
</body>
</html>