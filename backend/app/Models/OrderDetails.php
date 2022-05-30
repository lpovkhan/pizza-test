<?php

namespace App\Models;

use App\Casts\Addon;
use Database\Factories\OrderDetailsFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\OrderDetails
 *
 * @property int $id
 * @property int $order_id
 * @property int $pizza_id
 * @property string $price
 * @property int $count
 * @property mixed|null $addons
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Pizza|null $pizza
 * @method static OrderDetailsFactory factory(...$parameters)
 * @method static Builder|OrderDetails newModelQuery()
 * @method static Builder|OrderDetails newQuery()
 * @method static Builder|OrderDetails query()
 * @method static Builder|OrderDetails whereAddons($value)
 * @method static Builder|OrderDetails whereCount($value)
 * @method static Builder|OrderDetails whereCreatedAt($value)
 * @method static Builder|OrderDetails whereId($value)
 * @method static Builder|OrderDetails whereOrderId($value)
 * @method static Builder|OrderDetails wherePizzaId($value)
 * @method static Builder|OrderDetails wherePrice($value)
 * @method static Builder|OrderDetails whereUpdatedAt($value)
 * @mixin Eloquent
 */
class OrderDetails extends Model
{
    use HasFactory;

    protected $casts = [
        'addons' => Addon::class
    ];

    protected $fillable = [
        'order_id',
        'pizza_id',
        'count',
        'price',
        'addons'
    ];

    /**
     * @return HasOne
     */
    public function pizza()
    {
        return $this->hasOne(Pizza::class, 'id', 'pizza_id');
    }
}
