<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/webinit.php';
if(isset($_GET['id']) == false){
  echo "<h2>id를 입력해 주세요.<h2>";
  echo "<button onclick = \"location.href = './list.php' \">글 리스트</button>";
  exit;
}
if(isset($_GET['relId']) == false){
    echo "<h2>relId를 입력해 주세요.<h2>";
    echo "<button onclick = \"location.href = './list.php' \">글 리스트</button>";
    exit;
  }
$id = $_GET['id'];
$relId = $_GET['relId'];
$sql = "DELETE FROM reply WHERE id = '$id'";
mysqli_query($dbConnect, $sql);
?>
<script>
  location.replace('../article/detail.php?id=<?=$relId?>');
</script>