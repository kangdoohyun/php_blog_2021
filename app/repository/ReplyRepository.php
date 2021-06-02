<?php
class APP__ReplyRepository {
  public function getReplisByRelIdDESC(int $relId): array{
    $sql = DB__seqSql();
    $sql -> add("SELECT * FROM reply");
    $sql -> add("WHERE relId = ?", $relId);
    $sql -> add("ORDER BY id DESC");
    $replis = DB__getRows($sql);

    return $replis;
  }
}