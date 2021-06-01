<?php

namespace App\services;

use App\BoardGame;
use App\Repositories\BoardGameRepositoryInterface;

class BoardGameService
{
    private BoardGameRepositoryInterface $boardGameRepository;

    public function __construct(BoardGameRepositoryInterface $boardGameRepository)
    {
        $this->boardGameRepository = $boardGameRepository;
    }

    public function create(BoardGame $boardGame): int
    {
        return $this->boardGameRepository->create(array_filter($boardGame->toSanitizedArray()));
    }

    public function read(): array
    {
        return $this->boardGameRepository->read();
    }

    public function readById(int $id): array
    {
        return $this->boardGameRepository->readById($id);
    }

    public function update(int $id, BoardGame $boardGame): int
    {
        return $this->boardGameRepository->update($id, array_filter($boardGame->toSanitizedArray()));
    }

    public function delete(int $id)
    {
        return $this->boardGameRepository->delete($id);
    }

    public function search(array $params): array
    {
        return $this->boardGameRepository->search($params);
    }
}
