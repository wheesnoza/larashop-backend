<?php declare(strict_types=1);

namespace App\Frontend\Product\Http\Controllers;

use App\Frontend\Product\Http\Requests\ShowProductRequest;
use App\Shared\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Src\Frontend\Product\Application\Find\ProductFinder;

final class ProductController extends Controller
{
    public function show(ShowProductRequest $request, ProductFinder $finder): JsonResponse
    {
        return response()
            ->json(
                $finder($request->route('uuid'))
                    ->toPrimitives(),
                Response::HTTP_OK
            );
    }
}
