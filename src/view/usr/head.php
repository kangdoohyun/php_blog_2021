<?php
$isLogined = $_REQUEST['APP__isLogined'];
$loginedMemberId = $_REQUEST['APP__loginedMemberId'];
$loginedMember = $_REQUEST['APP__loginedMember'];

$boards = $this->boardService->getBoardsByASC();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?></title>
    <!-- 테일윈드 라이브러리 -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1/dist/tailwind.min.css" rel="stylesheet" type="text/css" />
    <!-- 데이지 UI -->
    <link href="https://cdn.jsdelivr.net/npm/daisyui@1.3.2/dist/full.css" rel="stylesheet" type="text/css" />
    <!-- 폰트어썸 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <!-- common.css -->
    <link rel="stylesheet" href="/common.css?ver=1">
    <!-- 제이쿼리 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- common.js -->
    <script type="text/javascript" src="/common.js"></script>
</head>

<body class="overflow-x-hidden">
    <div class="site-wrap min-h-screen flex flex-col pt-20">
        <header class="top-bar fixed inset-x-0 top-0 bg-blue-200 text-white h-20">
            <div class="lg:container mx-auto h-full flex">
                <a href="/" class="top-bar__logo text-xl block px-4 flex items-center">
                    <span><i class="fas fa-laptop-code"></i></span>
                    <span class="ml-2 hidden sm:inline-block">NCD BLOG</span>
                </a>
                <div class="flex-grow"></div>
                <nav class="top-bar__menu">
                    <ul class="flex h-full text-xl">
                        <?php if ($isLogined) { ?>
                            <li>
                                <a class="block px-4 h-full flex items-center hover:bg-white hover:text-blue-100" href="../member/mypage">
                                    <span><i class="fas fa-user-cog"></i></span>
                                    <span class="ml-2 hidden sm:inline-block">마이페이지</span>
                                </a>
                            </li>
                            <li>
                                <a class="block px-4 h-full flex items-center hover:bg-white hover:text-blue-100" href="../member/doLogout">
                                    <span><i class="fas fa-sign-out-alt"></i></span>
                                    <span class="ml-2 hidden sm:inline-block">로그아웃</span>
                                </a>
                            </li>
                        <?php } else { ?>
                            <li>
                                <a class="block px-4 h-full flex items-center hover:bg-white hover:text-blue-100" href="../member/join">
                                    <span><i class="fas fa-user-plus"></i></span>
                                    <span class="ml-2 hidden sm:inline-block">회원가입</span>
                                </a>
                            </li>
                            <li>
                                <a class="block px-4 h-full flex items-center hover:bg-white hover:text-blue-100" href="../member/login">
                                    <span><i class="fas fa-sign-in-alt"></i></span>
                                    <span class="ml-2 hidden sm:inline-block">로그인</span>
                                </a>
                            </li>
                        <?php } ?>
                        <li class="menu-btn block px-4 h-full w-20 flex items-center hover:bg-white hover:text-blue-100 justify-center">
                            <div class="menu-icon block">
                                <i class="fas fa-list-ul"></i>
                            </div>
                            <div class="non-menu-icon hidden">
                                <i class="fas fa-times"></i>
                            </div>

                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        <div class="bg fixed hidden"></div>
        <div class="menu-list fixed w-1/2 h-screen -right-1/2 transitin-right-1 bg-blue-200">
            <nav class="bord-list-box bg-blue-200 text-white h-screen px-4 sm:px-16">
                <ul class="flex flex-col h-2/3 sm:text-2xl">
                    <li class="flex flex-grow items-center">
                        <a class="block w-full px-3 border-b-2 hover:border-black" href="../article/list">전체보기</a>
                    </li>
                    <?php foreach ($boards as $board) { ?>
                        <li class="flex flex-grow items-center">
                            <a class="block w-full px-3 border-b-2 hover:border-black" href="../article/list?boardId=<?= $board['id'] ?>"><?= $board['name'] ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </nav>
        </div>
        <main class="flex-grow">
            <section class="lg:container mx-auto h-40 p-4 box-border">
                <div class="page-name flex h-full items-center justify-center">
                    <span><?= $pageTitle ?></span>
                </div>
            </section>