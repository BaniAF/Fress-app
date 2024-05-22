<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class time extends Model
{
    use HasFactory;
    
    protected $table = 'times'; // Nama tabel yang sesuai

    protected $fillable = ['nama_waktu'];
    
    public function kondisis()
    {
        return $this->hasMany(Kondisi::class, 'id');
    }
}
