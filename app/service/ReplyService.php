<?php
class APP__ReplyService {
  private APP__ReplyRepository $replyRepository;

  public function __construct() {
    $this->replyRepository = new APP__ReplyRepository();
  }

  public function getReplisByRelIdDESC(int $relId): array{
    return $this->replyRepository->getReplisByRelIdDESC($relId);
  }
}