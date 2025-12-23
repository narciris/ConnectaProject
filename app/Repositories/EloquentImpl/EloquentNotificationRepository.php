<?php
namespace App\Repositories\EloquentImpl;
use App\Models\Notification;
use App\Repositories\Contracts\NotificationInterfaceRepository;

class EloquentNotificationRepository  implements NotificationInterfaceRepository{

   public function getAll(int $userId)
   {
    $notification = Notification::where('usuario_id',$userId)
    ->orderBy('created_at')
    ->get();

    return $notification;
   }


   public function getById(int $userId, int $notId)
   {
 
   }

   public function delete(int $notiId)
   {
    
   }

   public function create(array $data)
   {
      return Notification::create($data);
    
   }

   public function unreadCount(int $userId)
   {
      return Notification::where('usuario_id', $userId)
      ->unread()
      ->count();
   }
}