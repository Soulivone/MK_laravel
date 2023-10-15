<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'quantity_sale',
        'image'
    ];

    protected $dates = [
        'created_at',
        'updated_at'
    ];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

}
