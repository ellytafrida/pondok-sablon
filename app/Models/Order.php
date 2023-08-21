<?php

namespace App\Models;

use Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'services',
        'status',
    ];

    protected function services(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_decode($value),
        );
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
