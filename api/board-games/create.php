<?php

use App\BoardGame;
use App\repositories\BoardGameRepositoryFactory;
use App\Services\BoardGameService;

/** Headers */
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

/**
 * @var array $connectionParams
 */
require __DIR__ . '/../../app/bootstrap.php';


try {
    $boardGame = BoardGame::fromArray(json_decode(file_get_contents("php://input"), true));

    $service = new BoardGameService(BoardGameRepositoryFactory::create($connectionParams));
    if (!$service->create($boardGame)) {
        echo json_encode(['message' => 'Board Game was not created']);
        return;
    }

    http_response_code(201);
    echo json_encode(['message' => 'Board Game was created']);
} catch (Exception $exception) {
    http_response_code(400);
    echo json_encode(['message' => 'Something went wrong: ' . $exception->getMessage()]);
}

