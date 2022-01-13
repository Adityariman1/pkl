<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    use HasFactory;

    protected $fillable = ['keterangan','nama_kategori'];
    public $timetamps = true;

    public function buku()
    {
        $this->hasMany('App\Models\kategori', 'id_kategori');
    }


}
