<?php
$pageTitle = "마이페이지";
?>
<?php require_once __DIR__ . "/../head.php"; ?>
<section class="lg:container mx-auto">
    <div class="flex">
        <div class="img-box w-1/3">
            <img src="https://image.fmkorea.com/files/attach/new/20200816/486616/657118072/3039288745/99b983892094b5c6d2fc3736e15da7d1.jpeg" alt="">
        </div>
        <div class="w-2/3 flex flex-col p-8 bg-white">
            <div class="flex items-center flex-grow">
                <p>이름 : <?= $member['name'] ?></p>
            </div>
            <div class="flex items-center flex-grow">
                <p>닉네임 : <?= $member['nickname'] ?></p>
            </div>
            <div class="flex items-center flex-grow">
                <p>이메일 : <?= $member['email'] ?></p>
            </div>
            <div class="flex items-center flex-grow">
                <p>전화번호 : <?= $member['cellphoneNo'] ?></p>
            </div>
            <div class="flex items-center flex-grow">
                <p>가입 날짜 : <?= $member['regDate'] ?></p>
            </div>
        </div>
    </div>
    <div class="flex">
        <form class="w-full" action="./modify" method="POST">
            <input type="hidden" name="id" value="<?= $member['id'] ?>">
            <input type="hidden" name="loginId" value="<?= $member['loginId'] ?>">
            <input type="hidden" name="loginPw" value="<?= $member['loginPw'] ?>">
            <input type="hidden" name="name" value="<?= $member['name'] ?>">
            <input type="hidden" name="nickname" value="<?= $member['nickname'] ?>">
            <input type="hidden" name="cellphoneNo" value="<?= $member['cellphoneNo'] ?>">
            <input type="hidden" name="email" value="<?= $member['email'] ?>">
            <input class="bg-blue-200 text-white w-full p-4" type="submit" value="회원정보 수정">
        </form>
        <form class="w-full" action="./doDelete">
            <input type="hidden" name="id" value="<?= $member['id'] ?>">
            <input class="bg-blue-200 text-white w-full p-4" onclick="if(confirm('회원을 탈퇴 하시겠습니까?') == false) return false" type="submit" value="회원 탈퇴">
        </form>
    </div>
</section>
<?php require_once __DIR__ . "/../foot.php"; ?>