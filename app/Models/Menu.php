<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Menu extends Model
{
    use HasFactory;

    protected $table = 'menu';
    protected $primaryKey = 'menu_id';
    protected $fillable = ['tempat_id', 'nama_menu', 'deskripsi'];

    public $timestamps = true;

    public function tempatKuliner()
    {
        return $this->belongsTo(TempatKuliner::class, 'tempat_id');
    }
}
