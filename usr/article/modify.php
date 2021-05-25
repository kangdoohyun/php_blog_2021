<?php
if (isset($_GET['id']) == false){
  echo "<h2>id를 입력해 주세요.<h2>";
  echo "<button onclick = \"location.href = './list.php' \">글 리스트</button>";
  exit;
}
if(isset($_GET['title']) == false){
  echo "<h2>title을 입력해 주세요.<h2>";
  echo "<button onclick = \"location.href = './list.php' \">글 리스트</button>";
  exit;
}
if(isset($_GET['body']) == false){
  echo "<h2>body를 입력해 주세요.<h2>";
  echo "<button onclick = \"location.href = './list.php' \">글 리스트</button>";
  exit;
}
$id = $_GET['id'];
$title = $_GET['title'];
$body = $_GET['body'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$title?> 글 수정</title>
</head>
<body>
  <h1><?=$title?> 글 수정</h1>
  <hr>
  <div>
    <form action="./doModify.php?">
      <input type="hidden" name="id" value="<?=$id?>">
      <div>
        <span>제목 : </span>
        <input required style="width: 200px;" type="text" name="title" value="<?=$title?>">
      </div>
      <div>
        <span>내용 : </span>
        <textarea required style="width: 202px;" name="body"><?=$body?></textarea>
        
      </div>
      <button style="width: 255px;" type="submit">글 수정</button>
      <hr>
    </form>
  </div>
  <div>
    <button onclick="location.href='./list.php'">글 리스트</button>
    <button onclick="location.href='./detail.php?id=<?=$id?>'">원문</button>
  </div>
</body>
</html>