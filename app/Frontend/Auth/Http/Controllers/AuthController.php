<?php declare(strict_types=1);

namespace App\Frontend\Auth\Http\Controllers;

use App\Frontend\Auth\Http\Requests\LoginRequest;
use App\Frontend\Auth\Http\Requests\RegisterRequest;
use App\Shared\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Src\Frontend\Auth\Domain\CustomerAuthRepository;
use Src\Frontend\Customer\Application\Create\CustomerCreator;
use function response;

final class AuthController extends Controller
{
    private CustomerAuthRepository $customerAuthRepository;

    public function __construct(CustomerAuthRepository $customerAuthRepository)
    {
        $this->customerAuthRepository = $customerAuthRepository;
    }

    public function register(RegisterRequest $request, CustomerCreator $creator): JsonResponse
    {
        $customer = $creator($request->validated());

        $this->customerAuthRepository
            ->login($customer);

        return response()
            ->json(
                $this->customerAuthRepository->user()->toPrimitives(),
                Response::HTTP_OK
            );
    }

    public function login(LoginRequest $request): JsonResponse
    {
        if (Auth::guard('customer')->attempt($request->validated())) {
            $request->session()->regenerate();
            return response()
                ->json(
                    $this->customerAuthRepository->user()->toPrimitives(),
                    Response::HTTP_OK
                );
        }

        return response()->json(
            [],
            Response::HTTP_UNAUTHORIZED
        );
    }
}
