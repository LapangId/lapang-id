<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $table = 'pemesanan';
    protected $fillable = [
        'nama_p',
        'hari',
        'jam_m',
        'jam_s',
        'tanggal',
        'lapangan_id',
        'j_lapangan_id', 
        'users_id',
        'status',
    ];

    public function lapangan() {
        return $this->belongsTo(Lapangan::class, 'lapangan_id', 'id');
    }
    
    public function jLapangan() {
        return $this->belongsTo(jLapangan::class, 'j_lapangan_id', 'id');
    }
    
    public function user() {
        return $this->belongsTo(User::class, 'users_id');
    }
    
    
    
}