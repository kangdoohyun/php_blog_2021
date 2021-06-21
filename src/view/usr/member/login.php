<?php
$pageTitle = "로그인";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<section class="text-center lg:container mx-auto">
    <div class="login-box w-1/2 mx-auto">
        <form action="./doLogin" method="POST">
            <div class="input-text">
                <input class="w-full p-4" type="text" name="loginId" placeholder="아이디를 입력해주세요.">
            </div>
            <div class="input-text">
                <input class="w-full p-4" type="password" name="loginPw" placeholder="비밀번호를 입력해주세요.">
            </div>
            <div class="input-btn">
                <input class="bg-blue-200 text-white w-full p-4" type="submit" value="LOGIN">
            </div>
        </form>
    </div>
</section>
<?php require_once __DIR__ . "/../foot.php"; ?>