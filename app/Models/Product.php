<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory, Searchable;

    public $fillable = ['name'];

    /**
     * Get the index name for the model.
     */
    public function searchableAs()
    {
        return 'product_index';
    }
}
