<?php

use App\repositories\BoardGameRepositoryFactory;
use App\services\BoardGameService;

/** Headers */
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

/** @var array $connectionParams */
require __DIR__ . '/../../app/bootstrap.php';

try {
    $searchParams = json_decode(file_get_contents("php://input"), true);

    $service = new BoardGameService(BoardGameRepositoryFactory::create($connectionParams));
    if (!($rows = $service->search($searchParams))) {
        echo json_encode(['message' => 'No Board Games Found']);
        return;
    }

    $response['data'] = array_map(null, $rows);

    echo json_encode($response);
} catch (Exception $exception) {
    http_response_code(400);
    echo json_encode(['message' => 'Something went wrong: ' . $exception->getMessage()]);
}

