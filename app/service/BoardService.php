<?php
class APP__BoardService {
  private APP__BoardRepository $boardRepository;

  public function __construct() {
    global $APP__boardRepository;
    $this->boardRepository = $APP__boardRepository;
  }

  public function getBoardsByDESC(): array{
    return $this->boardRepository->getBoardsByDESC();
  }

  public function getBoardsByASC(): array{
    return $this->boardRepository->getBoardsByASC();
  }

  public function makeBoard(string $name){
    return $this->boardRepository->makeBoard($name);
  }
}