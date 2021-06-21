<?php

namespace App\Interceptor;

class NeedLogoutInterceptor extends Interceptor
{
    function run(string $action)
    {
        switch ($action) {
            case 'usr/member/login':
            case 'usr/member/doLogin':
            case 'usr/member/join':
            case 'usr/member/doJoin':
                break;
            default:
                return;
        }

        if ($_REQUEST['App__isLogined']) {
            jsHistoryBackExit("로그아웃 후 이용해주세요.");
        }
    }
}
