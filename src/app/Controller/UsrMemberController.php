<?php

namespace App\Controller;

use App\Controller\Controller;
use App\Service\MemberService;
use App\Service\BoardService;

class UsrMemberController extends Controller
{
    private MemberService $memberService;
    private BoardService $boardService;

    public function __construct()
    {
        parent::__construct();
        $this->memberService = MemberService::getInstance();
        parent::__construct();
        $this->boardService = BoardService::getInstance();
    }

    public function actionShowJoin()
    {
        require_once $this->getViewPath("usr/member/join");
    }

    public function actionShowlogin()
    {
        require_once $this->getViewPath("usr/member/login");
    }

    public function actionShowModify()
    {
        $id = getIntValueOr($_REQUEST['id'], 0);
        if (!$id) {
            jsHistoryBackExit('회원번호를 입력해주세요.');
        }
        $member = $this->memberService->getMemberById($id);
        require_once $this->getViewPath("usr/member/modify");
    }

    public function actionShowMypage()
    {
        $member = $this->memberService->getMemberById($_REQUEST['App__loginedMemberId']);
        require_once $this->getViewPath("usr/member/mypage");
    }

    public function actionDoJoin()
    {
        $loginId = getStrValueOr($_REQUEST['loginId'], "");
        $loginPw = getStrValueOr($_REQUEST['loginPw'], "");
        $name = getStrValueOr($_REQUEST['name'], "");
        $nickname = getStrValueOr($_REQUEST['nickname'], "");
        $cellphoneNo = getStrValueOr($_REQUEST['cellphoneNo'], "");
        $email = getStrValueOr($_REQUEST['email'], "");

        if (!$loginId) {
            jsHistoryBackExit("아이디를 입력해 주세요.");
        } else if (!$loginPw) {
            jsHistoryBackExit("비밀번호를 입력해 주세요.");
        } else if (!$name) {
            jsHistoryBackExit("이름을 입력해 주세요.");
        } else if (!$nickname) {
            jsHistoryBackExit("닉네임을 입력해 주세요.");
        } else if (!$cellphoneNo) {
            jsHistoryBackExit("전화번호를 입력해 주세요.");
        } else if (!$email) {
            jsHistoryBackExit("이메일을 입력해 주세요.");
        }

        $member = $this->memberService->getMemberByLoginId($loginId);

        if ($member != null) {
            jsHistoryBackExit("이미 사용중인 아이디입니다.");
        }
        $member = $this->memberService->getMemberByNickname($nickname);
        if ($member != null) {
            jsHistoryBackExit("이미 사용중인 닉네임입니다.");
        }
        $member = $this->memberService->getMemberByEmail($email);
        if ($member != null) {
            jsHistoryBackExit("이미 사용중인 이메일입니다.");
        }

        $this->memberService->joinMember($loginId, $loginPw, $name, $nickname, $cellphoneNo, $email);

        jsAlert("${nickname}님 회원가입을 환영합니다.");
        jsLocationReplaceExit("./login");
    }

    public function actionDoLogin()
    {
        $loginId = getStrValueOr($_REQUEST['loginId'], "");
        $loginPw = getStrValueOr($_REQUEST['loginPw'], "");

        if (!$loginId) {
            jsLocationReplaceExit('../member/login', '로그인아이디를 입력해주세요.');
        }
        if (!$loginPw) {
            jsLocationReplaceExit('../member/login', '비밀번호를 입력해주세요.');
        }

        $member = $this->memberService->loginMember($loginId);

        if (!$member) {
            jsHistoryBackExit("존재하지 않는 회원입니다.");
        }
        if ($member['delStatus'] == 1) {
            jsHistoryBackExit("존재하지 않는 회원입니다.");
        }
        if ($member['loginPw'] != $loginPw) {
            jsHistoryBackExit("비밀번호를 확인해주세요.");
        }

        $_SESSION['loginedMemberId'] = $member['id'];

        jsAlert("${member['nickname']}님 환영합니다.");
        jsLocationReplaceExit("../article/list");
    }

    public function actionDoModify()
    {
        $id = getIntValueOr($_REQUEST['id'], 0);
        $loginId = getStrValueOr($_REQUEST['loginId'], "");
        $loginPw = getStrValueOr($_REQUEST['loginPw'], "");
        $name = getStrValueOr($_REQUEST['name'], "");
        $nickname = getStrValueOr($_REQUEST['nickname'], "");
        $cellphoneNo = getStrValueOr($_REQUEST['cellphoneNo'], "");
        $email = getStrValueOr($_REQUEST['email'], "");

        $loginedMemberId = getIntValueOr($_SESSION['loginedMemberId'], 0);

        if (!$id) {
            jsHistoryBackExit('회원번호를 입력해주세요.');
        }
        if (!$loginId) {
            jsHistoryBackExit('로그인 아이디를 입력해주세요.');
        }
        if (!$loginPw) {
            jsHistoryBackExit('비밀번호를 입력해주세요.');
        }
        if (!$name) {
            jsHistoryBackExit('이름을 입력해주세요.');
        }
        if (!$nickname) {
            jsHistoryBackExit('닉네임을 입력해주세요.');
        }
        if (!$cellphoneNo) {
            jsHistoryBackExit('전화번호를 입력해주세요.');
        }
        if (!$email) {
            jsHistoryBackExit('이메일을 입력해주세요.');
        }

        $loginedMember = $this->memberService->getMemberById($loginedMemberId);

        $member = $this->memberService->getMemberByLoginId($loginId);
        if ($member['loginId'] != $loginedMember['loginId'] and $member['loginId'] != null) {
            jsHistoryBackExit("중복된 아이디입니다.");
        }
        $member = $this->memberService->getMemberByNickname($nickname);
        if ($member['nickname'] != $loginedMember['nickname'] and $member['nickname'] != null) {
            jsHistoryBackExit("중복된 닉네임입니다.");
        }
        $member = $this->memberService->getMemberByEmail($email);
        if ($member['email'] != $loginedMember['email'] and $member['email'] != null) {
            jsHistoryBackExit("중복된 이메일입니다.");
        }

        $this->memberService->modifyMember($loginId, $loginPw, $name, $nickname, $cellphoneNo, $email, $id);

        jsAlert("회원정보 수정이 완료되었습니다.");
        jsLocationReplaceExit("./doLogout", "다시 로그인해 주세요.");
        jsLocationReplaceExit("./login");
    }

    public function actionDoDelete()
    {
        $id = getIntValueOr($_REQUEST['id'], 0);
        if (!$id) {
            jsHistoryBackExit('회원번호를 입력해주세요.');
        }

        $this->memberService->deleteMember($id);

        jsAlert("회원 탈퇴가 완료되었습니다.");
        jsLocationReplaceExit("../member/doLogout");
    }

    public function actionDoLogout()
    {
        unset($_SESSION['loginedMemberId']);

        jsAlert("로그아웃 되었습니다.");
        jsLocationReplaceExit("./login");
    }
}
