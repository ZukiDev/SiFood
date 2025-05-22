<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'kriteria';
    protected $primaryKey = 'kriteria_id';

    protected $fillable = [
        'nama_kriteria',
        'slug',
        'bobot',
        'deskripsi',
    ];

    protected $casts = [
        'bobot' => 'float',
    ];

    /**
     * Boot method untuk auto-generate slug
     */
    protected static function boot()
    {
        parent::boot();

        // Auto-generate slug saat creating
        static::creating(function ($kriteria) {
            if (empty($kriteria->slug)) {
                $kriteria->slug = static::generateUniqueSlug($kriteria->nama_kriteria);
            }
        });

        // Auto-update slug saat updating nama_kriteria
        static::updating(function ($kriteria) {
            if ($kriteria->isDirty('nama_kriteria')) {
                $kriteria->slug = static::generateUniqueSlug($kriteria->nama_kriteria, $kriteria->kriteria_id);
            }
        });
    }

    /**
     * Generate unique slug dari nama kriteria
     *
     * @param string $nama
     * @param int|null $excludeId
     * @return string
     */
    public static function generateUniqueSlug(string $nama, ?int $excludeId = null): string
    {
        $baseSlug = Str::slug($nama, '_'); // Gunakan underscore untuk DB column naming
        $slug = $baseSlug;
        $counter = 1;

        // Check uniqueness dan tambah counter jika perlu
        while (static::where('slug', $slug)
            ->when($excludeId, fn($query) => $query->where('kriteria_id', '!=', $excludeId))
            ->exists()
        ) {
            $slug = $baseSlug . '_' . $counter;
            $counter++;
        }

        return $slug;
    }

    /**
     * Get column name untuk database mapping
     * Jika slug adalah 'jarak', return null karena dihitung khusus
     *
     * @return string|null
     */
    public function getColumnNameAttribute(): ?string
    {
        // Jarak dihitung khusus, tidak perlu kolom database
        if ($this->slug === 'jarak') {
            return null;
        }

        return $this->slug;
    }
}
