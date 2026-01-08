<?php

namespace App\Services;

use App\Repositories\Contracts\NotificationInterfaceRepository;

class MarkNotificationAsReadUseCase
{
    public function __construct(private readonly  NotificationInterfaceRepository $notificationRepo)
    {

    }

    public function execute(int $userId)
    {
        $result = $this->notificationRepo->markAsRead($userId);
        return $result;

    }

}
