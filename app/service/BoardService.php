<?php
class APP__BoardService {
  private APP__BoardRepository $boardRepository;

  public function __construct() {
    $this->boardRepository = new APP__BoardRepository();
  }

  public function getBoardsByDESC(): array{
    return $this->boardRepository->getBoardsByDESC();
  }

  public function getBoardsByASC(): array{
    return $this->boardRepository->getBoardsByASC();
  }
}