<?php

namespace App\Service;

use App\Repository\BoardRepository;

class BoardService
{
    private BoardRepository $boardRepository;

    public static function getInstance(): BoardService
    {
        static $instance;

        if ($instance === null) {
            $instance = new BoardService();
        }

        return $instance;
    }

    public function __construct()
    {
        $this->boardRepository = BoardRepository::getInstance();
    }
    public function getBoardsByDESC(): array
    {
        return $this->boardRepository->getBoardsByDESC();
    }

    public function getBoardsByASC(): array
    {
        return $this->boardRepository->getBoardsByASC();
    }

    public function makeBoard(string $name)
    {
        return $this->boardRepository->makeBoard($name);
    }
}
