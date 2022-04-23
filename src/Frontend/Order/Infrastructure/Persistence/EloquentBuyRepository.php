<?php declare(strict_types=1);

namespace Src\Frontend\Order\Infrastructure\Persistence;

use App\Frontend\Order\Exceptions\NotEnoughStockException;
use App\Shared\Models\Variant as EloquentModelVariant;
use Illuminate\Support\Facades\DB;
use Src\Frontend\Order\Domain\BuyRepository;
use Src\Frontend\Order\Domain\Order;
use App\Shared\Models\Order as EloquentModelOrder;

final class EloquentBuyRepository implements BuyRepository
{
    public function buy(Order $order)
    {
        DB::transaction(function () use ($order) {
            $variantModel = EloquentModelVariant::firstWhere(
                'uuid',
                $order->variantUuid()
            );

            $stock = $variantModel
                ->stock()
                ->limit($order->quantity()->value())
                ->lockForUpdate()
                ->count();

            if ($order->quantity()->isBiggerThan($stock)) {
                throw (new NotEnoughStockException())
                    ->setVariant($variantModel->toDomain());
            }

            EloquentModelOrder::create($order->toPrimitives());

            $stock->map->delete();
        });
    }
}
