<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NilaiKriteria extends Model
{
    use HasFactory;

    protected $table = 'nilai_kriteria';
    protected $primaryKey = 'nilai_id';
    protected $fillable = ['tempat_id', 'kriteria_id', 'nilai'];

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
