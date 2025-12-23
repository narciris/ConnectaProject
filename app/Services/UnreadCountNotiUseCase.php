<?php

namespace App\Services;

use App\Dtos\NotificationDtoResponse;
use App\Repositories\Contracts\NotificationInterfaceRepository;
use Illuminate\Support\Facades\Log;

class UnreadCountNotiUseCase
{
    public function __construct(private readonly NotificationInterfaceRepository $notificationRepo)
    {
       
    }

    public function execute(int $userId){
        $response = $this->notificationRepo->unreadCount($userId);
        Log::info("respuesta ",[$response]);
        return $response;
    }
}