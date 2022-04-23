<?php declare(strict_types=1);

namespace Src\Frontend\Order\Infrastructure\Persistence;

use App\Frontend\Order\Exceptions\NotEnoughStockException;
use App\Shared\Models\Stock;
use Illuminate\Support\Facades\DB;
use Src\Frontend\Order\Domain\BuyRepository;
use Src\Frontend\Order\Domain\Order;
use App\Shared\Models\Order as EloquentModelOrder;

final class EloquentBuyRepository implements BuyRepository
{
    public function buy(Order $order)
    {
        DB::transaction(function () use ($order) {
            $stock = Stock::where('variant_id', $order->variantid())
                ->limit($order->quantity()->value())
                ->lockForUpdate()
                ->count();

            if ($order->quantity()->isBiggerThan($stock)) {
                throw (new NotEnoughStockException())
                    ->setOrder($order);
            }

            EloquentModelOrder::create($order->toPrimitives());

            $stock->map->delete();
        });
    }
}
