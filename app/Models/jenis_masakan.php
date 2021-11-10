<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\masakan;

class jenis_masakan extends Model
{
    use HasFactory;
    protected $table = 'jenis_masakan';
    protected $guarded = [];
    public $timestamps = false;
    public function masakan(){
        return $this->hasMany(masakan::class, 'id');
    }
}
