<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\order_detail;

class masakan extends Model
{
    use HasFactory;
    protected $table = 'masakan';
    protected $guarded = [];
    public $timestamps = false;
    public function jenis_masakan(){
        return $this->belongsTo(jenis_masakan::class, 'id_jenis');
    }
    public function order_detail(){
        return $this->hasMany(order_detail::class, 'id');
    }
}
