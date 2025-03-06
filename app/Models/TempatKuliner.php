<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TempatKuliner extends Model
{
    use HasFactory;

    protected $table = 'tempat_kuliner';
    protected $primaryKey = 'tempat_id';
    protected $fillable = ['kategori_id', 'nama', 'alamat', 'latitude', 'longitude'];

    public $timestamps = true;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    public function menu()
    {
        return $this->hasMany(Menu::class, 'tempat_id');
    }

    public function preferensi()
    {
        return $this->hasOne(PreferensiTempatKuliner::class, 'tempat_id');
    }

    public function nilaiKriteria()
    {
        return $this->hasMany(NilaiKriteria::class, 'tempat_id');
    }

    public function nilaiNormalisasi()
    {
        return $this->hasMany(NilaiNormalisasi::class, 'tempat_id');
    }
}
