<?php
$isLogined = $_REQUEST['APP__isLogined'];
$loginedMemberId = $_REQUEST['APP__loginedMemberId'];
$loginedMember = $_REQUEST['APP__loginedMember'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?=$pageTitle?></title>
  <!-- 테일윈드 라이브러리 -->
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1/dist/tailwind.min.css" rel="stylesheet" type="text/css" />
  <!-- 데이지 UI -->
  <link href="https://cdn.jsdelivr.net/npm/daisyui@1.3.2/dist/full.css" rel="stylesheet" type="text/css" />
  <!-- 폰트어썸 -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- common.css -->
  <link rel="stylesheet" href="/common.css">

</head>

<body>
  <div class="site-wrap min-h-screen flex flex-col">
    <header class="top-bar bg-blue-100 text-white h-20">
      <div class="lg:container mx-auto h-full flex">
        <a href="/" class="top-bar__logo text-xl block px-4 flex items-center">
          <span><i class="fas fa-laptop-code"></i></span>
          <span class="ml-2">NCD BLOG</span>
        </a>
        <div class="flex-grow"></div>
        <nav class="top-bar__menu">
          <ul class="flex h-full text-xl">
            <?php if ($isLogined) { ?>
            <li>
              <a class="block px-4 h-full flex items-center hover:bg-white hover:text-blue-100" href="../member/mypage">
                <span><i class="fas fa-user-cog"></i></span>
                <span class="ml-2">마이페이지</span>
              </a>
            </li>
            <li>
              <a class="block px-4 h-full flex items-center hover:bg-white hover:text-blue-100"
                href="../member/doLogout">
                <span><i class="fas fa-sign-out-alt"></i></span>
                <span class="ml-2">로그아웃</span>
              </a>
            </li>
            <?php } else{ ?>
            <li>
              <a class="block px-4 h-full flex items-center hover:bg-white hover:text-blue-100" href="../member/join">
                <span><i class="fas fa-user-plus"></i></span>
                <span class="ml-2">회원가입</span>
              </a>
            </li>
            <li>
              <a class="block px-4 h-full flex items-center hover:bg-white hover:text-blue-100" href="../member/login">
                <span><i class="fas fa-sign-in-alt"></i></span>
                <span class="ml-2">로그인</span>
              </a>
            </li>
            <?php } ?>
          </ul>
        </nav>
      </div>
    </header>
    <main class="flex-grow">
      <section>
        <div class="page-name lg:container mx-auto text-center h-40 leading-10">
          <span><?=$pageTitle?></span>
        </div>
      </section>