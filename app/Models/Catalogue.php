<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Catalogue extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function order()
    {
        return $this->belongsTo(Order::class, 'id_catalogue');
    }
}
