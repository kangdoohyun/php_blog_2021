<?php
$dbConnect = mysqli_connect("127.0.0.1", "sbsst", "sbs123414", "php_blog_2021") or die("DB CONNECTION ERROR");
if(isset($_GET['id']) == false){
  echo "<h2>id를 입력해 주세요.<h2>";
  echo "<button onclick = \"location.href = './list.php' \">글 리스트</button>";
  exit;
}
$id = $_GET['id'];
$sql = "SELECT * FROM article WHERE id = '$id'";
$resultset = mysqli_query($dbConnect, $sql);
$article = mysqli_fetch_assoc($resultset);

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
mysqli_query($dbConnect, $sql);
?>