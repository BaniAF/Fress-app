<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kondisi extends Model
{
    // use SoftDeletes;
    use HasFactory;

    protected $fillable = ['id','nilai_huruf', 'nilai_min', 'nilai_max', 'id_waktu'];
    protected $table = 'kondisi';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $dates = ['deleted_at'];

    public function time()
    {
        return $this->belongsTo(Time::class, 'time_id');
    }

    public static function generateNewId() {
        $lastKondisi = self::orderBy('id', 'desc')->first();
        $nextId = $lastKondisi ? intval(substr($lastKondisi->id, 2)) + 1 : 1;
        return 'KI' . str_pad($nextId, 3, '0', STR_PAD_LEFT);
    }
}
