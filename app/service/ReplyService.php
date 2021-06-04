<?php
class APP__ReplyService {
  private APP__ReplyRepository $replyRepository;

  public function __construct() {
    global $APP__replyRepository;
    $this->replyRepository = $APP__replyRepository;
  }

  public function getReplisByRelIdDESC(int $relId): ?array{
    return $this->replyRepository->getReplisByRelIdDESC($relId);
  }

  public function getReplyById(int $id): ?array{
    return $this->replyRepository->getReplyById($id);
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

  public function getMemberCanDelete(int $loginedMemberId, $reply){
    if($loginedMemberId === $reply['memberId']){
      return new ResultData("S-1", "작성자 입니다.");
    }
    
    return new ResultData("F-1", "작성자만 댓글을 삭제할 수 있습니다.");
  }

  public function getMemberCanModify(int $loginedMemberId, $reply){
    if($loginedMemberId === $reply["memberId"]){
      return new ResultData("S-1", "작성자 입니다.");
    }
    
    return new ResultData("F-1", "작성자만 댓글을 수정할 수 있습니다.");
  }
}