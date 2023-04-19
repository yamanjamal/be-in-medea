<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_leaf',
        'discount',
        'parent_id',
        'menu_id',
    ];

    public function Menu(): BelongsTo
    {
        return $this->belongsTo(Menu::class);
    }

    public function Categories(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function Category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}