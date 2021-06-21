<?php
namespace App\Repository;

class ArticleRepository
{
    public static function getInstance(): ArticleRepository
    {
        static $instance;

        if ($instance === null) {
            $instance = new ArticleRepository();
        }

        return $instance;
    }

    private function __construct()
    {
    }
    
    public function getForPrintArticles(int $boardId): array
    {
        $sql = DB__seqSql();
        if ($boardId == 0) {
            $sql->add("SELECT * FROM article");
            $sql->add("ORDER BY id DESC");
        } else {
            $sql->add("SELECT A.* FROM article AS A");
            $sql->add("INNER JOIN board AS B ON A.boardId = B.id");
            $sql->add("WHERE A.boardId = ?", $boardId);
            $sql->add("ORDER BY a.id DESC");
        }
        $articles = DB__getRows($sql);

        return $articles;
    }

    public function writeArticle(int $boardId, int $memberId, string $title, string $body): int
    {
        $sql = DB__SeqSql();
        $sql->add("INSERT INTO article");
        $sql->add("SET regDate = NOW(),");
        $sql->add("updateDate = NOW(),");
        $sql->add("boardId = ?,", $boardId);
        $sql->add("memberId = ?,", $memberId);
        $sql->add("title = ?,", $title);
        $sql->add("body = ?", $body);
        $id = DB__insert($sql);

        return $id;
    }

    public function getArticleById(int $id): array
    {
        $sql = DB__seqSql();
        $sql->add("SELECT * FROM article");
        $sql->add("WHERE id = ?", $id);
        $article = DB__getRow($sql);

        return $article;
    }

    public function modifyArticle(int $id, string $title, string $body)
    {
        $sql = DB__seqSql();
        $sql->add("UPDATE article SET");
        $sql->add("updateDate = NOW(),");
        $sql->add("title = ?,", $title);
        $sql->add("body = ?", $body);
        $sql->add("WHERE id = ?", $id);
        DB__modify($sql);
    }

    public function deleteArticle(int $id)
    {
        $sql = DB__seqSql();
        $sql->add("DELETE FROM article");
        $sql->add("WHERE id = ?", $id);
        DB__delete($sql);
    }

    public function getTotalArticlesCount(): int
    {
        $sql = DB__seqSql();
        $sql->add("SELECT COUNT(*) FROM article");
        return DB__getRowIntValue($sql, 0);
    }

    public function updateViews(int $views, int $id)
    {
        $sql = DB__seqSql();
        $sql->add("UPDATE article SET");
        $sql->add("views = ?", $views);
        $sql->add("WHERE id = ?", $id);
        DB__modify($sql);
    }

    public function insertLike(int $memberId, int $articleId)
    {
        $sql = DB__seqSql();
        $sql->add("INSERT INTO `like` SET");
        $sql->add("regDate = NOW(),");
        $sql->add("memberId = ?,", $memberId);
        $sql->add("articleId = ?", $articleId);
        DB__insert($sql);
    }

    public function deleteLike(int $memberId, int $articleId)
    {
        $sql = DB__seqSql();
        $sql->add("DELETE FROM `like`");
        $sql->add("WHERE memberId = ? AND", $memberId);
        $sql->add("articleId = ?", $articleId);
        DB__delete($sql);
    }

    public function getLikeByMemberIdAndArticleId(int $memberId, int $articleId): ?array
    {
        $sql = DB__SeqSql();
        $sql->add("SELECT * FROM `like`");
        $sql->add("WHERE memberId = ? AND", $memberId);
        $sql->add("articleId = ?", $articleId);

        $like = DB__getRow($sql);

        return $like;
    }
}
