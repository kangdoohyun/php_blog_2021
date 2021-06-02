<?php
class APP__ReplyService {
  private APP__ReplyRepository $replyRepository;

  public function __construct() {
    $this->replyRepository = new APP__ReplyRepository();
  }

  public function getReplisByRelIdDESC(int $relId): array{
    return $this->replyRepository->getReplisByRelIdDESC($relId);
  }

  public function writeReply(int $relId, string $body, int $memberId){
    return $this->replyRepository->writeReply($relId, $body, $memberId);
  }

  public function modifyReply(int $id, string $body){
    return $this->replyRepository->modifyReply($id, $body);
  }

  public function deleteReply(int $id){
    return $this->replyRepository->deleteReply($id);
  }
}