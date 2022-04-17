<?php declare(strict_types=1);

namespace App\Frontend\Product\Http\Controllers;

use App\Frontend\Product\Http\Requests\ShowProductRequest;
use App\Shared\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Src\Frontend\Product\Domain\ProductRepository;

final class ProductController extends Controller
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function show(ShowProductRequest $request): JsonResponse
    {
        return response()
            ->json(
                $this->productRepository
                    ->find($request->uuid())
                    ->toPrimitives(),
                Response::HTTP_OK
            );
    }
}
