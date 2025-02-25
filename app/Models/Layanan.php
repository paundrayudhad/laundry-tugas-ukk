<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Layanan extends Model
{
    //
    use HasFactory;

    protected $table = 'layanan';
    public $timestamps = false;
    protected $guarded = ['id'];
}
