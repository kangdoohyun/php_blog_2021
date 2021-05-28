<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
if(isset($_GET['id']) == false){
  jsHistoryBackExit("번호를 입력해주세요.");
}
$id = $_GET['id'];
$sql = "SELECT * FROM article WHERE id = '$id'";
$article = db__getRow($sql);

if(empty($article)){
  jsHistoryBackExit("${id}번 게시물은 존재하지 않습니다.");
}
if(isset($_GET['title']) == false){
  jsHistoryBackExit("제목을 입력해주세요.");
}
if(isset($_GET['body']) == false){
  jsHistoryBackExit("내용을 입력해주세요.");
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