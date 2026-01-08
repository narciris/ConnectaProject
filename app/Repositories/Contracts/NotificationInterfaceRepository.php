<?php

namespace App\Repositories\Contracts;

interface NotificationInterfaceRepository {

public  function getAll(int $userId);

public function create(array $data);

public function getById(int $userId, int $notId);

public function delete(int $notiId);

public function unreadCount(int $userId);
public function markAsRead(int $userId);

}
