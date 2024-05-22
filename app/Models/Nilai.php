<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Nilai extends Model
{

    use HasFactory;
    protected $table = 'nilai';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['id','id_peserta','nama_peserta','nilai_peserta','id_kondisi'];

    public function kondisi()
    {
        return $this->belongsTo(Kondisi::class, 'id_kondisi');
    }
    public function peserta()
    {
        return $this->belongsTo(Peserta::class, 'id_peserta', 'id');
    }

    public static function generateNewId() {
        $lastNilai = self::orderBy('id', 'desc')->first();
        $nextId = $lastNilai ? intval(substr($lastNilai->id, 1)) + 1 : 1;
        return 'N' . str_pad($nextId, 2, '0', STR_PAD_LEFT);
    }
}
