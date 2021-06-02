<?php
class APP__MemberRepository {
  public function getMemberByLoginId(string $loginId): ?array {
    $sql = DB__seqSql();
    $sql -> add("SELECT * FROM `member`");
    $sql -> add("WHERE loginId = ?", $loginId);
    $member = DB__getRow($sql);

    return $member;
  }

  public function getMemberByNickname(string $nickname): ?array {
    $sql = DB__seqSql();
    $sql -> add("SELECT * FROM `member`");
    $sql -> add("WHERE nickname = ?", $nickname);
    $member = DB__getRow($sql);

    return $member;
  }

  public function getMemberByEmail(string $email): ?array {
    $sql = DB__seqSql();
    $sql -> add("SELECT * FROM `member`");
    $sql -> add("WHERE email = ?", $email);
    $member = DB__getRow($sql);

    return $member;
  }

  public function getMemberById(string $memberId): ?array {
    $sql = DB__seqSql();
    $sql -> add("SELECT * FROM member");
    $sql -> add("WHERE id = ?", $memberId);
    $member = DB__getRow($sql);

    return $member;
  }
  
  public function joinMember(string $loginId, string  $loginPw, string $name, string $nickname, string $cellphoneNo, string $email){
    $sql = DB__seqSql();
    $sql -> add("INSERT INTO `member` SET");
    $sql -> add("regDate = NOW(),");
    $sql -> add("updateDate = NOW(),");
    $sql -> add("loginId = ?,", $loginId);
    $sql -> add("loginPw = ?,", $loginPw);
    $sql -> add("name = ?,", $name);
    $sql -> add("nickname = ?,", $nickname);
    $sql -> add("cellphoneNo = ?,", $cellphoneNo);
    $sql -> add("email = ?,", $email);
    $sql -> add("delStatus = '0'");
    DB__insert($sql);
  }

  public function loginMember(string $loginId): ?array{
    $sql = DB__SeqSql();
    $sql -> add("SELECT * FROM member");
    $sql -> add("WHERE loginId = ?", $loginId);
    $member = DB__getRow($sql);

    return $member;
  }

  public function modifyMember(string $loginId, string $loginPw, string $name, string $nickname, string $cellphoneNo, string $email, int $id){
    $sql = DB__SeqSql();
    $sql -> add("UPDATE `member` SET ");
    $sql -> add("updateDate = NOW(),");
    $sql -> add("loginId = ?,", $loginId);
    $sql -> add("loginPw = ?,", $loginPw);
    $sql -> add("name = ?,", $name);
    $sql -> add("nickname = ?,", $nickname);
    $sql -> add("cellphoneNo = ?,", $cellphoneNo);
    $sql -> add("email = ?", $email);
    $sql -> add("WHERE id = ?", $id);
    DB__modify($sql);
  }

  public function deleteMember(int $id){
    $sql = DB__seqSql();
    $sql -> add("UPDATE `member` SET");
    $sql -> add("delStatus = 1");
    $sql -> add("WHERE id = ?", $id);
    DB__modify($sql);
  }
}