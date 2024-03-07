<?php

declare(strict_types=1);

namespace App\Domain\Product\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @OA\Schema(
 *
 * @OA\Property(property="name", type="string", description="Nome do Produto"),
 * @OA\Property(property="price", type="decimal", description="Preço do Produto"),
 * @OA\Property(property="description", type="text", description="Descrição do Produto")
 * )
 * Class Product
 */
class Product extends Model
{
    use HasFactory;

    use SoftDeletes;

    public const TABLE_NAME = 'products';

    public const PRIMARY_KEY = 'id';

    public const FILLABLE = [
        'name',
        'price',
        'description',
    ];

    public $fillable = self::FILLABLE;

    protected $primaryKey = self::PRIMARY_KEY;

    protected $table = self::TABLE_NAME;
}
