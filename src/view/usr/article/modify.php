<?php
$pageTitle = "게시물 수정";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<?php require_once __DIR__ . "/../../part/toastUiSetup.php"; ?>
<section class="lg:container mx-auto px-4">
    <script>
        let ArticleDoModify__submitFormDone = false;

        function ArticleDoModify__submitForm(form) {
            if (ArticleDoModify__submitFormDone) {
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
            ArticleDoModify__submitFormDone = true;
        }
    </script>
    <form action="./doModify" method="POST" onsubmit="ArticleDoModify__submitForm(this); return false;">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="hidden" name="memberId" value="<?= $memberId ?>">
        <input type="hidden" name="body">
        <!-- 제목 -->
        <div>
            <input class="w-full p-4 border mb-4 rounded-md" type="text" name="title" value="<?= $article['title'] ?>">
        </div>
        <!-- 내용 -->
        <div class="mb-4">
            <script type="text/x-template"><?= $article['body'] ?></script>
            <div class="toast-ui-editor input-body"></div>
        </div>
        <div>
            <input type="submit" class="w-full bg-blue-900 p-4 text-white rounded-lg mb-4" value="글 수정">
            <input type="button" class="w-full bg-blue-900 p-4 text-white rounded-lg mb-4" onclick="location.href='./detail?id=<?= $id ?>'" value="원문">
        </div>
    </form>
</section>
<?php require_once __DIR__ . "/../foot.php"; ?>