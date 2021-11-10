<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\masakan;
use App\Models\order;
use App\Models\extra;

class order_detail extends Model
{
    use HasFactory;
    protected $table = 'order_detail';
    protected $guarded = [];
    public $timestamps = false;
    public function masakan(){
        return $this->belongsTo(masakan::class, 'id_masakan');
    }
    public function order(){
        return $this->belongsTo(order::class, 'id_order');
    }
    public function extra(){
        return $this->belongsTo(extra::class, 'id_extra');
    }
}
