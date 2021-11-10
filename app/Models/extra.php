<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\order_detail;

class extra extends Model
{
    use HasFactory;
    protected $table = 'extra';
    protected $guarded = [];
    public $timestamps = false;
    public function order_detail(){
        return $this->hasMany(order_detail::class, 'id');
    }
}
