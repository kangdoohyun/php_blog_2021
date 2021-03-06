<?php

namespace App\Service;

use App\Repository\MemberRepository;

class MemberService
{
    private MemberRepository $memberRepository;

    public static function getInstance(): MemberService
    {
        static $instance;

        if ($instance === null) {
            $instance = new MemberService();
        }

        return $instance;
    }

    public function __construct()
    {
        $this->memberRepository = MemberRepository::getInstance();
    }

    public function getMemberByLoginId(string $loginId): ?array
    {
        return $this->memberRepository->getMemberByLoginId($loginId);
    }

    public function getMemberByNickname(string $nickname): ?array
    {
        return $this->memberRepository->getMemberByNickname($nickname);
    }

    public function getMemberByEmail(string $email): ?array
    {
        return $this->memberRepository->getMemberByEmail($email);
    }

    public function getMemberById(string $memberId): ?array
    {
        return $this->memberRepository->getMemberById($memberId);
    }

    public function joinMember(string $loginId, string  $loginPw, string $name, string $nickname, string $cellphoneNo, string $email)
    {
        return $this->memberRepository->joinMember($loginId, $loginPw, $name, $nickname, $cellphoneNo, $email);
    }

    public function loginMember(string $loginId): ?array
    {
        return $this->memberRepository->loginMember($loginId);
    }

    public function modifyMember(string $loginId, string $loginPw, string $name, string $nickname, string $cellphoneNo, string $email, int $id)
    {
        return $this->memberRepository->modifyMember($loginId, $loginPw, $name, $nickname, $cellphoneNo, $email, $id);
    }

    public function deleteMember(int $id)
    {
        return $this->memberRepository->deleteMember($id);
    }
}
