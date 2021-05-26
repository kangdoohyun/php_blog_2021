<?php
$dbConnect = mysqli_connect("127.0.0.1", "sbsst", "sbs123414", "php_blog_2021") or die("DB CONNECTION ERROR");
if (isset($_GET['id']) == false){
  echo "<h2>id를 입력해 주세요.<h2>";
  echo "<button onclick = \"location.href = './list.php' \">글 리스트</button>";
  exit;
}
$id = intval($_GET['id']);
$sql = "SELECT * FROM article WHERE id = '$id'";
$resultset = mysqli_query($dbConnect, $sql);
$article = mysqli_fetch_assoc($resultset);

$sql = "SELECT * FROM reply WHERE relId = '$id' ORDER BY id DESC";
$resultset = mysqli_query($dbConnect, $sql);
$replis = [];
while($reply = mysqli_fetch_assoc($resultset)){
  $replis[] = $reply;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$article['title']?> 상세페이지</title>
  <script>
    function addBox (x) {
      var newArea = document.createElement('textarea');
      var submit = document.createElement('input');
      submit.type = 'submit';
      submit.value = '수정하기';
      newArea.name = 'body';
      newArea.rows = 5;
      newArea.cols = 50;
      x.appendChild(document.createElement('p'));
      x.appendChild(newArea);
      x.appendChild(submit);
    }
  </script>
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
  <hr>
  <div>
    <h2>댓글</h2>
    <form action="../reply/doWrite.php">
      <input type="hidden" name="relId" value="<?=$article['id']?>">
      <textarea style="width: 202px;" name="body" placeholder="댓글을 작성해 주세요"></textarea>
      <br>
      <button style="width: 208px;" type="submit">작성 완료</button>
      <hr>
    </form>
  </div>
  <div>
    <?php foreach( $replis as $reply ) { ?>
      작성 날짜 : <?=$reply['regDate']?><br>
      수정 날짜 : <?=$reply['updateDate']?><br>
      제목 : <?=$reply['body']?><br>
      <form action="../reply/doModify.php?">
        <input type="hidden" name="id" value="<?=$reply['id']?>">
        <input type="hidden" name="relId" value="<?=$reply['relId']?>">
        <input type="button" VALUE="수정" onclick="addBox(this.form)">
      </form>
      <button onclick="if(confirm('정말 삭제 하시겠습니까?') == false) return false; location.href='../reply/doDelete.php?id=<?=$reply['id']?>&relId=<?=$reply['relId']?>';">삭제</button>
      <hr>
    <?php } ?>
  </div>
</body>
</html>


