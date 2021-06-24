<?php
$pageTitle = "로그인";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<section class="text-center lg:container mx-auto px-4">
    <div class="login-box mx-auto sm:w-1/2">
        <form action="./doLogin" method="POST">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">아이디</span>
                </label>
                <input type="text" name="loginId" placeholder="아이디를 입력해주세요." class="input input-bordered">
                <label class="label">
                    <span class="label-text">비밀번호</span>
                </label>
                <input type="text" name="loginPw" placeholder="비밀번호를 입력해주세요." class="input input-bordered">
                <input class="bg-blue-900 text-white w-full p-2 rounded-lg mt-4" type="submit" value="LOGIN">
            </div>
        </form>
    </div>
</section>



<?php require_once __DIR__ . "/../foot.php"; ?>