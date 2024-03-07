<?php

declare(strict_types=1);

namespace App\Domain\Order\Repositories;

use App\Domain\Order\Models\Order;
use App\Domain\Order\Resources\OrderCollection;
use App\Domain\Order\Support\OrderRelationships;
use App\Domain\Product\Models\Product;;

use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;
use Exception;

/**
 * @property OrderRelationships $orderRelationships
 */
class OrderRepository
{
    public function __construct(OrderRelationships $orderRelationships)
    {
        $this->orderRelationships = $orderRelationships;
    }
    public function index()
    {
        $query = Order::with((new OrderRelationships())->get());

        $result = QueryBuilder::for($query)
            ->allowedFilters([
                AllowedFilter::partial('product_name', 'product.name'),
            ])
            ->defaultSort('-created_at')
            ->paginate(request('per_page', config('settings.AMOUNT_PAGINATE_DEFAULT')))
            ->appends(request()->query());

        $resultOrderCollection = new OrderCollection($result);

        return $resultOrderCollection->resource;
    }

    public function store(array $request)
    {
        $createOrder = Order::create($request);
        $loadProducts = Product::where('id', $request['product_id'])->first();
        return [
            'sales_id' => $createOrder->sales_id,
            'amount' => $createOrder->amount,
            'products' => array([
                'product_id' => $loadProducts->id,
                'nome' => $loadProducts->name,
                'price' => $loadProducts->price,
                'amount' => $loadProducts->id,
            ]),
        ];
    }

    public function update(array $data, int $id)
    {
        $updateOrder = Order::find($id);

        return $updateOrder->update($data);
    }

    public function destroy(int $id): bool
    {
        return (bool) Order::destroy($id);
    }
}
