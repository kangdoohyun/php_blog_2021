<?php

namespace App\Interceptor;

use App\Service\MemberService;

class BeforeActionInterceptor extends Interceptor
{
    private MemberService $memberService;

    public function __construct()
    {
        $this->memberService = MemberService::getInstance();
    }

    function run(string $action)
    {
        $_REQUEST['App__isLogined'] = false;
        $_REQUEST['App__loginedMemberId'] = 0;
        $_REQUEST['App__loginedMember'] = null;

        if (isset($_SESSION['loginedMemberId'])) {
            $_REQUEST['App__isLogined'] = true;
            $_REQUEST['App__loginedMemberId'] = intval($_SESSION['loginedMemberId']);
            $_REQUEST['App__loginedMember'] = $this->memberService->getMemberById($_REQUEST['App__loginedMemberId']);
        }
    }
}
