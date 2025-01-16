<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Train extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function facilities()
    {
        return $this->hasMany(TrainFacility::class);
    }

    public function layout_models()
    {
        return $this->hasMany(LayoutModels::class);
    }

    public function images()
    {
        return $this->hasMany(TrainImage::class);
    }

    public function on_cart_items()
    {
        return $this->hasMany(CartItem::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
