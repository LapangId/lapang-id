<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jLapangan extends Model
{
    use HasFactory;
    protected $table = 'j_lapangan';
    protected $fillable = [
        'id',
        'nama_lapangan',
        'id_lapangan',
       
        
    ];
    public function lapangan() {
        return $this->belongsTo(Lapangan::class, 'lapangan_id', 'id');
    }
}