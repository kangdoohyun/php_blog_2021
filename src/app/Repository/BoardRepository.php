<?php

namespace App\Repository;

class BoardRepository
{
    public static function getInstance(): BoardRepository
    {
        static $instance;

        if ($instance === null) {
            $instance = new BoardRepository();
        }

        return $instance;
    }

    private function __construct()
    {
    }

    public function getBoardsByDESC(): array
    {
        $sql = DB__seqSql();
        $sql->add("SELECT * FROM board ORDER BY id DESC");
        $boards = DB__getRows($sql);

        return $boards;
    }

    public function getBoardsByASC(): array
    {
        $sql = DB__seqSql();
        $sql->add("SELECT * FROM board ORDER BY id ASC");
        $boards = DB__getRows($sql);

        return $boards;
    }

    public function makeBoard(string $name)
    {
        $sql = DB__seqSql();
        $sql->add("INSERT INTO board");
        $sql->add("SET regDate = NOW(), updateDate = NOW(),");
        $sql->add("`name` = ?", $name);
        DB__insert($sql);
    }
}
