<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatKuliner extends Model
{
    use HasFactory;

    protected $table = 'tempat_kuliner';
    protected $primaryKey = 'tempat_id';

    protected $fillable = [
        'kategori_id',
        'nama',
        'alamat',
        'latitude',
        'longitude',
        'foto',
    ];

    protected $casts = [
        'latitude' => 'decimal:7',
        'longitude' => 'decimal:7',
    ];

    /**
     * Relasi ke kategori
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'kategori_id');
    }

    /**
     * Relasi ke preferensi tempat kuliner
     */
    public function preferensi()
    {
        return $this->hasOne(PreferensiTempatKuliner::class, 'tempat_id', 'tempat_id');
    }

    /**
     * Relasi ke menu
     */
    public function menu()
    {
        return $this->hasMany(Menu::class, 'tempat_id', 'tempat_id');
    }

    /**
     * Accessor untuk URL foto
     */
    public function getFotoUrlAttribute(): string
    {
        if ($this->foto && file_exists(storage_path('app/public/tempat_kuliner/' . $this->foto))) {
            return asset('storage/tempat_kuliner/' . $this->foto);
        }

        // Return default image jika foto tidak ada
        return asset('assets/images/default/foto-tempat.png');
    }

    /**
     * Check apakah ada foto
     */
    public function hasFoto(): bool
    {
        return $this->foto && file_exists(storage_path('app/public/tempat_kuliner/' . $this->foto));
    }
}
