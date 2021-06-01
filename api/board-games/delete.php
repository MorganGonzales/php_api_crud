<?php

use App\repositories\BoardGameRepositoryFactory;
use App\Services\BoardGameService;

/** Headers */
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

/** @var array $connectionParams */
require __DIR__ . '/../../app/bootstrap.php';

try {
    $data = json_decode(file_get_contents("php://input"));
    if (!$data->id) {
        echo json_encode(['message' => 'Missing `id` parameter']);
        return;
    }

    $service = new BoardGameService(BoardGameRepositoryFactory::create($connectionParams));

    echo $service->delete($data->id)
        ? json_encode(['message' => 'Board Game was deleted'])
        : json_encode(['message' => 'Nothing was deleted']);
} catch (Exception $exception) {
    http_response_code(400);
    echo json_encode(['message' => 'Something went wrong: ' . $exception->getMessage()]);
}
