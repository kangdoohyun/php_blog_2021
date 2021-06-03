<?php
class APP__ArticleService {
  private APP__ArticleRepository $articleRepository;

  public function __construct() {
    global $APP__articleRepository;
    $this->articleRepository = $APP__articleRepository;
  }

  public function getForPrintArticles(int $boardId): array {
    return $this->articleRepository->getForPrintArticles($boardId);
  }

  public function writeArticle(int $boardId, int $memberId, string $title, string $body): int {
    return $this->articleRepository->writeArticle($boardId, $memberId, $title, $body);
  }

  public function getArticleById(int $id): array {
    return $this->articleRepository->getArticleById($id);
  }

  public function modifyArticle(int $id, string $title, string $body) {
    return $this->articleRepository->modifyArticle($id, $title, $body);
  }

  public function deleteArticle(int $id) {
    return $this->articleRepository->deleteArticle($id);
  }
}