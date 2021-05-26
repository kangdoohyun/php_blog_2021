<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
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
$sql = "INSERT INTO article SET regDate = NOW(), updateDate = NOW(), title = '$title', body = '$body'";
$id = db__insert($sql);
?>
<script>
  alert("<?=$id?>번 글이 작성되었습니다.");
  location.replace("./list.php");
</script>