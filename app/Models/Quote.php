<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Quote
 *
 * @property int $id
 * @property string $text
 * @property string $author
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\QuoteFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Quote newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Quote newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Quote query()
 * @method static \Illuminate\Database\Eloquent\Builder|Quote whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quote whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quote whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quote whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Quote whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Quote extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'text',
        'author'
    ];
}
