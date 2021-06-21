<?php

namespace App\Controller;

use App\Controller\Controller;
use App\Service\BoardService;

class UsrBoardController extends Controller
{
    private BoardService $boardService;

    public function __construct()
    {
        parent::__construct();
        $this->boardService = BoardService::getInstance();
    }

    public function actionShowMake()
    {
        require_once $this->getViewPath("usr/board/make");
    }
    public function actionDoMake()
    {
        $name = getStrValueOr($_REQUEST['name'], "");

        if (empty($_REQUEST['name'])) {
            jsHistoryBackExit("게시판 이름을 입력해주세요.");
        }

        $this->boardService->makeBoard($name);

        jsAlert("${name}게시판이 생성되었습니다.");
        jsLocationReplaceExit("../article/list");
    }
}
