<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QRcode extends Model
{
    use HasFactory;
    protected $table = 'qrcode';
    protected $guarded = [];
    public $timestamps = false;
}
