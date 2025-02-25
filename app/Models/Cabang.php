<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cabang extends Model
{
    //
    use HasFactory;
    protected $table = 'cabangs';
    public $timestamps = false;

    protected $guarded = ['id'];
    public function users(){
        return $this->hasMany(User::class, 'id');
    }
    public function transaksi(){
        return $this->hasMany(Transaksi::class, 'id');
    }
}
