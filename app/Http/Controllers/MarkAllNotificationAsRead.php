<?php

namespace App\Http\Controllers;

use App\Services\MarkNotificationAsReadUseCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MarkAllNotificationAsRead extends Controller
{
    public function __invoke(MarkNotificationAsReadUseCase $markNotificationAsReadUseCase)
    {
        $userId = Auth::id();
        $result = $markNotificationAsReadUseCase->execute($userId);
        return response()->json(
[            'message' => 'marcadoexitodamente',
              'data' => $result
]        );

    }
}
