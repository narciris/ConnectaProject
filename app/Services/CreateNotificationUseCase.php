<?php
namespace App\Services;

use App\Dtos\NotificationDtoResponse;
use App\Repositories\Contracts\NotificationInterfaceRepository;

class CreateNotificationUseCase {


    public function __construct(private readonly NotificationInterfaceRepository $notificationRepo)
    {
    }

    public function execute(array $data)
    {
        $response = $this->notificationRepo->create($data);

         return NotificationDtoResponse::fromModel($response);

    }
}