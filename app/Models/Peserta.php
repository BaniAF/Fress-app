<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peserta extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'peserta';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['id', 'nama', 'username', 'password','password_lihat', 'alamat', 'email', 'klub', 'posisi',];

    protected $hidden = [
        'id_waktu'
    ];

    public function waktu()
    {
        return $this->belongsTo(Time::class, 'id_waktu');
    }
}
