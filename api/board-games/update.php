<?php

use App\BoardGame;
use App\repositories\BoardGameRepositoryFactory;
use App\Services\BoardGameService;

/** Headers */
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

/** @var array $connectionParams */
require __DIR__ . '/../../app/bootstrap.php';

try {
    $data = json_decode(file_get_contents("php://input"), true);
    $boardGame = BoardGame::fromArray($data);

    if (!$data['id']) {
        echo json_encode(['message' => 'Missing `id` parameter']);
        return;
    }

    $service = new BoardGameService(BoardGameRepositoryFactory::create($connectionParams));
    if (!$service->update($data['id'], $boardGame)) {
        echo json_encode(['message' => 'Board Game was not updated']);
        return;
    }

    echo json_encode(['message' => 'Board Game was updated']);
} catch (Exception $exception) {
    http_response_code(400);
    echo json_encode(['message' => 'Something went wrong: ' . $exception->getMessage()]);
}

