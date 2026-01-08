<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\UnreadCountNotiUseCase;

class UnreadNotificationController extends Controller
{
    public function __invoke(UnreadCountNotiUseCase $unreadNotification)
    {
        $userID = Auth::id();
        $response = $unreadNotification->execute($userID);

        return response()->json(
              $response
        );
    }
}
