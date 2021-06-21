<?php

namespace App\Interceptor;

class NeedLoginInterceptor extends Interceptor
{
    function run(string $action)
    {
        switch ($action) {
            case 'usr/member/login':
            case 'usr/member/doLogin':
            case 'usr/member/join':
            case 'usr/member/doJoin':
            case 'usr/article/list':
            case 'usr/article/detail':
            case 'usr/home/aboutMe':
                return;
        }

        if ($_REQUEST['App__isLogined'] == false) {
            jsHistoryBackExit("로그인 후 이용해주세요.");
        }
    }
}
