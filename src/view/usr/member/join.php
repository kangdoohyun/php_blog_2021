<?php
$pageTitle = "회원가입";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<section class="text-center lg:container mx-auto px-4">
    <div class="mx-auto sm:w-1/2">
        <form action="./doJoin" method="POST">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">아이디</span>
                </label>
                <input type="text" name="loginId" placeholder="아이디를 입력해주세요." class="input input-bordered">
                <label class="label">
                    <span class="label-text">비밀번호</span>
                </label>
                <input type="password" name="loginPw" placeholder="비밀번호를 입력해주세요." class="input input-bordered">
                <label class="label">
                    <span class="label-text">이름</span>
                </label>
                <input type="text" name="name" placeholder="이름을 입력해주세요." class="input input-bordered">
                <label class="label">
                    <span class="label-text">닉네임</span>
                </label>
                <input type="text" name="nickname" placeholder="닉네임을 입력해주세요." class="input input-bordered">
                <label class="label">
                    <span class="label-text">전화번호</span>
                </label>
                <input type="text" name="cellphoneNo" placeholder="전화번호를 입력해주세요." class="input input-bordered">
                <label class="label">
                    <span class="label-text">이메일</span>
                </label>
                <input type="text" name="email" placeholder="이메일을 입력해주세요." class="input input-bordered">
                <input class="bg-blue-900 text-white w-full p-2 rounded-lg mt-4" type="submit" value="DO JOIN">
                <input class="bg-blue-900 text-white w-full p-2 rounded-lg my-4" type="button"
                    onclick="location.href='./login'" value="로그인 화면으로">
            </div>
        </form>
    </div>
</section>


<?php require_once __DIR__ . "/../foot.php"; ?>