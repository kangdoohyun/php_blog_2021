<?php
class APP__ReplyRepository {
  public function getReplisByRelIdDESC(int $relId): ?array{
    $sql = DB__seqSql();
    $sql -> add("SELECT * FROM reply");
    $sql -> add("WHERE relId = ?", $relId);
    $sql -> add("ORDER BY id DESC");
    $replis = DB__getRows($sql);

    return $replis;
  }

  public function getReplyById(int $id): ?array {
    $sql = DB__SeqSql();
    $sql -> add("SELECT * FROM reply WHERE");
    $sql -> add("id = ?", $id);
    $reply = DB__getRow($sql);

    return $reply;
  }

  public function writeReply(int $relId, string $body, int $memberId){
    $sql = DB__seqSql();
    $sql -> add("INSERT INTO reply");
    $sql -> add("SET regDate = NOW(), updateDate = NOW(),");
    $sql -> add("memberId = ?,", $memberId);
    $sql -> add("relTypeCode = 'article',");
    $sql -> add("relId = ?,", $relId);
    $sql -> add("`body` = ?", $body);
    DB__insert($sql);
  }

  public function modifyReply(int $id, string $body){
    $sql = DB__seqSql();
    $sql -> add("UPDATE reply SET");
    $sql -> add("updateDate = NOW(),");
    $sql -> add("body = ?", $body);
    $sql -> add("WHERE id = ?", $id);
    DB__modify($sql);
  }

  public function deleteReply(int $id){
    $sql = DB__seqSql();
    $sql -> add("DELETE FROM reply WHERE id = ?", $id);
    DB__delete($sql);
  }
}