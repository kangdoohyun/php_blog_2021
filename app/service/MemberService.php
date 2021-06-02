<?php
class APP__MemberService {
  private APP__MemberRepository $memberRepository;

  public function __construct() {
    $this->memberRepository = new APP__MemberRepository();
  }

}