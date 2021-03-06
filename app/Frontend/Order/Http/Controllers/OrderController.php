<?php declare(strict_types=1);

namespace App\Frontend\Order\Http\Controllers;

use App\Shared\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

final class OrderController extends Controller
{
    public function index(): JsonResponse
    {
        return response()
            ->json([], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
    }
}
