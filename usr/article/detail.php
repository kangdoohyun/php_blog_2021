<?php
$dbConnect = mysqli_connect("127.0.0.1", "sbsst", "sbs123414", "php_blog_2021") or die("DB CONNECTION ERROR");
if (isset($_GET['id']) == false){
  echo "<h2>id를 입력해 주세요.<h2>";
  echo "<button onclick = \"location.href = './list.php' \">글 리스트</button>";
  exit;
}
$id = $_GET['id'];
$sql = "SELECT * FROM article WHERE id = '$id'";
$resultset = mysqli_query($dbConnect, $sql);
$article = mysqli_fetch_assoc($resultset);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$article['title']?> 상세페이지</title>
</head>
<body>
  <h1><?=$article['title']?> 상세페이지</h1>
  <hr>
  <div>
    번호 : <?=$article['id']?><br>
    작성 날짜 : <?=$article['regDate']?><br>
    수정 날짜 : <?=$article['updateDate']?><br>
    제목 : <?=$article['title']?><br>
    내용 : <?=$article['body']?><br>
    <hr>
  </div>
  <div>
    <button onclick="location.href='./list.php'">글 리스트</button>
    <button onclick="location.href='./modify.php?id=<?=$article['id']?>&title=<?=$article['title']?>&body=<?=$article['body']?>'">수정</button>
    <button onclick="if(confirm('정말 글을 삭제 하시겠습니까?') == false) return false; location.href='./doDelete.php?id=<?=$article['id']?>';">삭제</button>
  </div>
</body>
</html>
