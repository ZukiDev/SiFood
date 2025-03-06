<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PreferensiTempatKuliner extends Model
{
    use HasFactory;

    protected $table = 'preferensi_tempat_kuliner';
    protected $primaryKey = 'preferensi_tempat_id';
    protected $fillable = [
        'tempat_id',
        'link_gmaps',
        'link_gofood',
        'link_shopeefood',
        'link_grabfood',
        'rating_google',
        'rating_gofood',
        'rating_shopeefood',
        'rating_grabfood',
        'jumlah_makanan',
        'jumlah_minuman'
    ];

    public $timestamps = true;

    public function tempatKuliner()
    {
        return $this->belongsTo(TempatKuliner::class, 'tempat_id');
    }
}
