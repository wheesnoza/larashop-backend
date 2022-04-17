<?php declare(strict_types=1);

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Frontend\Auth\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

final class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        if (Auth::guard('customer')->attempt($request->validated())) {
            $request->session()->regenerate();
            return response()
                ->json(
                    Auth::guard('customer')->user(),
                    Response::HTTP_OK
                );
        }

        return response()->json(
            [],
            Response::HTTP_UNAUTHORIZED
        );
    }
}
