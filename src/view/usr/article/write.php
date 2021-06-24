<?php
$pageTitle = "게시물 작성";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<?php require_once __DIR__ . "/../../part/toastUiSetup.php"; ?>
<section class="lg:container mx-auto px-4">
    <script>
        let ArticleDoWrite__submitFormDone = false;

        function ArticleDoWrite__submitForm(form) {
            if (ArticleDoWrite__submitFormDone) {
                return;
            }

            form.boardId.value = form.boardId.value.trim();

            if (form.boardId.value == 0) {
                alert('게시판을 선택해주세요.');
                form.boardId.focus();

                return;
            }

            form.title.value = form.title.value.trim();

            if (form.title.value.length == 0) {
                alert('제목을 입력해주세요.');
                form.title.focus();

                return;
            }

            const bodyEditor = $(form).find('.input-body').data('data-toast-editor');
            const body = bodyEditor.getMarkdown().trim();
            if (body.length == 0) {
                bodyEditor.focus();
                alert('내용을 입력해주세요.');
                return;
            }

            form.body.value = body;

            form.submit();
            ArticleDoWrite__submitFormDone = true;
        }
    </script>
    <form action="./doWrite" method="POST" onsubmit="ArticleDoWrite__submitForm(this); return false;">
        <input type="hidden" name="body">
        <div>
            <select class="select select-bordered w-full max-w-xs mb-4" name="boardId">
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
        <div class="mb-4">
            <script type="text/x-template"></script>
            <div class="toast-ui-editor input-body"></div>
        </div>
        <div>
            <input type="submit" class="w-full bg-blue-900 p-4 text-white rounded-lg mb-4" value="글 작성">
        </div>
    </form>
</section>

<?php require_once __DIR__ . "/../foot.php"; ?>