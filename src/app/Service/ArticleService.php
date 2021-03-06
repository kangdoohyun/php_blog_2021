<?php

namespace App\Service;

use App\Repository\ArticleRepository;
use App\Vo\ResultData;

class ArticleService
{
    private ArticleRepository $articleRepository;

    public static function getInstance(): ArticleService
    {
        static $instance;

        if ($instance === null) {
            $instance = new ArticleService();
        }

        return $instance;
    }

    public function __construct()
    {
        $this->articleRepository = ArticleRepository::getInstance();
    }

    public function getForPrintArticles(int $boardId): array
    {
        return $this->articleRepository->getForPrintArticles($boardId);
    }

    public function writeArticle(int $boardId, int $memberId, string $title, string $body): int
    {
        return $this->articleRepository->writeArticle($boardId, $memberId, $title, $body);
    }

    public function getArticleById(int $id): array
    {
        return $this->articleRepository->getArticleById($id);
    }

    public function modifyArticle(int $id, string $title, string $body)
    {
        return $this->articleRepository->modifyArticle($id, $title, $body);
    }

    public function deleteArticle(int $id)
    {
        return $this->articleRepository->deleteArticle($id);
    }

    public function getTotalArticlesCount(): int
    {
        return $this->articleRepository->getTotalArticlesCount();
    }

    public function updateViews(int $views, int $id)
    {
        return $this->articleRepository->updateViews($views, $id);
    }

    public function insertLike(int $memberId, int $articleId)
    {
        return $this->articleRepository->insertLike($memberId, $articleId);
    }

    public function deleteLike(int $memberId, int $articleId)
    {
        return $this->articleRepository->deleteLike($memberId, $articleId);
    }

    public function getLikeByMemberIdAndArticleId(int $memberId, int $articleId): ?array
    {
        return $this->articleRepository->getLikeByMemberIdAndArticleId($memberId, $articleId);
    }

    public function getMemberCanModify(int $loginedMemberId, $article): ResultData
    {
        if ($loginedMemberId === $article['memberId']) {
            return new ResultData("S-1", "????????? ?????????.");
        }

        return new ResultData("F-1", "???????????? ?????? ????????? ??? ????????????.");
    }

    public function getMemberCanDelete(int $loginedMemberId, $article): ResultData
    {
        if ($loginedMemberId === $article['memberId']) {
            return new ResultData("S-1", "????????? ?????????.");
        }

        return new ResultData("F-1", "???????????? ?????? ????????? ??? ????????????.");
    }
}
