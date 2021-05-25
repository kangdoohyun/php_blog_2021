<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>글 작성</title>
</head>
<body>
  <h1>글 작성</h1>
  <hr>
  <div>
    <form action="./doWrite.php?">
      <div>
        <span>제목 : </span>
        <input style="width: 200px;" type="text" name="title">
      </div>
      <div>
        <span>내용 : </span>
        <textarea style="width: 202px;" name="body"></textarea>
        
      </div>
      <button style="width: 255px;" type="submit">글 작성</button>
      <hr>
    </form>
  </div>
  <div>
    <button onclick="location.href='./list.php'">글 리스트</button>
  </div>
</body>
</html>