<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'kriteria';
    protected $primaryKey = 'kriteria_id';
    protected $fillable = ['nama_kriteria', 'bobot', 'deskripsi'];

    public $timestamps = true;

    public function nilaiKriteria()
    {
        return $this->hasMany(NilaiKriteria::class, 'kriteria_id');
    }
}
