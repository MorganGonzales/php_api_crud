<?php

use App\repositories\BoardGameRepositoryFactory;
use App\services\BoardGameService;

/** Headers */
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

/**
 * @var array $connectionParams
 */
require __DIR__ . '/../../app/bootstrap.php';

try {
    $service = new BoardGameService(BoardGameRepositoryFactory::create($connectionParams));
    if (!($rows = $service->read())) {
        echo json_encode(['message' => 'No Board Games Found']);
        return;
    }

    $response['data'] = array_map(null, $rows);

    echo json_encode($response);
} catch (Exception $exception) {
    http_response_code(400);
    echo json_encode(['message' => 'Something went wrong: ' . $exception->getMessage()]);
}




