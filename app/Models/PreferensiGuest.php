<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PreferensiGuest extends Model
{
    use HasFactory;

    protected $table = 'preferensi_guest';
    protected $primaryKey = 'preferensi_id';
    protected $fillable = ['kategori_id', 'latitude', 'longitude', 'urutan_kriteria'];
    protected $casts = [
        'urutan_kriteria' => 'array',
    ];

    public $timestamps = true;

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
