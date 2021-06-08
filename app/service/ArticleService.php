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

  public function getTotalArticlesCount(): int{
    return $this->articleRepository->getTotalArticlesCount();
  }

  public function getMemberCanModify(int $loginedMemberId, $article){
    if($loginedMemberId === $article['memberId']){
      return new ResultData("S-1", "작성자 입니다.");
    }
    
    return new ResultData("F-1", "작성자만 글을 수정할 수 있습니다.");
  }

  public function getMemberCanDelete(int $loginedMemberId, $article){
    if($loginedMemberId === $article['memberId']){
      return new ResultData("S-1", "작성자 입니다.");
    }
    
    return new ResultData("F-1", "작성자만 글을 삭제할 수 있습니다.");
  }
}