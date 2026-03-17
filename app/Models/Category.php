<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'slug',
        'sort_order',
        'is_active',
    ];

    // связь категория → товары
    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    protected $casts = [
        'sort_order' => 'integer',
        'is_active' => 'boolean',
    ];
}
