<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
if(isset($_GET['id']) == false){
  echo "<h2>id를 입력해 주세요.<h2>";
  echo "<button onclick = \"location.href = './list.php' \">글 리스트</button>";
  exit;
}
$id = $_GET['id'];
$sql = "SELECT * FROM article WHERE id = '$id'";
$article = db__getRow($sql);

if($article == null){
  echo "<h2>${id}번 게시물은 존재하지 않습니다.<h2>";
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
$title = $_GET['title'];
$body = $_GET['body'];
$sql = "UPDATE article SET updateDate = NOW(), title = '$title', body = '$body' WHERE id = '$id'" ;
db__modify($sql);
?>
<script>
  alert("<?=$id?>번 글이 수정되었습니다.")
  location.replace('./detail.php?id=<?=$article['id']?>')
</script>