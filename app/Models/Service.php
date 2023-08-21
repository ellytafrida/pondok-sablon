<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'name',
        'minimum_order',
        'unit_price',
        'description',
        'category_id',
        'slide_1',
        'slide_2',
        'slide_3',
        'slide_4',
        'slide_5',
    ];

    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }
}
