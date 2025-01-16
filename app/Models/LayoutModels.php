<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayoutModels extends Model
{
    use HasFactory;
    protected $fillable = ['train_id', 'nama_layout', 'kapasitas'];

    public function train()
    {
        return $this->belongsTo(Train::class);
    }
}
