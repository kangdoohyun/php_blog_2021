<?php
$dbConnect = mysqli_connect("127.0.0.1", "sbsst", "sbs123414", "php_blog_2021") or die("DB CONNECTION ERROR");
if(isset($_GET['relId']) == false){
    echo "<h2>relId를 입력해 주세요.<h2>";
    echo "<button onclick = \"location.href = '../article/list.php' \">글 리스트</button>";
    exit;
  }
if(isset($_GET['id']) == false){
    echo "<h2>id를 입력해 주세요.<h2>";
    echo "<button onclick = \"location.href = '../article/list.php' \">글 리스트</button>";
    exit;
  }
if(isset($_GET['body']) == false){
  echo "<h2>body를 입력해 주세요.<h2>";
  echo "<button onclick = \"location.href = '../article/list.php' \">글 리스트</button>";
  exit;
}
$relId = $_GET['relId'];
$id = $_GET['id'];
$body = $_GET['body'];
$sql = "UPDATE reply SET updateDate = NOW(), body = '$body' WHERE id = '$id';";
mysqli_query($dbConnect, $sql);
?>
<script>
  location.replace('../article/detail.php?id=<?=$relId?>');
</script>