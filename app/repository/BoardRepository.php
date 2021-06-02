<?php
class APP__BoardRepository {
  public function getBoardsByDESC(): array {
    $sql = DB__seqSql();
    $sql -> add("SELECT * FROM board ORDER BY id DESC");
    $boards = DB__getRows($sql);

    return $boards;
  }

  public function getBoardsByASC(): array {
    $sql = DB__seqSql();
    $sql -> add("SELECT * FROM board ORDER BY id ASC");
    $boards = DB__getRows($sql);

    return $boards;
  }
}