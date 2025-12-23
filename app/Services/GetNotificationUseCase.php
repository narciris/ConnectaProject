<?php

namespace App\Services;
use App\Repositories\Contracts\NotificationInterfaceRepository;
use App\Dtos\NotificationDtoResponse;

class GetNotificationUseCase{

    public function __construct(private readonly NotificationInterfaceRepository $notiRepo)
    {
    }


    public function execute(int $userId){
     $response = $this->notiRepo->getAll($userId);
         $notifications = collect($response);

     $unreadNotifications = $notifications->filter(fn($n) => !$n->leido);
    $dtos = $unreadNotifications->map(fn($n) => NotificationDtoResponse::fromModel($n));
        $unreadCount = $unreadNotifications->count();


   return [
        'notifications' => $dtos->toArray(),
        'unread_count' => $unreadCount
    ];
    }
}