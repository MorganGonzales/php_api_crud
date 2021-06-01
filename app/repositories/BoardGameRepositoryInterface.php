<?php

namespace App\Repositories;

interface BoardGameRepositoryInterface
{
    public function create(array $data): int;

    public function read(): array;

    public function readById(int $id): array;

    public function update(int $id, $data): int;

    public function delete(int $id);

    public function search(array $params): array;
}
