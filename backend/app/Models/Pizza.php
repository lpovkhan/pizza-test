<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Pizza
 *
 * @property int $id
 * @property string $name
 * @property int $type
 * @property string $price
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\PizzaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Pizza newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pizza newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pizza query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pizza whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pizza whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pizza whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pizza wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pizza whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pizza whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Pizza extends Model
{
    use HasFactory;

    public const TYPE_EXTRA_LARGE = 3;
    public const TYPE_LARGE = 2;
    public const TYPE_MEDIUM = 1;
    public const TYPE_SMALL = 0;

    protected $fillable = [
      'name',
      'type',
      'price'
    ];

    /**
     * @return string[]
     */
    public static function types()
    {
        return [
            self::TYPE_SMALL => 'small',
            self::TYPE_MEDIUM => 'medium',
            self::TYPE_LARGE => 'large',
            self::TYPE_EXTRA_LARGE => 'extra large'
        ];
    }
}
