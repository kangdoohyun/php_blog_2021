<?php
$pageTitle = "게시판 생성";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<section class="con">
    <form action="../board/doMake" method="POST">
        <div class="form-control mx-4">
            <label class="label">
                <span class="label-text">게시판 이름</span>
            </label>
            <input type="text" name="name" placeholder="게시판 이름을 입력해주세요." class="input input-bordered mb-4">
            <input class="bg-blue-900 p-4 text-white rounded-lg mb-4" type="submit" value="게시판 생성">
            <input class="bg-blue-900 p-4 text-white rounded-lg mb-4" type="button" onclick="location.href='../article/list'" value="글 리스트">
        </div>
    </form>
</section>


<?php require_once __DIR__ . "/../foot.php"; ?>