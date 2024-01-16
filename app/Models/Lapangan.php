<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    use HasFactory;
    protected $table = 'lapangan';
    protected $fillable = [
        'id',
        'user_id',
        'jenis_lapangan',
        'nama_lapangan',
        'deskripsi',
        'harga_sewa',
        'lokasi',
        'gambar',

    ];
    
    public function user() {
        return $this->belongsTo(User::class, 'users_id');
    }

    
    
}