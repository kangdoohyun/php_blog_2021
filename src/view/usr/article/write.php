<?php
$pageTitle = "게시물 작성";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<section class="lg:container mx-auto px-4">
    <form action="./doWrite" method="GET">
        <div>
            <select class="select select-bordered w-full max-w-xs mb-4" name="boardId" required>
                <option disabled="disabled" selected="selected" value="0">게시판 선택</option>
                <?php foreach ($boards as $board) { ?>
                <option class="bluck p-2" value="<?= $board['id'] ?>"><?= $board['name'] ?></option>
                <?php } ?>
            </select>
        </div>
        <!-- 제목 -->
        <div class="form-control mb-4">
            <input type="text" name="title" placeholder="제목을 입력해 주세요" class="input input-bordered">
        </div>
        <!-- 내용 -->
        <div class="form-control mb-4">
            <textarea name="body" class="textarea h-24 textarea-bordered" placeholder="내용을 입력해 주세요"></textarea>
        </div>
        <button class="w-full bg-blue-900 p-4 text-white rounded-lg" type="submit">글 작성</button>
    </form>
</section>

<?php require_once __DIR__ . "/../foot.php"; ?>