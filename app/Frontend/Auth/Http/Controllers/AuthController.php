<?php declare(strict_types=1);

namespace App\Frontend\Auth\Http\Controllers;

use App\Frontend\Auth\Http\Requests\LoginRequest;
use App\Shared\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use function response;

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
