<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $table = 'transaksi';
    protected $guarded = ['id'];
    public function cabang(){
        return $this->belongsTo(Cabang::class, 'cabang_id');
    }
    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function layanan(){
        return $this->belongsTo(Layanan::class, 'id_layanan');
    }
}
