<?php

namespace App\repositories;

use Doctrine\DBAL\Connection;

class PostGreSqlBoardGameRepository implements BoardGameRepositoryInterface
{
    private Connection $connection;

    private string $table = 'board_games';

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @throws \Doctrine\DBAL\Driver\Exception
     * @throws \Doctrine\DBAL\Exception
     */
    public function create(array $data): int
    {
        $columns = implode(', ', array_keys($data));
        $variables = implode(', ', array_fill(0, count($data), '?'));
        $values = array_values($data);

        $stmt = $this->connection->prepare("INSERT INTO {$this->table} ({$columns}) VALUES ({$variables})");
        for ($index = 0; $index < count($values); $index++) {
            $stmt->bindValue($index + 1, $values[$index]);
        }

        return $stmt->executeStatement();
    }

    /**
     * @throws \Doctrine\DBAL\Exception
     */
    public function read(): array
    {
        return $this->connection->executeQuery("SELECT * FROM {$this->table}")->fetchAllAssociative();
    }

    public function readById(int $id): array
    {
        $sql = "SELECT * FROM {$this->table} WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        $stmt->bindValue('id', $id);

        return $stmt->executeQuery()->fetchAssociative();
    }

    public function update(int $id, $data): int
    {
        $setParams = array_map(function ($column) {
            return "{$column} = :{$column}";
        }, array_keys($data));
        $setParams = implode(', ', $setParams);

        $stmt = $this->connection->prepare("UPDATE {$this->table} SET {$setParams} WHERE id = :id");
        foreach ($data as $param => $value) {
            $stmt->bindValue($param, $value);
        }
        $stmt->bindValue('id', $id);

        return $stmt->executeStatement();
    }

    public function delete(int $id): int
    {
        $stmt = $this->connection->prepare("DELETE FROM {$this->table} WHERE id = :id");
        $stmt->bindValue('id', $id);

        return $stmt->executeStatement();
    }

    public function search(array $params): array
    {
        $whereClauses = array_map(function ($column) {
            return "{$column} LIKE :{$column}";
        }, array_keys($params));

        $stmt = $this->connection->prepare("SELECT * FROM {$this->table} WHERE " . implode(' AND ', $whereClauses));
        foreach ($params as $param => $value) {
            $stmt->bindValue($param, "%{$value}%");
        }

        return $stmt->executeQuery()->fetchAllAssociative();
    }
}
