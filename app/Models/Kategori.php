<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'kategori_id';
    protected $fillable = ['nama_kategori', 'deskripsi'];

    public $timestamps = true;

    public function tempatKuliner()
    {
        return $this->hasMany(TempatKuliner::class, 'kategori_id');
    }
}
