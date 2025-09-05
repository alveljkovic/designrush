<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Provider extends Model
{
    /** @use HasFactory<\Database\Factories\DrProviderFactory> */
    use HasFactory;

    protected $fillable = ['name','slug','short_description','logo_path','category_id'];

    /**
     * Eager load
     *
     * @var array
     */
    protected $with = ['category'];

    /**
     * Relation with Category model
     *
     * @return BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
