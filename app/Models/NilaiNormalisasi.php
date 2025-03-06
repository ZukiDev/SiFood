<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NilaiNormalisasi extends Model
{
    use HasFactory;

    protected $table = 'nilai_normalisasi';
    protected $primaryKey = 'normalisasi_id';
    protected $fillable = ['tempat_id', 'kriteria_id', 'nilai_normalisasi'];

    public $timestamps = true;

    public function tempatKuliner()
    {
        return $this->belongsTo(TempatKuliner::class, 'tempat_id');
    }

    public function kriteria()
    {
        return $this->belongsTo(Kriteria::class, 'kriteria_id');
    }
}
