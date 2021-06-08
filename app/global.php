<?php
// 리포지터리
$APP__memberRepository = new APP__MemberRepository();
$APP__articleRepository = new APP__ArticleRepository();
$APP__boardRepository = new APP__BoardRepository();
$APP__replyRepository = new APP__ReplyRepository();
// 서비스 전역변수
$APP__memberService = new APP__MemberService();
$APP__articleService = new APP__ArticleService();
$APP__boardService = new APP__BoardService();
$APP__replyService = new APP__ReplyService();
// 어플리케이션
$application = new APP__Application();