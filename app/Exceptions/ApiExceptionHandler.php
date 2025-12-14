<?php

namespace App\Exceptions;

use Exception;
use Throwable;
use Illuminate\Http\Request;

class ApiExceptionHandler extends Exception
{
    public static function render(Request $request, Throwable $e)
    {
        if ($request->is('api/*') || $request->expectsJson()) {
            $status = $e instanceof \InvalidArgumentException ? 400 : 500;

            return response()->json([
                'message' => $e->getMessage()
            ], $status);
        }

        return null;
    }
}
