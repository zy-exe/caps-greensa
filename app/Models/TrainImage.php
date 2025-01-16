<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainImage extends Model
{
    use HasFactory;
    protected $fillable = ['train_id', 'konten', 'gambar'];

    public function train()
    {
        return $this->belongsTo(Train::class);
    }
}
