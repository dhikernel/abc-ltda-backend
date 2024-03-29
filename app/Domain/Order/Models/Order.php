<?php

declare(strict_types=1);

namespace App\Domain\Order\Models;

use App\Domain\Product\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @OA\Schema(
 *
 * @OA\Property(property="product_id", type="integer", description="ID do Produto"),
 * @OA\Property(property="sales_id", type="integer", description="ID do pedido"),
 * @OA\Property(property="amount", type="integer", description="Total da venda")
 * )
 * Class Order
 */
class Order extends Model
{
    use HasFactory;

    use SoftDeletes;

    public const TABLE_NAME = 'orders';

    public const PRIMARY_KEY = 'id';

    public const FILLABLE = [
        'product_id',
        'sales_id',
        'amount',
    ];

    public $fillable = self::FILLABLE;

    protected $primaryKey = self::PRIMARY_KEY;

    protected $table = self::TABLE_NAME;

    public function product(): HasMany
    {
        return $this->hasMany(
            Product::class,
            'id',
            'product_id'
        );
    }
}
