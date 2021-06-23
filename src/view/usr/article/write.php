<?php
$pageTitle = "게시물 작성";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<section class="lg:container mx-auto">
    <form action="./doWrite" method="GET">
        <div>
            <select class="border rounded-md mb-4 p-2" name="boardId" required>
                <option class="bluck" value="0">게시판 선택</option>
                <?php foreach ($boards as $board) { ?>
                    <option class="bluck p-2" value="<?= $board['id'] ?>"><?= $board['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <!-- 제목 -->
        <div>
            <input class="w-full p-4 border mb-4 rounded-md" type="text" name="title" placeholder="제목을 입력해 주세요">
        </div>
        <!-- 내용 -->
        <div>
            <textarea class="w-full h-40 p-4 border rounded-md" name="body" placeholder="내용을 입력해 주세요"></textarea>
        </div>
        <button class="w-full bg-blue-200 p-4 text-white" type="submit">글 작성</button>
    </form>
</section>
<?php require_once __DIR__ . "/../foot.php"; ?>